<?php

namespace Duobix\Client\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => (string) $this->id,
            'status' => $this->status,
            'event' => new EventResource($this->whenLoaded('event')),
            $this->mergeWhen($request->routeIs('api.order.show'), fn() => [
                'variant' => new EventVariantResource($this->eventVariant),
            ]),
            'created_at' => $this->created_at,
        ];
    }
}
