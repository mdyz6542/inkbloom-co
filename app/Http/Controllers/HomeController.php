<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Category;
use App\Models\Product;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $categories   = Category::whereNull('parent_id')->orderBy('sort_order')->get();
        $newArrivals  = Product::where('is_new', true)->where('is_active', true)->with('category')->take(4)->get();
        $bestSellers  = Product::where('is_bestseller', true)->where('is_active', true)->with('category')->take(4)->get();
        $cutePicks    = Product::whereHas('category', fn($q) => $q->where('slug', 'cute-collection'))
                               ->where('is_active', true)->with('category')->take(6)->get();
        $testimonials = Testimonial::where('is_featured', true)->take(3)->get();
        $blogPosts    = BlogPost::where('status', 'published')->latest('published_at')->take(3)->get();

        return view('pages.home', compact(
            'categories', 'newArrivals', 'bestSellers', 'cutePicks', 'testimonials', 'blogPosts'
        ));
    }
}
