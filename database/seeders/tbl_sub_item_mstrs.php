<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tbl_sub_item_mstrs extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tbl_sub_item_mstrs')->truncate();
        DB::table('tbl_sub_item_mstrs')->insert([
            [
                'intItemMstrsId' => 1,
                'varSubItem' => 'Oppo Reno 10',
                'varDesc' => null,
                'bitDeletedFlag' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'intItemMstrsId' => 1,
                'varSubItem' => 'Oppo Reno 10 Pro',
                'varDesc' => null,
                'bitDeletedFlag' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'intItemMstrsId' => 1,
                'varSubItem' => 'Oppo Reno 10 Pro +',
                'varDesc' => null,
                'bitDeletedFlag' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'intItemMstrsId' => 1,
                'varSubItem' => 'Oppo Reno 11',
                'varDesc' => null,
                'bitDeletedFlag' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'intItemMstrsId' => 1,
                'varSubItem' => 'Oppo Reno 11 Pro',
                'varDesc' => null,
                'bitDeletedFlag' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'intItemMstrsId' => 1,
                'varSubItem' => 'Oppo Reno 11 Pro +',
                'varDesc' => null,
                'bitDeletedFlag' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'intItemMstrsId' => 1,
                'varSubItem' => 'IQOO Z7 Pro 5G',
                'varDesc' => null,
                'bitDeletedFlag' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'intItemMstrsId' => 1,
                'varSubItem' => 'IQOO Z6 Pro 5G',
                'varDesc' => null,
                'bitDeletedFlag' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'intItemMstrsId' => 1,
                'varSubItem' => 'VIVO V29 Pro 5G',
                'varDesc' => null,
                'bitDeletedFlag' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ]);
    }
}
