<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tbl_company_dtls extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tbl_company_dtls')->truncate();
        DB::table('tbl_company_dtls')->insert([
            [
                'varCompanyname' => 'Aman Moble Zone',
                'varMobileNo' => '7896589458',
                'varLogoPath' => '',
                'varSignPath' => '',
                'varAdress' => 'Palihari Gomia',
                'intCompanyStateMstrsId' => 10,
                'bitDeletedFlag' => 0,
                'intCreatedby' => 1,
                'intUpdatedby' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
