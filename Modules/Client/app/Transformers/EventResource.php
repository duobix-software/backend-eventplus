<?php

namespace Duobix\Client\Transformers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        $priceFn = function () {
            if (count($this->eventPricings) === 1) {
                return $this->eventPricings->first()?->price;
            }
            return $this->eventPricings->sortBy('price')->first()?->price;
        };  

        $dateFn = function () {
            $date = $this->eventDates->sortBy('start_date')->first();
            $start = $date->is_datetime ? $date->start_date : $date->start_date->format('Y-m-d'); 
            return $start;
        };

        return [
            'slug' => $this->slug,
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'banner' => $this->banner,
            'max_participants' => $this->max_participants,
            'price' => $this->whenLoaded('eventPricings', $priceFn), 
            'date' => $this->whenLoaded('eventDates', $dateFn),
            'dates' => EventDatesResource::collection($this->whenLoaded('eventDates')),
            'pricings' => EventPricingsResource::collection($this->whenLoaded('eventPricings')),
            'address' => new AddressResource($this->whenLoaded('address')),
            'created_at' => $this->created_at,
            'checkout_base_url' => route('api.checkout', ['event' => $this->slug]),
        ];
    }
}
