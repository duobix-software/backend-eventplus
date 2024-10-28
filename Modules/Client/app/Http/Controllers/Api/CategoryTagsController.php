<?php

namespace Duobix\Client\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Duobix\Client\Transformers\TagResource;
use Duobix\Tag\Repositories\TagRepository;
use Illuminate\Http\Request;

class CategoryTagsController extends Controller
{
    public function __construct(protected TagRepository $tagRepository) {}

    public function index(Request $request)
    {
        $tags = $this->tagRepository->whereHas('categories', function ($query) use ($request) {
            $query->where('slug', $request->route('category'));
        })->get();

        return TagResource::collection($tags);
    }
}
