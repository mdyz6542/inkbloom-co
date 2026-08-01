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

        // Products. Each 'image' points at a file in public/images/products/ and is
        // stored as a product_images row so the storefront renders a real photo
        // instead of the emoji fallback.
        $products = [
            // Writing
            ['name'=>'Pastel Gel Pen Set',           'slug'=>'pastel-gel-pen-set',           'category_id'=>$writing->id, 'price'=>350,  'sale_price'=>299,  'stock'=>50,  'is_new'=>true,  'is_featured'=>true,  'is_bestseller'=>true,  'tagline'=>'Smooth as a quiet morning.',            'image'=>'bloom-gel-pen-set-pastel'],
            ['name'=>'Bloom Character Pen',          'slug'=>'bloom-character-pen',          'category_id'=>$writing->id, 'price'=>199,  'sale_price'=>null, 'stock'=>80,  'is_new'=>true,  'is_featured'=>false, 'is_bestseller'=>true,  'tagline'=>'Too cute to put down.',                 'image'=>'chick-top-ballpoint-pen'],
            ['name'=>'HB Pencil Set (12 Pack)',      'slug'=>'hb-pencil-set-12',             'category_id'=>$writing->id, 'price'=>450,  'sale_price'=>399,  'stock'=>30,  'is_new'=>false, 'is_featured'=>false, 'is_bestseller'=>true,  'tagline'=>'Precision, but make it pretty.',        'image'=>'bloom-hb-pencil-set-12'],
            ['name'=>'Sakura Fine Liner Set (10)',   'slug'=>'sakura-fine-liner-set-10',     'category_id'=>$writing->id, 'price'=>890,  'sale_price'=>790,  'stock'=>28,  'is_new'=>true,  'is_featured'=>true,  'is_bestseller'=>false, 'tagline'=>'For lines you want to keep.',           'image'=>'sakura-fine-liner-set-10'],
            ['name'=>'Pastel Highlighter Set (6)',   'slug'=>'pastel-highlighter-set-6',     'category_id'=>$writing->id, 'price'=>420,  'sale_price'=>null, 'stock'=>65,  'is_new'=>false, 'is_featured'=>false, 'is_bestseller'=>true,  'tagline'=>'Soft glow, no bleed-through.',          'image'=>'pastel-highlighter-set-6'],
            // Paper
            ['name'=>'Floral Softcover Journal A5',  'slug'=>'floral-softcover-journal-a5',  'category_id'=>$paper->id,   'price'=>650,  'sale_price'=>550,  'stock'=>25,  'is_new'=>true,  'is_featured'=>true,  'is_bestseller'=>true,  'tagline'=>'For thoughts too good to lose.',        'image'=>'bloom-softcover-journal-a5'],
            ['name'=>'Pastel Sticky Note Set (4)',   'slug'=>'pastel-sticky-note-set-4',     'category_id'=>$paper->id,   'price'=>299,  'sale_price'=>null, 'stock'=>100, 'is_new'=>false, 'is_featured'=>false, 'is_bestseller'=>true,  'tagline'=>'Leave little notes everywhere.',        'image'=>'pastel-sticky-note-set-4'],
            ['name'=>'Bloom Daily Planner 2026',     'slug'=>'bloom-daily-planner-2026',     'category_id'=>$paper->id,   'price'=>550,  'sale_price'=>480,  'stock'=>20,  'is_new'=>true,  'is_featured'=>true,  'is_bestseller'=>false, 'tagline'=>'Plan it. Live it. Love it.',            'image'=>'bloom-daily-planner-2026'],
            ['name'=>'Kawaii Grid Notebook B5',      'slug'=>'kawaii-grid-notebook-b5',      'category_id'=>$paper->id,   'price'=>480,  'sale_price'=>420,  'stock'=>52,  'is_new'=>true,  'is_featured'=>false, 'is_bestseller'=>false, 'tagline'=>'Grid paper, but make it soft.',         'image'=>'kawaii-grid-notebook-b5'],
            // Art & Craft
            ['name'=>'Watercolour Set (24)',         'slug'=>'watercolour-set-24',           'category_id'=>$art->id,     'price'=>850,  'sale_price'=>750,  'stock'=>15,  'is_new'=>false, 'is_featured'=>true,  'is_bestseller'=>true,  'tagline'=>'Paint your own world.',                 'image'=>'watercolour-set-24'],
            ['name'=>'A4 Mixed Media Sketchbook',    'slug'=>'a4-mixed-media-sketchbook',    'category_id'=>$art->id,     'price'=>399,  'sale_price'=>null, 'stock'=>40,  'is_new'=>false, 'is_featured'=>false, 'is_bestseller'=>true,  'tagline'=>'Blank pages, endless ideas.',           'image'=>'a4-mixed-media-sketchbook'],
            // School Essentials
            ['name'=>'Bloom Aesthetic Pencil Pouch', 'slug'=>'bloom-aesthetic-pencil-pouch', 'category_id'=>$school->id,  'price'=>499,  'sale_price'=>429,  'stock'=>35,  'is_new'=>true,  'is_featured'=>true,  'is_bestseller'=>true,  'tagline'=>'Your supplies deserve a cute home.',    'image'=>'bloom-aesthetic-pencil-pouch'],
            ['name'=>'Geometry Box Premium',         'slug'=>'geometry-box-premium',         'category_id'=>$school->id,  'price'=>350,  'sale_price'=>null, 'stock'=>60,  'is_new'=>false, 'is_featured'=>false, 'is_bestseller'=>false, 'tagline'=>'All the tools, none of the stress.',    'image'=>'bloom-geometry-box-premium'],
            // Office & Desk
            ['name'=>'Pastel Water Bottle 500ml',    'slug'=>'pastel-water-bottle-500ml',    'category_id'=>$office->id,  'price'=>1250, 'sale_price'=>1050, 'stock'=>22,  'is_new'=>true,  'is_featured'=>true,  'is_bestseller'=>false, 'tagline'=>'Desk-friendly, keeps it cold all day.', 'image'=>'pastel-insulated-water-bottle-500ml'],
            // Cute Collection
            ['name'=>'Kawaii Sticker Sheet Set (10)','slug'=>'kawaii-sticker-sheet-set-10',  'category_id'=>$cute->id,    'price'=>299,  'sale_price'=>249,  'stock'=>120, 'is_new'=>true,  'is_featured'=>true,  'is_bestseller'=>true,  'tagline'=>'Stick them everywhere.',                'image'=>'kawaii-sticker-sheet-set-10'],
            ['name'=>'Pastel Washi Tape Set (8)',    'slug'=>'pastel-washi-tape-set-8',      'category_id'=>$cute->id,    'price'=>450,  'sale_price'=>399,  'stock'=>75,  'is_new'=>true,  'is_featured'=>true,  'is_bestseller'=>true,  'tagline'=>'Wrap everything in pretty.',            'image'=>'pastel-washi-tape-set-8'],
            ['name'=>'Disney Character Pen Set (6)', 'slug'=>'disney-character-pen-set-6',   'category_id'=>$cute->id,    'price'=>350,  'sale_price'=>299,  'stock'=>55,  'is_new'=>false, 'is_featured'=>false, 'is_bestseller'=>true,  'tagline'=>'Too cute to use. Use them anyway.',     'image'=>'disney-character-pen-set-6'],
            // Gifts & Bundles
            ['name'=>'Bloom Desk Edit Gift Set',     'slug'=>'bloom-desk-edit-gift-set',     'category_id'=>$gifts->id,   'price'=>1999, 'sale_price'=>1799, 'stock'=>18,  'is_new'=>true,  'is_featured'=>true,  'is_bestseller'=>false, 'tagline'=>'The whole vibe, in one box.',           'image'=>'bloom-desk-edit-aesthetic-set'],
        ];

        foreach ($products as $product) {
            $imageName = $product['image'];
            unset($product['image']);

            $created = Product::create(array_merge($product, ['is_active' => true]));

            $created->images()->create([
                'path'       => 'images/products/'.$imageName.'.webp',
                'alt_text'   => $created->name,
                'sort_order' => 0,
            ]);
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
