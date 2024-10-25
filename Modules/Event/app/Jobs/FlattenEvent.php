<?php

namespace Duobix\Event\Jobs;

use Illuminate\Bus\Queueable;
use Duobix\Event\Models\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Duobix\Event\Repositories\EventFlatRepository;

class FlattenEvent implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        protected Event $event,

    ) {}

    /**
     * Execute the job.
     */
    public function handle(EventFlatRepository $eventFlatRepository): void {
        $eventFlatRepository->updateOrCreate([
            'event_id'         => $this->event->id,
        ], [
            'event_id'         => $this->event->id,
            'organisation_id'  => $this->event->organisation_id,
            'category_id'      => $this->event?->category->id,
            'status'           => $this->event->status,
            'slug'             => $this->event->slug,
            'title'            => $this->event->title,
            'description'      => $this->event->description,
            'banner'           => $this->event->banner,
            'max_participants' => $this->event->max_participants,
            'organisation'     => $this->event->organisation->select(['id', 'slug', 'name']),
            'dates'            => $this->event?->eventDates->select(['id', 'start_date', 'end_date', 'duration', 'is_datetime']),
            'pricings'         => $this->event?->eventPricings->select(['id', 'name', 'description', 'quota', 'price']),
            'category'         => $this->event?->category?->first(['id', 'name']),
            'tags'             => $this->event->tags()->map(fn($tag) => $tag->name)->toArray(),
        ]);
    }
}
