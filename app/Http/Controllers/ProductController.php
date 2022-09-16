<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::query()->with('category')->orderBy('id', 'desc')->paginate(5);
        return view('product.index', compact('products'));
    }

    public function imageSave($file)
    {
        $name = uniqid() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images/'), $name);
        return $name;
    }

    public function create()
    {
        $categories = Category::query()->get();
        return view('product.create', compact('categories'));
    }

    public function store(StoreProductRequest $request)
    {
        $attributes = $request->validated();
        if ($request->file('image')) {
            $attributes['image'] = $this->imageSave($request->file('image'));
        }

        Product::create($attributes);

        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }

    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::query()->get();
        return view('product.edit', compact('product', 'categories'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $attributes = $request->validated();

        if ($request->file('image')) {
            $attributes['image'] = $this->imageSave($request->file('image'));
        }
        $product->update($attributes);

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return back()->with('success', 'You are successfully deleted product!');
    }
}
