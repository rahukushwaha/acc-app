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

class PurchasesListController extends Controller
{
    use UserUtility, DateUtility;
    public function Index()
    {
        //Session::flash('infoNotify', 'alert-danger');
        return view('Purchases.PurchasesList');
    }

    public function Datatable(Request $request)
    {
        if (!$request->ajax()) {
        }
        $input = $request->input();
        $whereCond = "";
        if (isset($input["varProductSerialNo"]) && $input["varProductSerialNo"]!="") {
            $whereCond = " AND varProductSerialNo = '".$input["varProductSerialNo"]."' ";
        }
        $query = DB::table('tbl_purchases as ts')
                ->join(DB::raw("(SELECT 
                                    intPurchasesId, 
                                    GROUP_CONCAT(varProductSerialNo SEPARATOR ',') as varProductSerialNo,
                                    count(*) as totalItems
                                FROM tbl_purchase_dtls 
                                WHERE bitDeletedFlag = 0 ".$whereCond."
                                GROUP BY intPurchasesId
                                ) as tsd"
                            ), "tsd.intPurchasesId", "=", "ts.id"
                    );
        $query->select(DB::raw('ts.varSupplierName, ts.varMobileNo, ts.varInvoiceNo, ts.dtInvoiceDate, ts.decTotalAmt, tsd.varProductSerialNo, tsd.totalItems'));
        $query->where('ts.bitDeletedFlag', 0)
                ->whereBetween('ts.dtInvoiceDate', [$input['dtFromDate'], $input['dtToDate']]);
        if (isset($input["vchSupplierNameMobileNo"]) && $input["vchSupplierNameMobileNo"]!="") {
            if (is_numeric($input["vchSupplierNameMobileNo"]) && strlen($input["vchSupplierNameMobileNo"])==10) {
                $query->where('ts.varMobileNo', $input["vchSupplierNameMobileNo"]);
            } else {
                $query->where('ts.varSupplierName', 'like', "%".$input["vchSupplierNameMobileNo"]."%");
            }
        }
        if (isset($input["varInvoiceNo"]) && $input["varInvoiceNo"]!="") {
            $query->where('ts.varInvoiceNo', 'like', $input["varInvoiceNo"]."%");
        }
        $count = $query->count();
        //DB::enableQueryLog();
        if ($input['length'] == -1) {  
            $resultList = $query->get()->toArray();
        } else {
            $resultList = $query->skip(trim($input['start']))->take(trim($input['length']))->get()->toArray();
        }
        //dd($resultList[0]->varSupplierName);
        $dataList = [];
        foreach($resultList as $key => $result) {
            $invoiceNo = '<div>'.$result->varInvoiceNo.'</div>';
            $invoiceNo .= '<button type="button" class="btn btn-icon btn-sm mb-1 btn-info" data-bs-placement="top" data-bs-toggle="tooltip" title="'.$result->varProductSerialNo.'">'.$result->totalItems.'</button>';
            $dataList[] = [
                "sno" => ++$input['start'],
                "dtInvoiceDate" => $result->dtInvoiceDate,
                "varSupplierName" => $result->varSupplierName,
                "varInvoiceNo" => $invoiceNo,
                "varMobileNo" => $result->varMobileNo,
                "decTotalAmt" => $result->decTotalAmt,
                "actions" => ""//$result->actions
            ];
        }
        //sleep(200);
        $response = array(
            "draw" => intval($input['draw']),
            "recordsTotal" => $count,
            "recordsFiltered" => $count,
            "data" => $dataList
        );  
        return json_encode($response);
    }
}
