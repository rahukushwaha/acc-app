<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tbl_item_mstrs extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tbl_item_mstrs')->truncate();
        DB::table('tbl_item_mstrs')->insert([
            [
                'varItem' => 'Phone',
                'varDesc' => null,
                'bitDeletedFlag' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'varItem' => 'Tablet',
                'varDesc' => null,
                'bitDeletedFlag' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'varItem' => 'Desktop',
                'varDesc' => null,
                'bitDeletedFlag' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'varItem' => 'Laptop',
                'varDesc' => null,
                'bitDeletedFlag' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'varItem' => 'TV',
                'varDesc' => null,
                'bitDeletedFlag' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ]);
    }
}
