<?php

namespace Duobix\Installer\Database\Seeders\Core;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('countries')->delete();

        $countries = json_decode(file_get_contents(module_path('Installer', 'src/Data/countries.json')), true);

        DB::table('countries')->insert($countries);
    }
}
