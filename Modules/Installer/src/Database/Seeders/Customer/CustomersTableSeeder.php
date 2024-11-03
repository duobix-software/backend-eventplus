<?php

namespace Duobix\Installer\Database\Seeders\Customer;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            'fullname' => 'example user',
            'phone' => '0770801128',
            'username' => 'user',
            'password' => bcrypt('password'),
        ]);
    }
}
