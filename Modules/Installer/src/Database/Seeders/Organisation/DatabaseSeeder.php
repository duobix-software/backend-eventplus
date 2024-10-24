<?php

namespace Duobix\Installer\Database\Seeders\Organisation;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(OrganisationsTableSeeder::class);
        $this->call(OrganizersTableSeeder::class);
    }
}
