<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderby('id', 'desc')->paginate(10);
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $attributes = $request->validated();

        Category::create($attributes);

        return redirect()->route('categories.index')->with('success', 'You created successfully category!');
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $attributes = $request->validated();

        $category->update($attributes);

        return redirect()->route('categories.index')->with('success', 'You updated category successfully!');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return back()->with('success', 'You are successfully deleted category!');
    }
}
