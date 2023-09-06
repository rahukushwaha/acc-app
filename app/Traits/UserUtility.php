<?php

namespace App\Traits;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

trait UserUtility
{
    private $session;
    function __construct(){
        $this->session = session();
    }

    public function loggerDtl() {
        return $this->session->get('userData');
    }
    public function getLoggerId() : int {
        return $this->session->get('userData.id');
    }
    public function getLoggerRoleTypeId() : int {
        return $this->session->get('userData.user_type_id');
    }
    public function getLoggerRoleType() : string {
        return $this->session->get('userData.user_type');
    }
    public function getLoggerUserName() : string {
        return $this->session->get('userData.username');
    }
    public function getLoggerMobileNo() : int {
        return $this->session->get('userData.mobile_no');
    }
    public function getLoggerEmail() : string {
        return $this->session->get('userData.email');
    }
    public function getLoggerAddress() : string {
        return $this->session->get('userData.address');
    }
    public function getLoggerName() {
        return $this->session->get('userData.name');
    }
    public function getMenusByUser($userTypeId = null) : array
    {
        $menuList = [];
        if (!is_null($userTypeId)) {
            $userTypeId = $this->getLoggerRoleTypeId();
        }
        $menuList = DB::select('select 
                        tbl_menus.*
                    from tbl_menus
                    inner join tbl_menu_permissions on tbl_menu_permissions.menu_id = tbl_menus.id
                        and tbl_menu_permissions.status = 1 and tbl_menus.status = 1
                    where 
                        tbl_menu_permissions.role_id = '.$userTypeId.'
                        and tbl_menus.menu_type in (0, 1);');
        foreach($menuList as $key=>$val) {
            $sql = 'select 
                        tbl_menus.*
                    from tbl_menus
                    inner join tbl_menu_permissions on tbl_menu_permissions.menu_id = tbl_menus.id
                        and tbl_menu_permissions.status = 1 and tbl_menus.status = 1
                    where 
                        tbl_menu_permissions.role_id = ' . $userTypeId . '
                        and tbl_menus.parent_menu_id = ' . $val->id . '
                        and tbl_menus.menu_type IN (2, 3);';
            $subMenuList = DB::select($sql);
            if (!empty($subMenuList)) {
                $menuList[$key]->sub_menu = $subMenuList;
                foreach($subMenuList as $subKey=>$subVal) {
                    $sql = 'select 
                                tbl_menus.*
                            from tbl_menus
                            inner join tbl_menu_permissions on tbl_menu_permissions.menu_id = tbl_menus.id
                                and tbl_menu_permissions.status = 1 and tbl_menus.status = 1
                            where 
                                tbl_menu_permissions.role_id = ' . $userTypeId . '
                                and tbl_menus.parent_menu_id = ' . $subVal->id . '
                                and tbl_menus.menu_type=4;';
                    if ($subVal->menu_type == 3) {
                        $subMenuLink = DB::select($sql);
                        if (!empty($subMenuLink)) {
                            $menuList[$key]->sub_menu[$subKey]->sub_sub_link = $subMenuLink;

                        }
                    }
                }
            }
        }
        return $menuList;
    }

    public function makeMenuInJson()
    {
        $roleTypeId = $this->getLoggerId();
        $menuJson = json_encode($this->getMenusByUser($roleTypeId));
        Storage::disk('local')->put("menu_list/".$roleTypeId.'.json', $menuJson);
    }
}
