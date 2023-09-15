<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\Traits\UserUtility;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class SupplierController extends Controller
{
    use UserUtility;

    public function PostAdd(Request $request)
    {
        $inputs = $request->input();
        $insertData = [
            "varSupplierName" => $inputs["varSupplierName"],
            "varMobileNo" => $inputs["varMobileNo"],
            "varBillingAddress" => $inputs["varBillingAddress"],
            "bitShippingAdrSame" => $inputs["bitShippingAdrSame"],
            "varShippingAddress" => (isset($inputs["bitShippingAdrSame"]) && $inputs["bitShippingAdrSame"]==1)?$inputs["bitShippingAdrSame"]:$inputs["varShippingAddress"],
            "intSupplyPlaceStateMstrsId" => $inputs["intSupplyPlaceStateMstrsId"],
            "varGstin" => $inputs["varGstin"],
            "bitDeletedFlag" => 0,
            "intCreatedby" => $this->getUserId(),
            "intUpdatedby" => $this->getUserId(),
            "created_at" => Carbon::now()->format('Y-m-d H:i:s'),
            "updated_at" => Carbon::now()->format('Y-m-d H:i:s'),
        ];
        $supplier_dtls_id = DB::table("tbl_supplier_dtls")
                            ->insertGetId($insertData);
        
        $stateDtl = DB::table("tbl_state_mstrs")
                        ->select('varStateName', 'varStateCode')
                        ->where("id", $inputs["intSupplyPlaceStateMstrsId"])
                        ->first();
        //dd($stateDtl);
        $html = '<label class="fs-20" style="margin-bottom: 0rem">'.$inputs["varSupplierName"].'</label><br />';
        if ($inputs["varBillingAddress"] != "") {
            $html .= '<label class="fs-12" style="margin-bottom: 0rem">Address:'.$inputs["varBillingAddress"].'</label><br />';
        }
        $html .= '<label class="fs-12" style="margin-bottom: 0rem">Phone No.:'.$inputs["varMobileNo"].'</label><br />';
        if ($inputs["varGstin"]) {
            $html .= '<label class="fs-12" style="margin-bottom: 0rem">GSTIN:'.$inputs["varGstin"].'</label><br />';
        }
        $html .= '<div class="row">
                    <div class="col-md-12" style="text-align: right;">
                        <label class="fs-12" style="margin-bottom: 0rem">Place Of Supply: <b>'.$stateDtl->varStateName.'</b></label><br />
                    </div>
                </div>';
        $response = [
            "status" => 200,
            "msg" => "supplier successfully added !!!",
            "data" => "",
            "supplier_dtls_id" => $supplier_dtls_id,
            "supplier_intSupplyPlaceStateMstrsId" => $inputs["intSupplyPlaceStateMstrsId"],
            "html" => $html
        ];
        return response()->json($response);
    }

    public function GetSupplierDtlWithNameNo(Request $request)
    {
        $query = $request->input('term');
        $result = DB::table("tbl_supplier_dtls")
                    ->where("varSupplierName", "like", "%".$query."%")
                    ->orWhere("varMobileNo", "like", "%".$query."%")
                    ->limit(20)
                    ->get();

        return response()->json($result);
    }

    public function getSupplierDtlForInvoiceById(Request $request) {
        $inputs = $request->input();
        //DB::enableQueryLog();
        $supplierDtl = DB::table("tbl_supplier_dtls")
                        ->join('tbl_state_mstrs', 'tbl_supplier_dtls.intSupplyPlaceStateMstrsId', '=', 'tbl_state_mstrs.id')
                        ->where('tbl_supplier_dtls.id', $inputs["supplier_dtls_id"])
                        ->select('tbl_supplier_dtls.varSupplierName','tbl_supplier_dtls.varMobileNo','tbl_supplier_dtls.varBillingAddress','tbl_supplier_dtls.bitShippingAdrSame','tbl_supplier_dtls.varGstin', 'tbl_supplier_dtls.intSupplyPlaceStateMstrsId', 'tbl_state_mstrs.varStateName')
                        ->first();
        //dd(DB::getQueryLog());
        //dd($supplierDtl);
        $html = '<label class="fs-20" style="margin-bottom: 0rem">'.$supplierDtl->varSupplierName.'</label><br />';
        if ($supplierDtl->varBillingAddress != "") {
            $html .= '<label class="fs-12" style="margin-bottom: 0rem">Address:'.$supplierDtl->varBillingAddress.'</label><br />';
        }
        $html .= '<label class="fs-12" style="margin-bottom: 0rem">Phone No.:'.$supplierDtl->varMobileNo.'</label><br />';
        if ($supplierDtl->varGstin != "") {
            $html .= '<label class="fs-12" style="margin-bottom: 0rem">GSTIN:'.$supplierDtl->varGstin.'</label><br />';
        }
        $html .= '<div class="row">
                    <div class="col-md-12" style="text-align: right;">
                        <label class="fs-12" style="margin-bottom: 0rem">Place Of Supply: <b>'.$supplierDtl->varStateName.'</b></label><br />
                    </div>
                </div>';
        $response = [
            "status" => 200,
            "msg" => "supplier successfully added !!!",
            "data" => "",
            "supplier_dtls_id" => $inputs["supplier_dtls_id"],
            "supplier_intSupplyPlaceStateMstrsId" => $supplierDtl->intSupplyPlaceStateMstrsId,
            "html" => $html
        ];
        return response()->json($response);
    }

    public function PostAddOrUpdate(Request $request)
    {
        $inputs = $request->input();
        $insertData = [
            "varSupplierName" => $inputs["varSupplierName"],
            "varMobileNo" => $inputs["varMobileNo"],
            "varBillingAddress" => $inputs["varBillingAddress"],
            "bitShippingAdrSame" => $inputs["bitShippingAdrSame"],
            "varShippingAddress" => (isset($inputs["bitShippingAdrSame"]) && $inputs["bitShippingAdrSame"]==1)?$inputs["bitShippingAdrSame"]:$inputs["varShippingAddress"],
            "intSupplyPlaceStateMstrsId" => $inputs["intSupplyPlaceStateMstrsId"],
            "varGstin" => $inputs["varGstin"],
            "bitDeletedFlag" => 0,
            "intCreatedby" => $this->getUserId(),
            "intUpdatedby" => $this->getUserId(),
            "created_at" => Carbon::now()->format('Y-m-d H:i:s'),
            "updated_at" => Carbon::now()->format('Y-m-d H:i:s'),
        ];
        DB::table("tbl_supplier_dtls")
            ->insert($insertData);

        $response = [
            "status" => 200,
            "msg" => "supplier successfully added !!!",
            "data" => ""
        ];
        return response()->json($response);
    }
}
