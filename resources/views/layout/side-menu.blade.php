<ul class="side-menu">
    <li>
        <h3>Menu</h3>
    </li>
<?php
    $menuList = Storage::disk('local')->get("menu_list/".$UserUtility->getLoggerId().'.json');
    $menuList = json_decode($menuList, true);
    foreach ($menuList as $key => $menuName) {
        if ($menuName['menu_type']==0) {
?>
            <li class="slide">
                <a class="side-menu__item has-link" data-bs-toggle="slide" href="<?=URL::to($menuName['menu_url'])?>" data-menu-type="<?=$menuName['menu_type']?>" id="slide-item_<?=$menuName['id']?>">
                    <i class="fa fa-home" aria-hidden="true" style=" font-size: 18px; margin: 0px 8px 0px 0px;"></i>
                    <span class="side-menu__label"><?=$menuName['menu_name']?></span>
                </a>
            </li>
<?php
        } else if ($menuName['menu_type']==1) {
?>
            <li class="slide">
                <a class="side-menu__item" data-bs-toggle="slide" href="#" id="side-menu__item_<?=$menuName['id']?>">
                    
                    <i class="<?=($menuName['menu_icon']!="")?$menuName['menu_icon']:"fa fa-home";?>" aria-hidden="true" style=" font-size: 18px; margin: 0px 8px 0px 0px;"></i>
                    <span class="side-menu__label"><?=$menuName['menu_name']?></span><i class="angle fa fa-angle-right"></i>
                </a>
<?php
            if (isset($menuName['sub_menu'])) {
                echo '<ul class="slide-menu">';
                foreach ($menuName['sub_menu'] as $subKey => $subMenuName) {
                    if ($subMenuName['menu_type']==2) {
?>
                    <li><a href="<?=URL::to($subMenuName['menu_url']);?>" wire:navigate class="slide-item" data-menu-type="<?=$subMenuName['menu_type']?>" id="slide-item_<?=$subMenuName['id']?>"><?=$subMenuName['menu_name'];?></a></li>
<?php
                    } else if ($subMenuName['menu_type']==3) {
?>
                        <li class="sub-slide">
                            <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="#" id="sub-side-menu__item_<?=$subMenuName['id']?>">
                                <span class="sub-side-menu__label"><?=$subMenuName['menu_name']?></span>
                                <i class="sub-angle fa fa-angle-right"></i>
                            </a>
<?php
                        if (isset($subMenuName['sub_sub_link'])) {
                            echo '<ul class="sub-slide-menu">';
                            foreach ($subMenuName['sub_sub_link'] as $subSubKey => $subSubMenuName) {
                                if ($subSubMenuName['menu_type']==4) {
?>
                                <li><a href="<?=URL::to($subSubMenuName['menu_url']);?>" wire:navigate class="sub-slide-item" data-menu-type="<?=$subSubMenuName['menu_type']?>" id="sub-slide-item_<?=$subSubMenuName['id']?>"><?=$subSubMenuName['menu_name'];?></a></li>
<?php
                                }
                            }
                            echo "</ul>";
                        }
?>
                        </li>
<?php
                    }
                }
                echo '</ul>';
            }
?>
                
            </li>
<?php
        }
    }
?>
</ul>
@push('js')
<script>
    /******************** For Menu Selected Start *************************/
    function setMenuCookie(cname,cvalue,exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        var expires = "expires=" + d.toGMTString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }
    function getMenuCookie(cname) {
        var name = cname + "=";
        var decodedCookie = document.cookie;/*decodeURIComponent(document.cookie)*/
        var ca = decodedCookie.split(';');
        for(var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }
    function activeMenu() {
        var slide_item_id = getMenuCookie("lastactivepage");
        if (slide_item_id!="") {
            var menu_type = $("#"+slide_item_id).attr('data-menu-type');
            if (menu_type==0) {
                $("#"+slide_item_id).addClass('active');
            } else {
                $("#"+slide_item_id).addClass('active');
            }
            
        }
    }
    $('.slide a').click(function(){
        var slide_item_id = $(this).attr("id");
        if($(this).prop("href")!=undefined && $(this).prop("href")!=""){
            setMenuCookie("lastactivepage", slide_item_id, 1);
        } else {
            setMenuCookie("lastactivepage", null, 1);
        }
    });
    $(document).ready(function() {
        activeMenu();
    });
    /******************** For Menu Selected End *************************/
</script>
@endpush