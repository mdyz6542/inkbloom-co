<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        $product->load('category', 'images');

        $related = Product::where('category_id', $product->category_id)
                          ->where('id', '!=', $product->id)
                          ->where('is_active', true)
                          ->with('images')
                          ->take(4)
                          ->get();

        return view('pages.product', compact('product', 'related'));
    }
}
