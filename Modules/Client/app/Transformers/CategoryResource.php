<?php

namespace Duobix\Client\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'slug' => $this->slug,
            'name' => $this->name,
            'description' => $this->description,
            'logo' => $this->logo,
            'banner' => $this->banner,
            'url' => $this->when($request->routeIs('api.category'), route('api.category.tags', $this->slug)),
            'tags' => TagResource::collection($this->whenLoaded('tags')),
        ];
    }
}
