<?php

namespace Duobix\Client\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Duobix\Client\Transformers\CategoryResource;
use Duobix\Category\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    public function __construct(
        protected CategoryRepository $categoryRepository
    ) {}

    public function index(Request $request)
    {
        $request->validate([
            'with-tags' => ['nullable', 'boolean'],
        ]);

        return CategoryResource::collection($this->categoryRepository->getAll($request->all()));
    }

    public function show(Request $request)
    {
        return new CategoryResource($this->categoryRepository->findByField('slug', $request->route('category'))->first());
    }
}
