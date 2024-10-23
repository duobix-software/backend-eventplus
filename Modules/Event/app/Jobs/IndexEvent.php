<?php

namespace Duobix\Event\Jobs;

use Illuminate\Bus\Queueable;
use Duobix\Event\Models\Event;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class IndexEvent implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        protected Event $event
    ) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        DB::table('event_flat')->insert([
            'organisation_id' => $this->event->organisation->id,
            'category_id' => $this->event->organisation->category_id,
            'event_id' => $this->event->id,
            'slug' => $this->event->slug,
            'title' => $this->event->title,
            'description' => $this->event->description,
            'banner' => $this->event->banner,
            'max_participants' => $this->event->max_participants,
            'dates' => json_encode($this->event->eventDates),
            'pricings' => json_encode($this->event->eventPricings),
        ]);
    }
}
