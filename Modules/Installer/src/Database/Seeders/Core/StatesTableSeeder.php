<?php

namespace Duobix\Installer\Database\Seeders\Core;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\table;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('country_states')->delete();

        $states = json_decode(file_get_contents(module_path('Installer', 'app/Data/states.json')), true);

        DB::table('country_states')->insert($states);
    }
}
