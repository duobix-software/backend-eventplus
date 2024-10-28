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
            'category_url' => route('api.category.show', ['category' => $this->slug]),
            'tags_url' => route('api.category.tag.index', ['category' => $this->slug]),
        ];
    }
}
