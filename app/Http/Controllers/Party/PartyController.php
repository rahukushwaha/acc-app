<?php

namespace App\Http\Controllers\Party;

use App\Http\Controllers\Controller;
use App\Traits\UserUtility;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class PartyController extends Controller
{
    use UserUtility;

    public function PostAdd(Request $request)
    {
        $inputs = $request->input();
        $insertData = [
            "varPartyName" => $inputs["varPartyName"],
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
        $party_dtls_id = DB::table("tbl_party_dtls")
                            ->insertGetId($insertData);
        
        $stateDtl = DB::table("tbl_state_mstrs")
                        ->select('varStateName', 'varStateCode')
                        ->where("id", $inputs["intSupplyPlaceStateMstrsId"])
                        ->first();
        //dd($stateDtl);
        $html = '<label class="fs-20" style="margin-bottom: 0rem">'.$inputs["varPartyName"].'</label><br />';
        if ($inputs["varBillingAddress"] != "") {
            $html .= '<label class="fs-12" style="margin-bottom: 0rem">address:'.$inputs["varBillingAddress"].'</label><br />';
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
            "msg" => "Party successfully added !!!",
            "data" => "",
            "party_dtls_id" => $party_dtls_id,
            "html" => $html
        ];
        return response()->json($response);
    }

    public function GetPartDtlWithNameNo(Request $request)
    {
        $query = $request->input('term');
        $result = DB::table("tbl_party_dtls")
                    ->where("varPartyName", "like", "%".$query."%")
                    ->orWhere("varMobileNo", "like", "%".$query."%")
                    ->get();

        return response()->json($result);
    }

    public function getPartyDtlForInvoiceById(Request $request) {
        $inputs = $request->input();
        //DB::enableQueryLog();
        $partyDtl = DB::table("tbl_party_dtls")
                        ->join('tbl_state_mstrs', 'tbl_party_dtls.intSupplyPlaceStateMstrsId', '=', 'tbl_state_mstrs.id')
                        ->where('tbl_party_dtls.id', $inputs["party_dtls_id"])
                        ->select('tbl_party_dtls.varPartyName','tbl_party_dtls.varMobileNo','tbl_party_dtls.varBillingAddress','tbl_party_dtls.bitShippingAdrSame','tbl_party_dtls.varGstin', 'tbl_state_mstrs.varStateName')
                        ->first();
        //dd(DB::getQueryLog());
        //dd($partyDtl);
        $html = '<label class="fs-20" style="margin-bottom: 0rem">'.$partyDtl->varPartyName.'</label><br />';
        if ($partyDtl->varBillingAddress != "") {
            $html .= '<label class="fs-12" style="margin-bottom: 0rem">address:'.$partyDtl->varBillingAddress.'</label><br />';
        }
        $html .= '<label class="fs-12" style="margin-bottom: 0rem">Phone No.:'.$partyDtl->varMobileNo.'</label><br />';
        if ($partyDtl->varGstin != "") {
            $html .= '<label class="fs-12" style="margin-bottom: 0rem">GSTIN:'.$partyDtl->varGstin.'</label><br />';
        }
        $html .= '<div class="row">
                    <div class="col-md-12" style="text-align: right;">
                        <label class="fs-12" style="margin-bottom: 0rem">Place Of Supply: <b>'.$partyDtl->varStateName.'</b></label><br />
                    </div>
                </div>';
        $response = [
            "status" => 200,
            "msg" => "Party successfully added !!!",
            "data" => "",
            "party_dtls_id" => $inputs["party_dtls_id"],
            "html" => $html
        ];
        return response()->json($response);
    }

    public function PostAddOrUpdate(Request $request)
    {
        $inputs = $request->input();
        $insertData = [
            "varPartyName" => $inputs["varPartyName"],
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
        DB::table("tbl_party_dtls")
            ->insert($insertData);

        $response = [
            "status" => 200,
            "msg" => "Party successfully added !!!",
            "data" => ""
        ];
        return response()->json($response);
    }
}
