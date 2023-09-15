<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class tbl_supplier_dtls extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tbl_supplier_dtls')->truncate();
        $faker = Factory::create();
        $insertData = [];
        for ($j=0; $j < 100; $j++) { 
            for ($i=0; $i < 50; $i++) { 
                $varMobileNo = "99".random_int(44444444, 99999999);
                $varGstin = "GSTIN0".strtoupper(Str::random(3)).random_int(1111, 9999).strtoupper(Str::random(3));
                $insertData[$i] = [
                    'varSupplierName' => $faker->name(),
                    'varMobileNo' => $varMobileNo,
                    'varBillingAddress' => $faker->address(),
                    'bitShippingAdrSame' => 0,
                    'varShippingAddress' => $faker->address(),
                    'intSupplyPlaceStateMstrsId' => 10,
                    'varGstin' => $varGstin,
                    'bitDeletedFlag' => 0,
                    'intCreatedby' => 1,
                    'intUpdatedby' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ];
            }
            DB::table('tbl_supplier_dtls')->insert($insertData);
        }
        
    }
}
