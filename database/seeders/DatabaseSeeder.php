<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\Category;
use App\Models\Product;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        User::create([
            'name'     => 'Admin',
            'email'    => env('DEMO_ADMIN_EMAIL', 'admin@inkbloom.com'),
            'password' => bcrypt(env('DEMO_ADMIN_PASSWORD', \Illuminate\Support\Str::random(20))),
        ]);

        // Categories
        $categories = [
            ['name' => 'Writing',           'slug' => 'writing',          'tagline' => 'The quietly life-changing kind.',                         'sort_order' => 1],
            ['name' => 'Paper',             'slug' => 'paper',            'tagline' => 'Pretty pages make you want to fill them.',                 'sort_order' => 2],
            ['name' => 'Art & Craft',       'slug' => 'art-craft',        'tagline' => 'Your next creative obsession starts here.',                'sort_order' => 3],
            ['name' => 'School Essentials', 'slug' => 'school-essentials','tagline' => 'Everything you need, actually cute for once.',              'sort_order' => 4],
            ['name' => 'Office & Desk',     'slug' => 'office-desk',      'tagline' => 'Your desk should be a place you actually want to sit at.', 'sort_order' => 5],
            ['name' => 'Cute Collection',   'slug' => 'cute-collection',  'tagline' => 'The one that started it all.',                             'sort_order' => 6],
            ['name' => 'Gifts & Bundles',   'slug' => 'gifts-bundles',    'tagline' => 'Takes the guesswork out of gifting.',                      'sort_order' => 7],
        ];

        foreach ($categories as $cat) {
            Category::create(array_merge($cat, ['is_active' => true]));
        }

        $writing   = Category::where('slug', 'writing')->first();
        $paper     = Category::where('slug', 'paper')->first();
        $art       = Category::where('slug', 'art-craft')->first();
        $school    = Category::where('slug', 'school-essentials')->first();
        $office    = Category::where('slug', 'office-desk')->first();
        $cute      = Category::where('slug', 'cute-collection')->first();
        $gifts     = Category::where('slug', 'gifts-bundles')->first();

        // Products
        $products = [
            // Writing
            ['name'=>'Pastel Gel Pen Set',         'slug'=>'pastel-gel-pen-set',         'category_id'=>$writing->id, 'price'=>350,  'sale_price'=>299,  'stock'=>50,  'is_new'=>true,  'is_featured'=>true,  'is_bestseller'=>false, 'tagline'=>'Smooth as a quiet morning.'],
            ['name'=>'Bloom Character Pen',         'slug'=>'bloom-character-pen',         'category_id'=>$writing->id, 'price'=>199,  'sale_price'=>null, 'stock'=>80,  'is_new'=>true,  'is_featured'=>false, 'is_bestseller'=>true,  'tagline'=>'Too cute to put down.'],
            ['name'=>'Mechanical Pencil Set',       'slug'=>'mechanical-pencil-set',       'category_id'=>$writing->id, 'price'=>450,  'sale_price'=>399,  'stock'=>30,  'is_new'=>false, 'is_featured'=>false, 'is_bestseller'=>true,  'tagline'=>'Precision, but make it pretty.'],
            // Paper
            ['name'=>'Floral Hardcover Journal',    'slug'=>'floral-hardcover-journal',    'category_id'=>$paper->id,   'price'=>650,  'sale_price'=>550,  'stock'=>25,  'is_new'=>true,  'is_featured'=>true,  'is_bestseller'=>true,  'tagline'=>'For thoughts too good to lose.'],
            ['name'=>'Pastel Sticky Notes Bundle',  'slug'=>'pastel-sticky-notes-bundle',  'category_id'=>$paper->id,   'price'=>299,  'sale_price'=>null, 'stock'=>100, 'is_new'=>false, 'is_featured'=>false, 'is_bestseller'=>true,  'tagline'=>'Leave little notes everywhere.'],
            ['name'=>'Weekly Planner Diary',        'slug'=>'weekly-planner-diary',        'category_id'=>$paper->id,   'price'=>550,  'sale_price'=>480,  'stock'=>20,  'is_new'=>true,  'is_featured'=>false, 'is_bestseller'=>false, 'tagline'=>'Plan it. Live it. Love it.'],
            // Art & Craft
            ['name'=>'Watercolor Paint Set 24',     'slug'=>'watercolor-paint-set-24',     'category_id'=>$art->id,     'price'=>850,  'sale_price'=>750,  'stock'=>15,  'is_new'=>false, 'is_featured'=>true,  'is_bestseller'=>false, 'tagline'=>'Paint your own world.'],
            ['name'=>'Sketchbook A5',               'slug'=>'sketchbook-a5',               'category_id'=>$art->id,     'price'=>399,  'sale_price'=>null, 'stock'=>40,  'is_new'=>false, 'is_featured'=>false, 'is_bestseller'=>true,  'tagline'=>'Blank pages, endless ideas.'],
            // School Essentials
            ['name'=>'Kawaii Pencil Case',          'slug'=>'kawaii-pencil-case',          'category_id'=>$school->id,  'price'=>499,  'sale_price'=>429,  'stock'=>35,  'is_new'=>true,  'is_featured'=>true,  'is_bestseller'=>true,  'tagline'=>'Your supplies deserve a cute home.'],
            ['name'=>'Geometry Box Deluxe',         'slug'=>'geometry-box-deluxe',         'category_id'=>$school->id,  'price'=>350,  'sale_price'=>null, 'stock'=>60,  'is_new'=>false, 'is_featured'=>false, 'is_bestseller'=>false, 'tagline'=>'All the tools, none of the stress.'],
            // Office & Desk
            ['name'=>'Pastel Desk Organizer',       'slug'=>'pastel-desk-organizer',       'category_id'=>$office->id,  'price'=>750,  'sale_price'=>650,  'stock'=>18,  'is_new'=>true,  'is_featured'=>true,  'is_bestseller'=>false, 'tagline'=>'Tidy desk, clear mind.'],
            ['name'=>'Aesthetic File Folder Set',   'slug'=>'aesthetic-file-folder-set',   'category_id'=>$office->id,  'price'=>399,  'sale_price'=>null, 'stock'=>45,  'is_new'=>false, 'is_featured'=>false, 'is_bestseller'=>false, 'tagline'=>'Filing never looked this good.'],
            // Cute Collection
            ['name'=>'Kawaii Sticker Mega Pack',    'slug'=>'kawaii-sticker-mega-pack',    'category_id'=>$cute->id,    'price'=>299,  'sale_price'=>249,  'stock'=>120, 'is_new'=>true,  'is_featured'=>true,  'is_bestseller'=>true,  'tagline'=>'Stick them everywhere.'],
            ['name'=>'Pastel Washi Tape Set',       'slug'=>'pastel-washi-tape-set',       'category_id'=>$cute->id,    'price'=>450,  'sale_price'=>399,  'stock'=>75,  'is_new'=>true,  'is_featured'=>true,  'is_bestseller'=>true,  'tagline'=>'Wrap everything in pretty.'],
            ['name'=>'Stitch Memo Pad',             'slug'=>'stitch-memo-pad',             'category_id'=>$cute->id,    'price'=>250,  'sale_price'=>null, 'stock'=>90,  'is_new'=>false, 'is_featured'=>false, 'is_bestseller'=>true,  'tagline'=>'Even your notes need a best friend.'],
            ['name'=>'Bloom Aesthetic Set',         'slug'=>'bloom-aesthetic-set',         'category_id'=>$cute->id,    'price'=>899,  'sale_price'=>799,  'stock'=>30,  'is_new'=>true,  'is_featured'=>true,  'is_bestseller'=>false, 'tagline'=>'The whole vibe, in one box.'],
            ['name'=>'Disney Character Eraser Set', 'slug'=>'disney-character-eraser-set', 'category_id'=>$cute->id,    'price'=>350,  'sale_price'=>299,  'stock'=>55,  'is_new'=>false, 'is_featured'=>false, 'is_bestseller'=>true,  'tagline'=>'Too cute to use. Use them anyway.'],
            // Gifts & Bundles
            ['name'=>'Back to School Bundle',       'slug'=>'back-to-school-bundle',       'category_id'=>$gifts->id,   'price'=>1499, 'sale_price'=>1299, 'stock'=>20,  'is_new'=>false, 'is_featured'=>true,  'is_bestseller'=>true,  'tagline'=>'Everything for a fresh start.'],
            ['name'=>'Kawaii Birthday Box',         'slug'=>'kawaii-birthday-box',         'category_id'=>$gifts->id,   'price'=>1999, 'sale_price'=>1799, 'stock'=>10,  'is_new'=>true,  'is_featured'=>true,  'is_bestseller'=>false, 'tagline'=>'The gift that makes them squeal.'],
            ['name'=>'Desk Refresh Gift Set',       'slug'=>'desk-refresh-gift-set',       'category_id'=>$gifts->id,   'price'=>1299, 'sale_price'=>null, 'stock'=>15,  'is_new'=>false, 'is_featured'=>false, 'is_bestseller'=>false, 'tagline'=>'A whole new desk energy.'],
        ];

        foreach ($products as $product) {
            Product::create(array_merge($product, ['is_active' => true]));
        }

        // Blog Categories
        $blogCats = ['Study Tips & Productivity', 'Desk Setup & Aesthetics', 'Stationery Guides & Reviews', 'Back to School', 'Seasonal & Occasions', 'Brand Updates'];
        foreach ($blogCats as $bc) {
            BlogCategory::create(['name' => $bc, 'slug' => \Illuminate\Support\Str::slug($bc)]);
        }

        // Sample Blog Posts
        $blogCat = BlogCategory::first();
        BlogPost::create([
            'blog_category_id' => $blogCat->id,
            'title'      => 'Best Pens for Students in Pakistan 2026',
            'slug'       => 'best-pens-for-students-pakistan-2026',
            'excerpt'    => 'A comprehensive guide to the smoothest, most affordable pens every student in Pakistan should know about.',
            'content'    => 'Finding the right pen can change everything. Here are our top picks...',
            'status'     => 'published',
            'published_at' => now(),
        ]);

        // Testimonials
        $testimonials = [
            ['name'=>'Fatima K.',    'rating'=>5, 'text'=>'Absolutely obsessed with the washi tape set! Packaging was so cute and delivery was super fast.',        'is_approved'=>true, 'is_featured'=>true],
            ['name'=>'Hana M.',      'rating'=>5, 'text'=>'The Bloom Aesthetic Set is everything. My desk looks like a Pinterest board now.',                         'is_approved'=>true, 'is_featured'=>true],
            ['name'=>'Sara R.',      'rating'=>5, 'text'=>'Finally a Pakistani stationery brand that actually gets the aesthetic. The gel pens are 10/10.',            'is_approved'=>true, 'is_featured'=>true],
            ['name'=>'Zainab A.',    'rating'=>4, 'text'=>'Love the kawaii stickers. Will definitely order again!',                                                    'is_approved'=>true, 'is_featured'=>false],
        ];
        foreach ($testimonials as $t) {
            Testimonial::create($t);
        }
    }
}
