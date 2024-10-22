<?php

namespace Duobix\Installer\Database\Seeders\Event;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    public function run(): void
    {
        $this->call(EventsTableSeeder::class);
    }
}