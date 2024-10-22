<?php

namespace Duobix\Client\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Duobix\Category\Repositories\CategoryRepository;
use Duobix\Client\Transformers\CategoryResource;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(
        protected CategoryRepository $categoryRepository
    ) {}

    public function categories(Request $request)
    {
        dd($this->categoryRepository->all());
        // return CategoryResource::collection($this->categoryRepository->all());
    }

    public function tags(Request $request)
    {
        // return $this->categoryRepository->with('tags')->find($request->route('category'));
        // return $this->categoryRepository->getTags($request->route('category'));
    }
}
