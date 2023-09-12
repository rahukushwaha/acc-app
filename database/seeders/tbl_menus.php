<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tbl_menus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_menus')->truncate();
        DB::table('tbl_menus')->insert([
            [
                'menu_type' => '0',
                'menu_name' => 'Dashboard',
                'menu_url' => 'Dashboard',
                'menu_icon' => null,
                'parent_menu_id' => null,
                'status' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'menu_type' => '1',
                'menu_name' => 'File Permission',
                'menu_url' => '#',
                'menu_icon' => 'fa fa-folder',
                'parent_menu_id' => null,
                'status' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'menu_type' => '2',
                'menu_name' => 'Menu List',
                'menu_url' => 'FilePermission/Menu',
                'menu_icon' => null,
                'parent_menu_id' => '2',
                'status' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'menu_type' => '1',
                'menu_name' => 'Sub Menu One',
                'menu_url' => '#',
                'menu_icon' => null,
                'parent_menu_id' => null,
                'status' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'menu_type' => '2',
                'menu_name' => 'Sub Menu Lisk',
                'menu_url' => 'sub/menu/link',
                'menu_icon' => null,
                'parent_menu_id' => '4',
                'status' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'menu_type' => '3',
                'menu_name' => 'Sub Menu Two',
                'menu_url' => '#',
                'menu_icon' => null,
                'parent_menu_id' => '4',
                'status' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'menu_type' => '4',
                'menu_name' => 'Sub Menu Link One',
                'menu_url' => 'submeu/link/one',
                'menu_icon' => null,
                'parent_menu_id' => '6',
                'status' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'menu_type' => '4',
                'menu_name' => 'Sub Menu Link Two',
                'menu_url' => 'submeu/link/two',
                'menu_icon' => null,
                'parent_menu_id' => '6',
                'status' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'menu_type' => '1',
                'menu_name' => 'Sales',
                'menu_url' => '#',
                'menu_icon' => 'fa fa-folder',
                'parent_menu_id' => null,
                'status' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'menu_type' => '2',
                'menu_name' => 'Invoice',
                'menu_url' => 'Sales/Invoice',
                'menu_icon' => null,
                'parent_menu_id' => '9',
                'status' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'menu_type' => '1',
                'menu_name' => 'Purchases',
                'menu_url' => '#',
                'menu_icon' => 'fa fa-folder',
                'parent_menu_id' => null,
                'status' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'menu_type' => '2',
                'menu_name' => 'Invoice',
                'menu_url' => 'Purchases/Invoice',
                'menu_icon' => null,
                'parent_menu_id' => '11',
                'status' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
