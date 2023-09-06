<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'guest',
                'password' => Hash::make('12345'),
                'user_type_id' => '2',
                'user_type' => 'Guest User',
                'name' => 'Guest',
                'mobile_no' => '0000000000',
                'email' => 'guest@guest.com',
                'address' => 'India',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'status' => '0'
            ], [
                'username' => 'super',
                'password' => Hash::make('12345'),
                'user_type_id' => '2',
                'user_type' => 'Super Admin',
                'name' => 'Super Admin',
                'mobile_no' => '800276899',
                'email' => 'super@super.com',
                'address' => 'India',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'status' => '1',
            ], [
                'username' => 'admin',
                'password' => Hash::make('12345'),
                'user_type_id' => '3',
                'user_type' => 'Admin',
                'name' => 'Admin',
                'mobile_no' => '1111111111',
                'email' => 'admin@admin.com',
                'address' => 'India',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'status' => '1',
            ]
        ]);
        for ($i = 0; $i < 4; $i++) {
            DB::table('users')->insert([
                'username' => Str::random(5),
                'password' => Hash::make('12345'),
                'user_type_id' => '3',
                'user_type' => 'Admin',
                'name' => Str::random(6).' '.Str::random(15),
                'mobile_no' => rand(1000000000, 9999999999),
                'email' => Str::random(10).'@gmail.com',
                'address' => 'India',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'status' => '1',
            ]);
        }
    }
}
