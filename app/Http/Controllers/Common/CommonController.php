<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommonController extends Controller
{
    public function showStateList($selectedId = null)
    {
        $resultList = DB::table("tbl_state_mstrs")
                    ->get();
        $options = "";
        foreach($resultList as $key=>$result) {
            $selectedTxt = '';
            if($selectedId != null && $selectedId != 0){
                $selectedTxt = ($result->id == $selectedId) ? 'selected' : '';
            }
            $options .= "<option data-stateName='".$result->varStateName."' data-stateCode='".$result->varStateCode."' value='".$result->id."' ".$selectedTxt.">".$result->varStateName."</option>";
        }
        return $options;
    }
}
