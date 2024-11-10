<?php

namespace Duobix\Client\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => (string) $this->id,
            'fullname' => $this->fullname,
            'image' => $this->image,
            'gender' => $this->gender,
            'dob' => $this->date_of_birth,
            'username' => $this->username,
            'email' => $this->email,
            'is_admin' => (bool) $this->isAdmin(),
            'tags' => TagResource::collection($this->whenLoaded('tags')),
        ];
    }
}
