<?php

namespace App\Http\Controllers\Purchases;

use Exception;
use App\Http\Controllers\Controller;
use App\Traits\UserUtility;
use App\Traits\DateUtility;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PurchaseInvoiceController extends Controller
{
    use UserUtility, DateUtility;
    public function Index()
    {
        //Session::flash('infoNotify', 'alert-danger');
        //echo $this->testFun();
        return view('Purchases.index');
    }

    public function PostSubmit(Request $request)
    {
        $inputs = $request->input();
        $validator = Validator::make($request->all(), [
            'dtInvoiceDate' => 'required',
            'supplier_dtls_id' => 'required',
            'supplier_intSupplyPlaceStateMstrsId' => 'required',
            'owner_intSupplyPlaceStateMstrsId' => 'required',
            'varBillRecceiptFilePath' => 'file|mimes:jpg,png,pdf|max:4096',
            //'trst' => 'required',
        ]);
        //$validator->errors()->add('field','Something is wrong with this field!'); it's not working

        if ($validator->fails()) {
            $errors = $validator->errors();
            $response = [
                "status" => 400,
                "msg" => "Validation failed !!!",
                "data" => $errors
            ];
            return response()->json($response);
        }
        DB::beginTransaction();
        try {
            $varBillRecceiptFilePath = "";
            if ($request->hasFile('varBillRecceiptFilePath')) {
                $file = $request->file('varBillRecceiptFilePath');
                $newFileNameTemp = Carbon::now()->format('YmdHis'). '_' .uniqid() . '.' . $file->extension();
                $newFileName = 'PurchaseInvoice/'.$newFileNameTemp;
                $uploadPath = base_path('uploads/PurchaseInvoice');
                $file->move($uploadPath, $newFileName);
                $varBillRecceiptFilePath = $newFileName;
            }

            $partyDtl = DB::table("tbl_supplier_dtls")->where("id", $inputs["supplier_dtls_id"])->first();
            $stateDtl = DB::table("tbl_state_mstrs")->select('varStateName')->where("id", $inputs["supplier_intSupplyPlaceStateMstrsId"])->first();

            $date = Carbon::now();
            $dateOfYear = $date->format('Y');
            $yearYY = $date->format('y');
            $dateOfMonth = $date->format('m');
            $startDateFY = $dateOfYear."-04-01 00:00:00";
            $endDateFY   = ($dateOfYear+1)."-03-31 23:59:59";
            $currFy = ($yearYY-1).$yearYY;
            if ($dateOfMonth < 4) {
                $currFy = $yearYY.($yearYY+1);
            }

            
            $lastInvoiceDtl = DB::table('tbl_purchases')
                                ->whereBetween("created_at", [$startDateFY, $endDateFY])
                                ->lockForUpdate()
                                ->count();
            $varInvoiceNo = "INP".$currFy.str_pad(($lastInvoiceDtl+1),5,"0", STR_PAD_LEFT);
            /* == invoice format
            > 3 digit = start with INVP (IN = INVOICE, P = PURCHASE)
            > 4 digit = current financial year
            > 5 digit = sequence of number
                        > start with 00001
                        > sequence start again new financial year
            */

            $insertData = [
                "intSupplierDtlsId" => $inputs["supplier_dtls_id"],
                "varSupplierName" => $partyDtl->varSupplierName,
                "varMobileNo" => $partyDtl->varMobileNo,
                "varBillingAddress" => $partyDtl->varBillingAddress,
                "intSupplyPlaceStateMstrsId" => $partyDtl->intSupplyPlaceStateMstrsId,
                "varSupplyPlaceStateName" => $stateDtl->varStateName,
                "varGstin" => $partyDtl->varGstin,
                "varInvoiceNo" => $varInvoiceNo,
                "dtInvoiceDate" => $inputs["dtInvoiceDate"],
                "intPaymentTerms" => $inputs["intPaymentTerms"],
                "dtDueDate" => $inputs["dtDueDate"],
                "decSubTotalDiscount" => $inputs["decTotalSubDiscount"],
                "decSubTotalTax" => $inputs["decTotalSubTax"],
                "decSubTotalAmt" => $inputs["decSubTotalAmt"],
                "decTaxableAmt" => $inputs["decTaxableAmt"],
                "intIGSTPer" => $inputs["intIGSTPer"],
                "decIGSTAmt" => $inputs["decIGSTAmt"],
                "intSGSTPer" => $inputs["intSGSTPer"],
                "decSGSTAmt" => $inputs["decSGSTAmt"],
                "intCGSTPer" => $inputs["intCGSTPer"],
                "decCGSTAmt" => $inputs["decCGSTAmt"],
                "decAdditionalChargesAmt" => $inputs["decAdditionalChargesAmt"],
                "decExtraDiscountAmt" => $inputs["decExtraDiscountAmt"],
                "intIsRoundOff" => (isset($inputs["intIsRoundOff"]))?1:0,
                "decRoundOffAmt" => $inputs["decRoundOffAmt"],
                "decTotalAmt" => $inputs["decTotalAmt"],
                "decReceiveAmt" => $inputs["decReceiveAmt"],
                "decBalanceAmt" => $inputs["decBalanceAmt"],
                "decPreviousSupplierBalanceAmt" => "0.00",
                "isSupplierFullPaid" => ($inputs["decBalanceAmt"] == 0)?1:0,  
                "varNotes" => $inputs["varNotes"],
                "varTermsNCondition" => $inputs["varTermsNCondition"],
                "varBillReceiptNo" => $inputs["varBillReceiptNo"],
                "varBillRecceiptFilePath" => $varBillRecceiptFilePath,
                "bitDeletedFlag" => 0,
                "intCreatedby" => $this->getUserId(),
                "created_at" => Carbon::now()->format('Y-m-d H:i:s'),
            ];
            $intPurchasesId = DB::table("tbl_purchases")->insertGetId($insertData);
            
            if (isset($inputs["intItemMstrsId"]) && sizeof($inputs["intItemMstrsId"]) > 0) {
                foreach ($inputs["intItemMstrsId"] as $key => $inputsTemp) {
                    $insertData = [
                        "intPurchasesId" => $intPurchasesId,
                        "intItemMstrsId" => $inputs["intItemMstrsId"][$key],
                        "intSubItemMstrsId" => $inputs["intSubItemMstrsId"][$key],
                        "varProductSerialNo" => $inputs["varProductSerialNo"][$key],
                        "varSAC" => $inputs["varSAC"][$key],
                        "intQty" => $inputs["intQty"][$key],
                        "decSalesPrice" => ($inputs["decSalesPrice"][$key]=="")?0:$inputs["decSalesPrice"][$key],
                        "decDiscountPer" => ($inputs["decDiscountPer"][$key]=="")?0:$inputs["decDiscountPer"][$key],
                        "decDiscountAmt" => ($inputs["decDiscountAmt"][$key]=="")?0:$inputs["decDiscountAmt"][$key],
                        "decTaxAmt" => ($inputs["decTaxAmt"][$key]=="")?0:$inputs["decTaxAmt"][$key],
                        "intGstPer" => ($inputs["intGstPer"][$key]=="")?0:$inputs["intGstPer"][$key],
                        "decAmount" => ($inputs["decAmount"][$key]=="")?0:$inputs["decAmount"][$key],
                        "bitDeletedFlag" => 0,
                        "intCreatedby" => $this->getUserId(),
                        "created_at" => Carbon::now()->format('Y-m-d H:i:s'),
                    ];
                    DB::table("tbl_purchase_dtls")->insert($insertData);
                }
            }
            DB::commit();
            $response = [
                "status" => 200,
                "msg" => "Purchase Invoice Created !!!",
                "data" => $intPurchasesId
            ];
            return response()->json($response);
        } catch(Exception $e) {
            DB::rollBack();
            $errors["exception"] = [
                $e->getMessage()
            ];
            $response = [
                "status" => 400,
                "msg" => "Validation failed !!!",
                "data" => $errors
            ];
            return response()->json($response);
        }
    }

    public function GetInvoiceDtlById(Request $request) {
        echo $var1 = $request->input('intPurchasesId');
    }
}
