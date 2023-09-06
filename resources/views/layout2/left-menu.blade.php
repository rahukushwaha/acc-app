<!--APP-SIDEBAR-->
<div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
	<aside class="app-sidebar">
		<div class="side-header">
			<a class="header-brand1" href="index.html">
				<img src="{{ asset('assets/images/brand/logo.png') }}" class="header-brand-img desktop-logo" alt="logo">
				<img src="{{ asset('assets/images/brand/logo-1.png') }}" class="header-brand-img toggle-logo" alt="logo">
				<img src="{{ asset('assets/images/brand/logo-2.png') }}" class="header-brand-img light-logo" alt="logo">
				<img src="{{ asset('assets/images/brand/logo-3.png') }}" class="header-brand-img light-logo1" alt="logo">
			</a><!-- LOGO -->
		</div>
		<ul class="side-menu">
			<li><h3>Main</h3></li>
<?php
    $menuList = Storage::disk('local')->get("menu_list/".$UserUtility->getLoggerId().'.json');
    $menuList = json_decode($menuList, true);
    foreach ($menuList as $key => $menuName) {
        if ($menuName['menu_type']==0) {
?>
			<li class="slide">
				<a class="side-menu__item"  data-bs-toggle="slide" href="<?=URL::to($menuName['menu_url'])?>" data-menu-type="<?=$menuName['menu_type']?>" id="slide-item_<?=$menuName['id']?>">
					<i class="side-menu__icon <?=($menuName['menu_icon']!="")?$menuName['menu_icon']:"fa fa-home";?>"></i>
					<span class="side-menu__label"><?=$menuName['menu_name']?></span>
				</a>
			</li>
<?php
        } else if ($menuName['menu_type']==1) {
?>
			<li class="slide">
				<a class="side-menu__item" data-bs-toggle="slide" href="#" id="side-menu__item_<?=$menuName['id']?>">
					<i class="side-menu__icon <?=($menuName['menu_icon']!="")?$menuName['menu_icon']:"fa fa-home";?>"></i>
					<span class="side-menu__label"><?=$menuName['menu_name']?></span>
					<i class="angle fa fa-angle-right"></i>
				</a>
<?php
            if (isset($menuName['sub_menu'])) {
                echo '<ul class="slide-menu">';
                foreach ($menuName['sub_menu'] as $subKey => $subMenuName) {
                    if ($subMenuName['menu_type']==2) {
?>
				<li><a href="<?=URL::to($subMenuName['menu_url']);?>" class="slide-item"><?=$subMenuName['menu_name'];?></a></li>
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
                                <li><a href="<?=URL::to($subSubMenuName['menu_url']);?>" class="sub-slide-item" data-menu-type="<?=$subSubMenuName['menu_type']?>" id="sub-slide-item_<?=$subSubMenuName['id']?>"><?=$subSubMenuName['menu_name'];?></a></li>
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
		/* if (isset($menuName['sub_menu'])) {
			echo '<ul class="slide-menu">';
			foreach ($menuName['sub_menu'] as $subKey => $subMenuName) {
				if ($subMenuName['menu_type']==2) { */
?>
<?php
        }
    }
?>
		</ul>
	</aside>
<!--/APP-SIDEBAR-->