<?php

namespace Duobix\Client\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrganisationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'slug' => $this->slug,
            'name' => $this->name,
            'logo' => $this->logo,
            'slogan' => $this->sloagan,
            'description' => $this->description,
            'website' => $this->website,
            'organisation_url' => $this->when($request->routeIs('api.organisation.index'), route('api.organisation.show', $this->slug)),
            'category' => $this->whenLoaded('category', fn () => new CategoryResource($this->category)),
            'events' => EventResource::collection($this->whenLoaded('events')),
        ];
    }
}
