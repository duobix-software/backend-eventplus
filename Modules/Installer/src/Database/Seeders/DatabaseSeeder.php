<?php

namespace Duobix\Installer\Database\Seeders;

use Illuminate\Database\Seeder;
use Duobix\Installer\Database\Seeders\Core\DatabaseSeeder as CoreSeeder;
use Duobix\Installer\Database\Seeders\Category\DatabaseSeeder as CategorySeeder;
use Duobix\Installer\Database\Seeders\Organisation\DatabaseSeeder as OrganisationSeeder;
use Duobix\Installer\Database\Seeders\Tag\DatabaseSeeder as TagSeeder;
use Duobix\Installer\Database\Seeders\Event\DatabaseSeeder as EventSeeder;
use Duobix\Installer\Database\Seeders\Customer\DatabaseSeeder as CustomerSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(CoreSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(OrganisationSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(CustomerSeeder::class);
    }
}
