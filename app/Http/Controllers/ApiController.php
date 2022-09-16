<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function showCategory()
    {
        $category = Category::query()->orderBy('id', 'desc')->paginate(5);
        return response()->json([
            'success' => true,
            'data' => $category
        ]);
    }

    public function showProducts()
    {
        $products = Product::query()->orderBy('id', 'desc')->with('category')->paginate(5);
        return response()->json([
            'success' => true,
            'data' => $products
        ]);
    }
}
