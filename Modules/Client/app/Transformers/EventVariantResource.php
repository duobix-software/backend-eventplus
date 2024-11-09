<?php

namespace Duobix\Client\Transformers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Resources\Json\JsonResource;

class EventVariantResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'event' => $this->whenLoaded('event'),
            'event_date' => $this->whenLoaded('event', fn() => $this->event->eventDates->where('id', $this->event_date_id)->first(), fn() => DB::table('event_dates')->where('id', $this->event_date_id)->first()),
            'event_pricing' => $this->whenLoaded('event', fn() => $this->event->eventPricings->where('id', $this->event_pricing_id)->first(), fn() => DB::table('event_pricings')->where('id', $this->event_pricing_id)->first()),
        ];
    }
}
