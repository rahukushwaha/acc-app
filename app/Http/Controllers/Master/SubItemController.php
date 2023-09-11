<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Traits\UserUtility;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubItemController extends Controller
{
    public function getSubItemByItemId(Request $request)
    {
        $inputs = $request->input();
        $itemList = DB::table("tbl_sub_item_mstrs")
                        ->where("intItemMstrsId", $inputs["item_mstrs_id"])
                        ->where("bitDeletedFlag", 0)
                        ->orderBy("varSubItem")
                        ->get();
        if ($itemList) {    
            $response = [
                "status" => 200,
                "msg" => "Item list",
                "data" => $itemList
            ];
            return response()->json($response);
        }
        $response = [
            "status" => 204,
            "msg" => "Item not fount",
        ];
        return response()->noContent()->json($response);
    }
}
