<?php

namespace Duobix\Installer\Database\Seeders\Core;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('locales')->delete();

        DB::table('locales')->insert([
            'id' => 1,
            'code' => 'en',
            'name' => 'English',
            'direction' => 'ltr',
        ]);
    }
}
