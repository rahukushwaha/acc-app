<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            tbl_roles::class,
            users::class,
            tbl_menus::class,
            tbl_menu_permissions::class,
            tbl_company_dtls::class,
            tbl_state_mstrs::class,
            tbl_item_mstrs::class,
            tbl_sub_item_mstrs::class,

            //other
            tbl_party_dtls::class
        ]);
    }
}
