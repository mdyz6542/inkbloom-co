<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class ShopController extends Controller
{
    public function index()
    {
        $categories = Category::whereNull('parent_id')->orderBy('sort_order')->get();
        $products   = Product::where('is_active', true)->with('category', 'images')->orderBy('created_at', 'desc')->paginate(12);

        return view('pages.shop', compact('categories', 'products'));
    }

    public function newArrivals()
    {
        $products = Product::where('is_new', true)->where('is_active', true)->with('category', 'images')->paginate(12);

        return view('pages.new-arrivals', compact('products'));
    }

    public function bestSellers()
    {
        $products = Product::where('is_bestseller', true)->where('is_active', true)->with('category', 'images')->paginate(12);

        return view('pages.best-sellers', compact('products'));
    }
}
