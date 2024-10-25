<?php

namespace Duobix\Installer\Database\Seeders\Event;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventsTableSeeder extends Seeder {

    const DATA_PATH = __DIR__ . "/../../../src/Data/Event";

    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('events')->delete();

        DB::table('event_dates')->delete();

        DB::table('event_pricings')->delete();

        DB::table('events')->insert(require module_path('Installer', 'src/Data/Event/events.php'));

        DB::table('event_dates')->insert(require module_path('Installer', 'src/Data/Event/event_dates.php'));

        DB::table('event_pricings')->insert(require module_path('Installer', 'src/Data/Event/event_pricings.php'));

        DB::table('addresses')->insert(require module_path('Installer', 'src/Data/Event/event_addresses.php'));
    }
}