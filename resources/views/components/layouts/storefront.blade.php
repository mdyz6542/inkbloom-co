<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @php
        $pageTitle       = $title ?? 'Inkbloom Co. — Where ideas bloom.';
        $pageDescription = $description ?? 'Aesthetic stationery for students, artists and dreamers across Pakistan. Notebooks, pens, washi tape & more. Ships nationwide via TCS.';
        $pageImage       = $ogImage ?? asset('images/og-default.jpg');
        $canonicalUrl    = $canonical ?? url()->current();
    @endphp

    <title>{{ $pageTitle }}</title>
    <meta name="description" content="{{ $pageDescription }}">
    <link rel="canonical" href="{{ $canonicalUrl }}">

    {{-- Open Graph --}}
    <meta property="og:type"        content="{{ $ogType ?? 'website' }}">
    <meta property="og:site_name"   content="Inkbloom Co.">
    <meta property="og:title"       content="{{ $pageTitle }}">
    <meta property="og:description" content="{{ $pageDescription }}">
    <meta property="og:url"         content="{{ $canonicalUrl }}">
    <meta property="og:image"       content="{{ $pageImage }}">
    <meta property="og:locale"      content="en_PK">

    {{-- Twitter Card --}}
    <meta name="twitter:card"        content="summary_large_image">
    <meta name="twitter:title"       content="{{ $pageTitle }}">
    <meta name="twitter:description" content="{{ $pageDescription }}">
    <meta name="twitter:image"       content="{{ $pageImage }}">

    {{-- Google Tag Manager --}}
    @if(config('seo.gtm_id'))
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','{{ config('seo.gtm_id') }}');</script>
    @endif

    {{-- Organization schema (every page) --}}
    <script type="application/ld+json">{!! json_encode([
        '@context'  => 'https://schema.org',
        '@type'     => 'Organization',
        'name'      => 'Inkbloom Co.',
        'url'       => url('/'),
        'logo'      => url('/images/logo.png'),
        'sameAs'    => ['https://instagram.com/inkbloomco'],
        'contactPoint' => [['@type' => 'ContactPoint', 'contactType' => 'customer service', 'availableLanguage' => 'English']],
    ], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}</script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{ $head ?? '' }}
</head>
<body class="font-body text-plum bg-paper antialiased">

{{-- GTM noscript --}}
@if(config('seo.gtm_id'))
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ config('seo.gtm_id') }}" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
@endif
<body class="font-body text-plum bg-paper antialiased">

{{-- Announcement Bar --}}
<div class="bg-cherry text-white text-sm py-2 overflow-hidden">
    <div class="flex whitespace-nowrap marquee-track gap-12 px-6">
        <span>🌸 Free gift on orders over Rs 2,000</span>
        <span>✨ Flat Rs 200 shipping nationwide</span>
        <span>💌 10% off your first order · use code <b>BLOOM10</b></span>
        <span>📦 COD available everywhere in Pakistan</span>
        <span>🌸 Free gift on orders over Rs 2,000</span>
        <span>✨ Flat Rs 200 shipping nationwide</span>
        <span>💌 10% off your first order · use code <b>BLOOM10</b></span>
        <span>📦 COD available everywhere in Pakistan</span>
    </div>
</div>

{{-- Header --}}
<header class="sticky top-0 z-40 bg-paper/90 backdrop-blur border-b border-cloud" x-data="{ mobileOpen: false }">
    <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">

        {{-- Logo --}}
        <a href="{{ url('/') }}" class="flex items-center gap-2">
            <svg viewBox="0 0 60 60" width="36" height="36">
                <ellipse cx="30" cy="18" rx="9" ry="12" fill="#FFD4DE"/>
                <ellipse cx="16" cy="28" rx="9" ry="12" fill="#FFD4DE" transform="rotate(-60 16 28)"/>
                <ellipse cx="44" cy="28" rx="9" ry="12" fill="#FFD4DE" transform="rotate(60 44 28)"/>
                <ellipse cx="22" cy="44" rx="9" ry="12" fill="#FFD4DE" transform="rotate(-130 22 44)"/>
                <ellipse cx="38" cy="44" rx="9" ry="12" fill="#FFD4DE" transform="rotate(130 38 44)"/>
                <circle cx="30" cy="30" r="13" fill="#FFF2C4"/>
                <circle cx="26" cy="30" r="1.3" fill="#3D2B4F"/>
                <circle cx="34" cy="30" r="1.3" fill="#3D2B4F"/>
                <path d="M 27,33 Q 30,36 33,33" stroke="#3D2B4F" stroke-width="1.3" fill="none" stroke-linecap="round"/>
            </svg>
            <div class="leading-none">
                <div class="font-display text-xl text-plum">Inkbloom <span class="text-cherry">Co.</span></div>
                <div class="hand text-fog text-sm -mt-0.5">where ideas bloom</div>
            </div>
        </a>

        {{-- Desktop Nav --}}
        <nav class="hidden md:flex items-center gap-7 text-sm font-medium">
            <a href="{{ url('/shop') }}" class="{{ request()->is('shop') ? 'text-cherry font-semibold' : 'hover:text-cherry' }}">Shop</a>
            <a href="{{ url('/shop/cute-collection') }}" class="{{ request()->is('shop/cute-collection') ? 'text-cherry font-semibold' : 'hover:text-cherry' }}">Cute Stuff 🌸</a>
            <a href="{{ url('/new-arrivals') }}" class="{{ request()->is('new-arrivals') ? 'text-cherry font-semibold' : 'hover:text-cherry' }}">New Arrivals</a>
            <a href="{{ url('/best-sellers') }}" class="{{ request()->is('best-sellers') ? 'text-cherry font-semibold' : 'hover:text-cherry' }}">Best Sellers</a>
            <a href="{{ url('/blog') }}" class="{{ request()->is('blog') ? 'text-cherry font-semibold' : 'hover:text-cherry' }}">Blog</a>
            <a href="{{ url('/about') }}" class="{{ request()->is('about') ? 'text-cherry font-semibold' : 'hover:text-cherry' }}">About</a>
        </nav>

        {{-- Right Icons --}}
        <div class="flex items-center gap-3">
            <button aria-label="Search" class="w-9 h-9 rounded-full hover:bg-cloud flex items-center justify-center">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg>
            </button>
            @auth
                <a href="{{ route('account') }}" aria-label="My Account" class="w-9 h-9 rounded-full hover:bg-cloud flex items-center justify-center" title="My Account">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 4-6 8-6s8 2 8 6"/></svg>
                </a>
            @else
                <a href="{{ route('login') }}" aria-label="Login" class="w-9 h-9 rounded-full hover:bg-cloud flex items-center justify-center" title="Login">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 4-6 8-6s8 2 8 6"/></svg>
                </a>
            @endauth
            <button aria-label="Wishlist" class="w-9 h-9 rounded-full hover:bg-cloud flex items-center justify-center">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 21s-7-4.5-9.5-9A5.5 5.5 0 0 1 12 6a5.5 5.5 0 0 1 9.5 6C19 16.5 12 21 12 21z"/></svg>
            </button>
            <a href="{{ url('/cart') }}" aria-label="Cart" class="relative w-10 h-10 rounded-full bg-butter flex items-center justify-center shadow-soft">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 6h15l-2 10H8L6 6z"/><circle cx="9" cy="20" r="1.6"/><circle cx="18" cy="20" r="1.6"/><path d="M6 6 5 3H2"/></svg>
                <span data-cart-count class="absolute -top-1 -right-1 bg-cherry text-white text-[10px] font-bold rounded-full w-5 h-5 flex items-center justify-center">{{ $cartCount ?? 0 }}</span>
            </a>
            {{-- Mobile menu button --}}
            <button @click="mobileOpen = !mobileOpen" class="md:hidden w-9 h-9 rounded-full hover:bg-cloud flex items-center justify-center" aria-label="Menu">
                <svg x-show="!mobileOpen" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
                <svg x-show="mobileOpen" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
    </div>

    {{-- Mobile Menu Drawer --}}
    <div x-show="mobileOpen"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         class="md:hidden border-t border-cloud bg-paper">
        <nav class="px-4 py-4 space-y-1 text-sm font-medium">
            <a href="{{ url('/shop') }}" @click="mobileOpen = false" class="flex items-center gap-3 px-3 py-3 rounded-2xl hover:bg-blush/40 hover:text-cherry transition-colors">🛍️ Shop All</a>
            <a href="{{ url('/shop/cute-collection') }}" @click="mobileOpen = false" class="flex items-center gap-3 px-3 py-3 rounded-2xl bg-blush/30 text-cherry font-semibold hover:bg-blush/50 transition-colors">🌸 Cute Stuff</a>
            <a href="{{ url('/new-arrivals') }}" @click="mobileOpen = false" class="flex items-center gap-3 px-3 py-3 rounded-2xl hover:bg-blush/40 hover:text-cherry transition-colors">✨ New Arrivals</a>
            <a href="{{ url('/best-sellers') }}" @click="mobileOpen = false" class="flex items-center gap-3 px-3 py-3 rounded-2xl hover:bg-blush/40 hover:text-cherry transition-colors">🔥 Best Sellers</a>
            <a href="{{ url('/blog') }}" @click="mobileOpen = false" class="flex items-center gap-3 px-3 py-3 rounded-2xl hover:bg-blush/40 hover:text-cherry transition-colors">📖 Blog</a>
            <a href="{{ url('/about') }}" @click="mobileOpen = false" class="flex items-center gap-3 px-3 py-3 rounded-2xl hover:bg-blush/40 hover:text-cherry transition-colors">💛 About</a>
            <div class="border-t border-cloud pt-3 mt-2 space-y-1">
                @auth
                    <a href="{{ route('account') }}" @click="mobileOpen = false" class="flex items-center gap-3 px-3 py-3 rounded-2xl hover:bg-blush/40 hover:text-cherry transition-colors">👤 My Account</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left flex items-center gap-3 px-3 py-3 rounded-2xl hover:bg-blush/40 hover:text-cherry transition-colors">🚪 Log Out</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" @click="mobileOpen = false" class="flex items-center gap-3 px-3 py-3 rounded-2xl hover:bg-blush/40 hover:text-cherry transition-colors">👤 Login</a>
                    <a href="{{ route('register') }}" @click="mobileOpen = false" class="flex items-center gap-3 px-3 py-3 rounded-2xl bg-cherry text-white font-semibold hover:opacity-90 transition-opacity">🌸 Create Account</a>
                @endauth
            </div>
        </nav>
    </div>

</header>

{{-- Page Content --}}
<main>
    {{ $slot }}
</main>

{{-- Footer --}}
<footer class="bg-plum text-paper/90 pt-16 pb-6 px-6">
    <div class="max-w-7xl mx-auto grid md:grid-cols-5 gap-10">

        <div class="md:col-span-2">
            <div class="flex items-center gap-2">
                <svg viewBox="0 0 60 60" width="42" height="42">
                    <ellipse cx="30" cy="18" rx="9" ry="12" fill="#FFD4DE"/>
                    <ellipse cx="16" cy="28" rx="9" ry="12" fill="#FFD4DE" transform="rotate(-60 16 28)"/>
                    <ellipse cx="44" cy="28" rx="9" ry="12" fill="#FFD4DE" transform="rotate(60 44 28)"/>
                    <ellipse cx="22" cy="44" rx="9" ry="12" fill="#FFD4DE" transform="rotate(-130 22 44)"/>
                    <ellipse cx="38" cy="44" rx="9" ry="12" fill="#FFD4DE" transform="rotate(130 38 44)"/>
                    <circle cx="30" cy="30" r="13" fill="#FFF2C4"/>
                    <circle cx="26" cy="30" r="1.3" fill="#3D2B4F"/>
                    <circle cx="34" cy="30" r="1.3" fill="#3D2B4F"/>
                    <path d="M 27,33 Q 30,36 33,33" stroke="#3D2B4F" stroke-width="1.3" fill="none" stroke-linecap="round"/>
                </svg>
                <div>
                    <div class="font-display text-2xl">Inkbloom <span class="text-cherry">Co.</span></div>
                    <div class="hand text-butter text-base -mt-1">where ideas bloom</div>
                </div>
            </div>
            <p class="mt-5 text-sm text-paper/70 max-w-sm">
                Aesthetic stationery for every student, artist and dreamer in Pakistan.
                Good stationery isn't a luxury. It's a feeling.
            </p>
            <div class="mt-5 flex gap-3">
                <a href="#" class="w-10 h-10 rounded-full bg-white/10 hover:bg-cherry flex items-center justify-center transition-colors" aria-label="Instagram">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor"/></svg>
                </a>
                <a href="#" class="w-10 h-10 rounded-full bg-white/10 hover:bg-cherry flex items-center justify-center transition-colors" aria-label="TikTok">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M16 3v4a5 5 0 0 0 4 4v4a9 9 0 0 1-4-1v5a6 6 0 1 1-6-6v4a2 2 0 1 0 2 2V3z"/></svg>
                </a>
                <a href="#" class="w-10 h-10 rounded-full bg-white/10 hover:bg-cherry flex items-center justify-center transition-colors" aria-label="Pinterest">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2a10 10 0 0 0-3.6 19.3c-.1-.8-.2-2 0-2.9l1.3-5.5s-.3-.7-.3-1.6c0-1.5.9-2.6 2-2.6.9 0 1.4.7 1.4 1.5 0 .9-.6 2.3-.9 3.6-.3 1.1.5 2 1.7 2 2 0 3.5-2.1 3.5-5.1 0-2.7-1.9-4.5-4.7-4.5-3.2 0-5.1 2.4-5.1 4.9 0 1 .4 2 .9 2.6.1.1.1.2.1.3l-.3 1.2c0 .2-.2.2-.4.1-1.3-.6-2.1-2.5-2.1-4.1 0-3.3 2.4-6.4 7-6.4 3.6 0 6.5 2.6 6.5 6.1 0 3.7-2.3 6.7-5.5 6.7-1.1 0-2.1-.6-2.4-1.2l-.7 2.5c-.2.9-.9 2.1-1.3 2.8A10 10 0 1 0 12 2z"/></svg>
                </a>
                <a href="{{ url('/contact') }}" class="w-10 h-10 rounded-full bg-white/10 hover:bg-cherry flex items-center justify-center transition-colors" aria-label="WhatsApp">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M20 12a8 8 0 1 1-3.5-6.6L20 4l-1.3 3.7A8 8 0 0 1 20 12zm-4.5 2.3c-.3-.1-1.6-.8-1.9-.9-.2-.1-.4-.1-.6.1l-.8 1a.5.5 0 0 1-.6.1 6.5 6.5 0 0 1-3.2-2.8c-.2-.3 0-.5.2-.7l.4-.5c.1-.1.2-.3.1-.5l-.8-1.9c-.2-.4-.4-.4-.6-.4h-.5c-.2 0-.5.1-.7.3-.3.3-1 1-1 2.4s1.1 2.8 1.2 3 2.2 3.5 5.4 4.7c.8.3 1.4.5 1.9.7.8.2 1.5.2 2.1.1.6-.1 1.6-.7 1.9-1.3.2-.7.2-1.2.1-1.3 0-.1-.2-.2-.5-.3z"/></svg>
                </a>
            </div>
        </div>

        <div>
            <h4 class="font-display text-lg text-butter mb-3">Shop</h4>
            <ul class="space-y-2 text-sm text-paper/70">
                <li><a href="{{ url('/shop') }}" class="hover:text-white transition-colors">All Products</a></li>
                <li><a href="{{ url('/shop/cute-collection') }}" class="hover:text-white transition-colors">Cute Collection 🌸</a></li>
                <li><a href="{{ url('/new-arrivals') }}" class="hover:text-white transition-colors">New Arrivals</a></li>
                <li><a href="{{ url('/best-sellers') }}" class="hover:text-white transition-colors">Best Sellers</a></li>
                <li><a href="{{ url('/shop/gifts-bundles') }}" class="hover:text-white transition-colors">Gifts & Bundles</a></li>
            </ul>
        </div>

        <div>
            <h4 class="font-display text-lg text-butter mb-3">Help</h4>
            <ul class="space-y-2 text-sm text-paper/70">
                <li><a href="{{ url('/track-order') }}" class="hover:text-white transition-colors">Track Order</a></li>
                <li><a href="{{ url('/shipping-returns') }}" class="hover:text-white transition-colors">Shipping & Returns</a></li>
                <li><a href="{{ url('/faq') }}" class="hover:text-white transition-colors">FAQ</a></li>
                <li><a href="{{ url('/contact') }}" class="hover:text-white transition-colors">Contact Us</a></li>
            </ul>
        </div>

        <div>
            <h4 class="font-display text-lg text-butter mb-3">Company</h4>
            <ul class="space-y-2 text-sm text-paper/70">
                <li><a href="{{ url('/about') }}" class="hover:text-white transition-colors">About Us</a></li>
                <li><a href="{{ url('/blog') }}" class="hover:text-white transition-colors">Blog</a></li>
                <li><a href="{{ url('/testimonials') }}" class="hover:text-white transition-colors">Testimonials</a></li>
                <li><a href="{{ url('/privacy-policy') }}" class="hover:text-white transition-colors">Privacy Policy</a></li>
                <li><a href="{{ url('/terms') }}" class="hover:text-white transition-colors">Terms & Conditions</a></li>
            </ul>
        </div>
    </div>

    <div class="max-w-7xl mx-auto mt-12 pt-6 border-t border-white/10 flex flex-col md:flex-row justify-between items-center gap-3 text-xs text-paper/60">
        <div>© {{ date('Y') }} Inkbloom Co. · Made in Pakistan with petals & pens.</div>
        <div class="flex items-center gap-4">
            <span>We accept:</span>
            <span class="chip bg-white text-plum">COD</span>
            <span class="chip bg-white text-plum">JazzCash</span>
            <span class="chip bg-white text-plum">Easypaisa</span>
            <span class="chip bg-white text-plum">Bank Transfer</span>
        </div>
    </div>

    <div class="max-w-7xl mx-auto text-center mt-8 hand text-butter text-lg">
        made with love, petals, and way too many pens. 🌸
    </div>
</footer>

{{-- WhatsApp Floating Button --}}
<a href="{{ url('/contact') }}" aria-label="Chat on WhatsApp"
   class="fixed bottom-6 right-6 z-40 w-14 h-14 rounded-full shadow-gummy flex items-center justify-center hover:scale-105 transition-transform"
   style="background:#25D366;">
    <svg class="w-7 h-7 text-white" viewBox="0 0 24 24" fill="currentColor"><path d="M20 12a8 8 0 1 1-3.5-6.6L20 4l-1.3 3.7A8 8 0 0 1 20 12zm-4.5 2.3c-.3-.1-1.6-.8-1.9-.9-.2-.1-.4-.1-.6.1l-.8 1a.5.5 0 0 1-.6.1 6.5 6.5 0 0 1-3.2-2.8c-.2-.3 0-.5.2-.7l.4-.5c.1-.1.2-.3.1-.5l-.8-1.9c-.2-.4-.4-.4-.6-.4h-.5c-.2 0-.5.1-.7.3-.3.3-1 1-1 2.4s1.1 2.8 1.2 3 2.2 3.5 5.4 4.7c.8.3 1.4.5 1.9.7.8.2 1.5.2 2.1.1.6-.1 1.6-.7 1.9-1.3.2-.7.2-1.2.1-1.3 0-.1-.2-.2-.5-.3z"/></svg>
</a>

</body>
</html>
