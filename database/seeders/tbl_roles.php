<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tbl_roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_roles')->truncate();
        DB::table('tbl_roles')->insert([
            [
                'role_name' => 'Guest',
                'short_role_name' => 'Guest',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'status' => '1'
            ],
            [
                'role_name' => 'Super Admin',
                'short_role_name' => 'SAdmin',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'status' => '1'
            ],
            [
                'role_name' => 'Admin',
                'short_role_name' => 'Admin',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'status' => '1',
            ],
            [
                'role_name' => 'Customer',
                'short_role_name' => 'Customer',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'status' => '1',
            ],
            [
                'role_name' => 'Freelancer',
                'short_role_name' => 'Freelancer',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'status' => '1',
            ]
        ]);
    }
}