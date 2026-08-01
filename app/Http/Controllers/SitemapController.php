<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Category;
use App\Models\Product;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapController extends Controller
{
    public function index()
    {
        $sitemap = Sitemap::create();

        // Static pages
        foreach ([
            '/'                  => ['priority' => 1.0,  'changefreq' => 'daily'],
            '/shop'              => ['priority' => 0.9,  'changefreq' => 'daily'],
            '/new-arrivals'      => ['priority' => 0.8,  'changefreq' => 'daily'],
            '/best-sellers'      => ['priority' => 0.8,  'changefreq' => 'weekly'],
            '/about'             => ['priority' => 0.6,  'changefreq' => 'monthly'],
            '/blog'              => ['priority' => 0.7,  'changefreq' => 'weekly'],
            '/faq'               => ['priority' => 0.6,  'changefreq' => 'monthly'],
            '/contact'           => ['priority' => 0.5,  'changefreq' => 'monthly'],
            '/shipping-returns'  => ['priority' => 0.5,  'changefreq' => 'monthly'],
            '/testimonials'      => ['priority' => 0.5,  'changefreq' => 'weekly'],
        ] as $path => $meta) {
            $sitemap->add(Url::create(url($path))->setPriority($meta['priority'])->setChangeFrequency($meta['changefreq']));
        }

        // Categories
        Category::all()->each(fn($cat) =>
            $sitemap->add(Url::create(route('category.show', $cat->slug))->setPriority(0.8)->setChangeFrequency('weekly'))
        );

        // Products
        Product::where('is_active', true)->get()->each(fn($p) =>
            $sitemap->add(Url::create(route('product.show', $p->slug))->setPriority(0.7)->setChangeFrequency('weekly')->setLastModificationDate($p->updated_at))
        );

        // Blog posts
        BlogPost::published()->get()->each(fn($post) =>
            $sitemap->add(Url::create(route('blog.show', $post->slug))->setPriority(0.6)->setChangeFrequency('monthly')->setLastModificationDate($post->updated_at))
        );

        return $sitemap->toResponse(request());
    }
}
