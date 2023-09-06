<?php

namespace App\Http\Controllers\FilePermission;

use Exception;
use App\Http\Controllers\Controller;
use App\Traits\UserUtility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class MenuController extends Controller
{
    use UserUtility;
    public function index()
    {
        $menuPermissionLists = DB::table('tbl_menus as tm')
                    ->leftJoin('tbl_menus as ptm', function($join){
                        $join->on('ptm.id', '=', 'tm.parent_menu_id');
                        $join->whereIn('ptm.menu_type', [1,3]);
                    })
                    ->leftJoin(DB::raw('(
                        SELECT 
                            tmp.menu_id, 
                            GROUP_CONCAT(tr.role_name SEPARATOR ", ") AS role_name 
                        FROM tbl_menu_permissions AS tmp 
                        INNER JOIN tbl_roles AS tr ON tr.id = tmp.role_id 
                        WHERE tmp.status = 1 
                        GROUP BY tmp.menu_id) AS ttmp'), 'ttmp.menu_id', '=', 'tm.id')
                    ->select(
                        'tm.id',
                        DB::raw('ptm.menu_name as parent_menu_name'),
                        DB::raw('CASE WHEN tm.menu_type = 0 THEN "direct link" WHEN tm.menu_type = 1 THEN "menu name" WHEN tm.menu_type = 2 THEN "menu link" WHEN tm.menu_type = 3 THEN "sub menu name" WHEN tm.menu_type = 4 THEN "sub menu link" END AS menu_type'),
                        'tm.menu_name',
                        'tm.menu_url',
                        'ttmp.role_name'
                    )
                    ->where('tm.status', '=', 1)
                    ->get();
        return view('FilePermission.MenuListWithPermission', ["menuPermissionLists" => $menuPermissionLists]);
    }

    public function AddUpdate($encryptId = null) {
        $viewData = [];
        $viewData["encryptId"] = $encryptId;
        if (!$encryptId==null) {
            $viewData["encryptId"] = "/".$encryptId;
            $decryptedId = Crypt::decrypt($encryptId); 
            $menuData = DB::table('tbl_menus') 
                                    ->where('id', $decryptedId)
                                    ->first();
            $viewData["menuData"] = $menuData;
        }
        $parenMmenuLists = DB::table('tbl_menus')
                        ->where('menu_type', 1)
                        ->where('status', 1)
                        ->get();
        $viewData["parenMmenuLists"] = $parenMmenuLists;
        return view('FilePermission.MenuAddUpdate', $viewData);
    }
    public function postAddUpdate(Request $request, $encryptId = null) {
        $input = $request->all();
        //dd($input);
        $insertData = [
            'menu_type' => $input['menu_type'],
            'menu_name' => $input['menu_name'],
            'menu_url' => $input['menu_url'],

        ];
        if (isset($input['parent_menu_id']) && $input['parent_menu_id']!="") {
            $insertData["parent_menu_id"] = $input['parent_menu_id'];
        }
        if (isset($input['_order']) && $input['_order']!="") {
            $insertData["_order"] = $input['_order'];
        }
        if (!$encryptId==null) { // update
            $decryptedId = Crypt::decrypt($encryptId);
            $insertData["updated_at"] = date("Y-m-d H:i:s");
            DB::beginTransaction();
            try {
                DB::table('tbl_menus')
                    ->where('id', $decryptedId)
                    ->update($insertData);
                DB::commit();
                Session::flash('successMsgAutoClose', 'Successfully Updated !!'); 
                return redirect('FilePermission/Menu');
            } catch (Exception $e) {
                DB::rollback();
                Session::flash('dangerMsg', $e->getMessage()); 
                return redirect()->back();
            }
        } else { // insert
            $insertData["status"] = "1";
            $insertData["created_at"] = $insertData["updated_at"] = date("Y-m-d H:i:s");
            DB::beginTransaction();
            try {
                DB::table('tbl_menus')->insert($insertData);
                DB::commit();
                Session::flash('successMsgAutoClose', 'Successfully Inserted !!'); 
                return redirect('FilePermission/Menu');
            } catch (Exception $e) {
                DB::rollback();
                Session::flash('dangerMsg', $e->getMessage()); 
                return redirect()->back();
            }
        }
    }

    public function Delete($encryptId = null) {
        if (!$encryptId==null) { // update
            $decryptedId = Crypt::decrypt($encryptId);
            $insertData["updated_at"] = date("Y-m-d H:i:s");
            $insertData["status"] = 0;
            DB::beginTransaction();
            try {
                DB::table('tbl_menus')
                    ->where('id', $decryptedId)
                    ->update($insertData);
                DB::commit();
                Session::flash('successMsgAutoClose', 'Successfully Updated !!'); 
                return redirect('FilePermission/Menu');
            } catch (Exception $e) {
                DB::rollback();
                Session::flash('dangerMsg', $e->getMessage()); 
                return redirect()->back();
            }
        }
    }
}
