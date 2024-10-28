<?php

namespace Duobix\Client\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Duobix\Client\Transformers\TagResource;
use Duobix\Tag\Repositories\TagRepository;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct(
        protected TagRepository $tagRepository
    ) {}

    public function index() {
        return TagResource::collection($this->tagRepository->getAll());
    }

    public function show(Request $request)
    {
        return new TagResource($this->tagRepository->find($request->route('tag')));
    }
}
