<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $products = Product::where('category_id', $category->id)
                           ->where('is_active', true)
                           ->with('category', 'images')
                           ->paginate(12);

        return view('pages.category', compact('category', 'products'));
    }
}
