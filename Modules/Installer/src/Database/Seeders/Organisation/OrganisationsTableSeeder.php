<?php

namespace Duobix\Installer\Database\Seeders\Organisation;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganisationsTableSeeder extends Seeder
{
    const DATA_PATH = __DIR__ . "/../../../src/Data/Organisation";

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('organisations')->delete();

        DB::table('organisations')->insert(require module_path('Installer', 'src/Data/Organisation/organisations.php'));
    }
}
