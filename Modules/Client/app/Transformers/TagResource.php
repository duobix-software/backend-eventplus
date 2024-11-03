<?php

namespace Duobix\Client\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TagResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => (string) $this->id,
            'name' => $this->name,
            'tag_url' => route('api.tag.show', ['tag' => $this->id]),
            'categories_url' => route('api.tag.category.index', ['tag' => $this->id]),
        ];
    }
}
