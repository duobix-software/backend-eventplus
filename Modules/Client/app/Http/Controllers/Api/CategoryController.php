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

    public function index()
    {
        return CategoryResource::collection($this->categoryRepository->getAll());
    }

    public function show(Request $request)
    {
        return new CategoryResource($this->categoryRepository->findByField('slug', $request->route('category'))->first());
    }
}
