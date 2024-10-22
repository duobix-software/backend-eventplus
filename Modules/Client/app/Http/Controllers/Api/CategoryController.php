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

    public function categories()
    {
        return CategoryResource::collection($this->categoryRepository->all());
    }

    public function tags($category)
    {
        return new CategoryResource($this->categoryRepository->with('tags')->findByField('slug', $category)->first());
    }
}
