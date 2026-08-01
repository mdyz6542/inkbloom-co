<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\BlogCategory;

class BlogController extends Controller
{
    public function index()
    {
        $featured = BlogPost::published()->latest('published_at')->first();
        $posts = BlogPost::published()
            ->with('category')
            ->latest('published_at')
            ->when($featured, fn($q) => $q->where('id', '!=', $featured->id))
            ->paginate(6);
        $categories = BlogCategory::withCount(['posts' => fn($q) => $q->published()])->get();

        return view('pages.blog', compact('featured', 'posts', 'categories'));
    }

    public function show(BlogPost $post)
    {
        abort_if($post->status !== 'published', 404);
        $related = BlogPost::published()
            ->where('id', '!=', $post->id)
            ->when($post->blog_category_id, fn($q) => $q->where('blog_category_id', $post->blog_category_id))
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('pages.blog-post', compact('post', 'related'));
    }
}
