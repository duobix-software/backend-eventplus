<?php

namespace Duobix\Event\Observers;

use Duobix\Event\Jobs\FlattenEvent;
use Duobix\Event\Models\Event;
use Duobix\Event\Models\EventFlat;
use Illuminate\Support\Facades\DB;

use function Pest\Laravel\delete;

class EventObserver
{
    /**
     * Handle the Event "created" event.
     */
    public function created(Event $event): void
    {
        FlattenEvent::dispatch($event);
    }

    /**
     * Handle the Event "updated" event.
     */
    public function updated(Event $event): void
    {
        FlattenEvent::dispatch($event);
    }

    /**
     * Handle the Event "deleted" event.
     */
    public function deleted(Event $event): void
    {
        DB::table('event_flat')->where('event_id', $event->id)->delete();
    }

    /**
     * Handle the Event "restored" event.
     */
    public function restored(Event $event): void
    {
        //
    }

    /**
     * Handle the Event "force deleted" event.
     */
    public function forceDeleted(Event $event): void
    {
        //
    }
}
