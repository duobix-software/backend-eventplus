<?php

namespace Duobix\Client\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Duobix\Category\Repositories\CategoryRepository;
use Duobix\Client\Transformers\CategoryResource;
use Illuminate\Http\Request;

class TagCategoriesController extends Controller
{
    public function __construct(protected CategoryRepository $categoryRepository) {}

    public function index(Request $request)
    {
        $categories = $this->categoryRepository->whereHas('tags', function ($query) use ($request) {
            $query->where('id', $request->route('tag'));
        })->get();

        return CategoryResource::collection($categories);
    }
}
