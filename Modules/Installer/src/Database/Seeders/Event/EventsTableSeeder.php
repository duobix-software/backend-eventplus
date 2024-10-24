<?php

namespace Duobix\Installer\Database\Seeders\Event;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventsTableSeeder extends Seeder {

    const DATA_PATH = __DIR__ . "/../../../app/Data/Event";

    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('events')->delete();

        DB::table('event_dates')->delete();

        DB::table('event_pricings')->delete();

        DB::table('events')->insert(require self::DATA_PATH . '/events.php');

        DB::table('event_dates')->insert(require self::DATA_PATH . '/event_dates.php');

        DB::table('event_pricings')->insert(require self::DATA_PATH . '/event_pricings.php');
    }
}