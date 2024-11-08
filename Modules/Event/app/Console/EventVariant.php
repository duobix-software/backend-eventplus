<?php

namespace Duobix\Event\Console;

use Illuminate\Support\Str;
use Duobix\Event\Models\Event;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class EventVariant extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'eventplus:variant';

    /**
     * The console command description.
     */
    protected $description = 'Generate event variants for those event who does not have any variants.';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        DB::table('event_variants')->delete();

        Event::query()->chunk(500, function ($events) {
            foreach ($events as $event) {
                if ($event->eventVariants()->count()) continue;

                $variants = [];

                $dates = $event->eventDates;

                $pricings = $event->eventPricings;

                $variant_key = $event->title . ' ';

                foreach ($dates as $date) {
                    $variant_key .= $date->is_datetime ? "{$date->start_date} {$date->end_date}" : "{$date->start_date->format('Y-m-d')} {$date->end_date->format('Y-m-d')}";

                    dump($date->is_datetime);
                    foreach ($pricings as $pricing) {
                        $variants[] = [
                            'event_id' => $event->id,
                            'event_date_id' => $date->id,
                            'event_pricing_id' => $pricing->id,
                            'name' => Str::slug($variant_key . ' ' . $pricing->name),
                            'total_qte' => $pricing->quota,
                            'remaining_qte' => $pricing->quota,
                        ];
                    }
                }

                DB::table('event_variants')->insert($variants);

                $this->warn('variants generated');
            }
        });
    }

    /**
     * Get the console command arguments.
     */
    protected function getArguments(): array
    {
        return [
            ['example', InputArgument::REQUIRED, 'An example argument.'],
        ];
    }

    /**
     * Get the console command options.
     */
    protected function getOptions(): array
    {
        return [
            ['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
        ];
    }
}
