<?php

namespace App\Http\Controllers\FilePermission;

use Exception;
use App\Http\Controllers\Controller;
use App\Traits\UserUtility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PermissionController extends Controller
{
    use UserUtility;

    public function AddUpdate($encryptId) {
        $viewData = [];
        $viewData["encryptId"] = $encryptId;
        if (!$encryptId==null) {
            $viewData["encryptId"] = "/".$encryptId;
            $decryptedId = Crypt::decrypt($encryptId); 
            $menuData = DB::table('tbl_menus') 
                                    ->where('id', $decryptedId)
                                    ->first();
            $viewData["menuData"] = $menuData;
            $menuPermissionLists = DB::table('tbl_menu_permissions')
                        ->where('menu_id', $decryptedId)
                        ->where('status', 1)
                        ->get();
            $viewData["menuPermissionLists"] = $menuPermissionLists;
        }
        $roleLists = DB::table('tbl_roles')
                        ->where('status', 1)
                        ->get();
        //dd($roleLists);
        $viewData["roleLists"] = $roleLists;
        return view('FilePermission.MenuPermissionAddUpdate', $viewData);
    }
    public function postAddUpdate(Request $request, $encryptId) {
        $input = $request->all();
        //dd($encryptId, $input);
        $decryptedId = Crypt::decrypt($encryptId);
        DB::beginTransaction();
        try {
            DB::table('tbl_menu_permissions')
                ->where('menu_id', $decryptedId)
                ->where('status', 1)
                ->update(['status'=>0]);
            if (isset($input['role_id'])) {
                if (count($input['role_id']) > 0) {
                    foreach ($input['role_id'] as $key => $role_id) {
                        $roleLists = DB::table('tbl_menu_permissions')
                                    ->where('menu_id', $decryptedId)
                                    ->where('role_id', $role_id)
                                    ->where('status', 0)
                                    ->first();
                        if ($roleLists) {
                            DB::table('tbl_menu_permissions')
                                ->where('menu_id', $decryptedId)
                                ->where('role_id', $role_id)
                                ->where('status', 0)
                                ->update(['status'=>1]);
                        } else {
                            $insertData = [
                                "menu_id" => $decryptedId,
                                "role_id" => $role_id,
                                "status" => 1,
                                "created_at" => date("Y-m-d H:i:s"),
                                "updated_at" => date("Y-m-d H:i:s")
                            ];
                            DB::table('tbl_menu_permissions')
                                ->insert($insertData);
                        }
                    }
                }
            }

            DB::commit();
            Session::flash('successMsgAutoClose', 'Successfully Updated Menu Permission !!'); 
            return redirect('FilePermission/Menu');
        } catch (Exception $e) {
            DB::rollback();
            Session::flash('dangerMsg', $e->getMessage()); 
            return redirect()->back();
        }
        //dd($decryptedId);
        
           
    }
}
