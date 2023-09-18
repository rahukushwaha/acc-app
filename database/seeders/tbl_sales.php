<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class tbl_sales extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tbl_sale_dtls')->truncate();
        DB::table('tbl_sales')->truncate();
        $faker = Factory::create();
        for ($j=0; $j < 15000; $j++) { 
            $varMobileNo = "99".random_int(44444444, 99999999);
            $varInvoiceNo = "INS2223".random_int(444444, 999999);
            $varGstin = "GSTIN0".strtoupper(Str::random(3)).random_int(1111, 9999).strtoupper(Str::random(3));
            $intDateBt= mt_rand(strtotime("2023-01-01"), strtotime(date("Y-m-d")));
            $dtInvoiceDate = date("Y-m-d H:i:s", $intDateBt);
            $decSubTotalAmt = mt_rand(100,99999);
            $insertData = [
                "intPartyDtlsId" => 1,
                "varPartyName" => $faker->name(),
                "varMobileNo" => $varMobileNo,
                "varBillingAddress" => $faker->address(),
                "intSupplyPlaceStateMstrsId" => 10,
                "varSupplyPlaceStateName" => 10,
                "varGstin" => $varGstin,
                "varInvoiceNo" => $varInvoiceNo,
                "dtInvoiceDate" => $dtInvoiceDate,
                "intPaymentTerms" => 0,
                "dtDueDate" => $dtInvoiceDate,
                "decSubTotalDiscount" => 0,
                "decSubTotalTax" => 0,
                "decSubTotalAmt" => $decSubTotalAmt,
                "decTaxableAmt" => 0,
                "intSGSTPer" => 0,
                "decSGSTAmt" => 0,
                "intCGSTPer" => 0,
                "decCGSTAmt" => 0,
                "intIGSTPer" => 0,
                "decIGSTAmt" => 0,
                "decAdditionalChargesAmt" => 0,
                "decExtraDiscountAmt" => 0,
                "intIsRoundOff" => 0,
                "decRoundOffAmt" => 0,
                "decTotalAmt" => $decSubTotalAmt,
                "decReceiveAmt" => $decSubTotalAmt,
                "decBalanceAmt" => 0,
                "decPreviousPartyBalanceAmt" => 0,
                "isPartyFullPaid" => 1,
                "varNotes" => "",
                "varTermsNCondition" => "",
                "bitDeletedFlag" => 0,
                "intCreatedby" => 1,
                "intUpdatedby" => null,
                "created_at" => Carbon::now()->format('Y-m-d H:i:s'),
                "updated_at" => null
            ];
            $intSalesId = DB::table('tbl_sales')->insertGetId($insertData);
            $insertSubData = [];
            for ($i=0; $i < rand(1, 5); $i++) { 
                $varProductSerialNo = "PDN".random_int(444444, 999999);
                $intQtr = random_int(1, 5);
                $decSalesPrice = random_int(100, 9999);
                $decAmount = $intQtr * $decSalesPrice;
                $insertSubData[] = [
                    "varItemType" => null,
                    "varBarcode" => null,
                    "intSalesId" => $intSalesId,
                    "intItemMstrsId" => 1,
                    "intSubItemMstrsId" => rand(1, 5),
                    "varProductSerialNo" => $varProductSerialNo,
                    "varSAC" => null,
                    "intQty" => $intQtr,
                    "decSalesPrice" => $decSalesPrice,
                    "decDiscountPer" => 0,
                    "decDiscountAmt" => 0,
                    "decTaxAmt" => 0,
                    "intGstPer" => 0,
                    "decAmount" => $decAmount,
                    "bitDeletedFlag" => 0,
                    "intCreatedby" => 1,
                    "intUpdatedby" => null,
                    "created_at" => Carbon::now()->format('Y-m-d H:i:s'),
                    "updated_at" => null 
                ];
            }
            DB::table('tbl_sale_dtls')->insert($insertSubData);
        }
        
    }
}
