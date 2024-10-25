<?php

namespace Duobix\Event\Console;

use Duobix\Event\Enums\EventStatus;
use Duobix\Event\Jobs\FlattenEvent;
use Duobix\Event\Models\Event;
use Duobix\Event\Repositories\EventFlatRepository;
use Duobix\Event\Repositories\EventRepository;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class EventIndexer extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'indexer:index';

    /**
     * The console command description.
     */
    protected $description = 'Automatically index & update events.';

    /**
     * Create a new command instance.
     */
    public function __construct(
        protected EventRepository $eventRepository,
        protected EventFlatRepository $eventFlatRepository,
    ) {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle() {
        // should 
        Event::query()->chunk(500, function ($events) {
            foreach ($events as $event) {
                FlattenEvent::dispatchSync($event);
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
