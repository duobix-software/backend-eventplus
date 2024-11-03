<?php

namespace Duobix\Client\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventDatesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => (string) $this->id,
            'start_date' => $this->is_datetime ? $this->start_date : $this->start_date->format('Y-m-d') ,
            'end_date' => $this->is_datetime ? $this->end_date : $this->end_date->format('Y-m-d') ,
            'duration' => $this->duration,
        ];
    }
}
