<?php

namespace Duobix\Installer\Database\Seeders\Organisation;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganisationsTableSeeder extends Seeder
{
    const DATA_PATH = __DIR__ . "/../../../app/Data/Organisation";

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('organisations')->delete();

        DB::table('organisations')->insert(require self::DATA_PATH . '/organisations.php');
    }
}
