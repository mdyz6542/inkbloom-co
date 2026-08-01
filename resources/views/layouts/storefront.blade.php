<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- SEO --}}
    <title>{{ $title ?? 'Inkbloom Co. — Cute & Aesthetic Stationery Online Pakistan' }}</title>
    <meta name="description" content="{{ $description ?? 'Shop affordable kawaii and aesthetic stationery in Pakistan. Notebooks, pens, washi tape & more. Ships nationwide.' }}">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    {{-- Vite Assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Extra head content --}}
    {{ $head ?? '' }}
</head>
<body class="bg-paper text-plum antialiased">

    {{-- Announcement Bar --}}
    <div class="bg-cherry text-white text-center text-sm font-body py-2 px-4">
        🌸 Free shipping on orders over Rs 500 &nbsp;·&nbsp; Use code <strong>BLOOM10</strong> for 10% off your first order
    </div>

    {{-- Header --}}
    <header class="bg-white border-b border-cloud sticky top-0 z-50" style="box-shadow: var(--shadow-card);" x-data="{ mobileOpen: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">

                {{-- Logo --}}
                <a href="{{ url('/') }}" class="flex items-center gap-2">
                    <span class="text-2xl">🌸</span>
                    <span class="font-heading text-xl font-semibold text-plum">Inkbloom Co.</span>
                </a>

                {{-- Desktop Nav --}}
                <nav class="hidden md:flex items-center gap-6 font-body text-sm font-medium text-plum">
                    <a href="{{ url('/shop') }}" class="hover:text-cherry transition-colors">Shop</a>
                    <a href="{{ url('/shop/cute-collection') }}" class="text-cherry font-semibold hover:underline transition-colors">🌸 Cute Stuff</a>
                    <a href="{{ url('/new-arrivals') }}" class="hover:text-cherry transition-colors">New Arrivals</a>
                    <a href="{{ url('/best-sellers') }}" class="hover:text-cherry transition-colors">Best Sellers</a>
                    <a href="{{ url('/blog') }}" class="hover:text-cherry transition-colors">Blog</a>
                    <a href="{{ url('/about') }}" class="hover:text-cherry transition-colors">About</a>
                </nav>

                {{-- Right Icons --}}
                <div class="flex items-center gap-3">
                    {{-- Search --}}
                    <button class="p-2 text-plum hover:text-cherry transition-colors" aria-label="Search">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z"/>
                        </svg>
                    </button>

                    {{-- Account --}}
                    @auth
                        <a href="{{ route('account') }}" class="p-2 text-plum hover:text-cherry transition-colors" aria-label="My Account">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0zM12 14a7 7 0 0 0-7 7h14a7 7 0 0 0-7-7z"/>
                            </svg>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="p-2 text-plum hover:text-cherry transition-colors" aria-label="Login">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0zM12 14a7 7 0 0 0-7 7h14a7 7 0 0 0-7-7z"/>
                            </svg>
                        </a>
                    @endauth

                    {{-- Cart --}}
                    <a href="{{ url('/cart') }}" class="relative p-2 text-plum hover:text-cherry transition-colors" aria-label="Cart">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 9m5-9v9m4-9v9m5-9l2 9"/>
                        </svg>
                        <span class="absolute -top-1 -right-1 bg-cherry text-white text-xs font-bold rounded-full h-4 w-4 flex items-center justify-center">0</span>
                    </a>

                    {{-- Mobile menu button --}}
                    <button class="md:hidden p-2 text-plum hover:text-cherry transition-colors" aria-label="Menu" @click="mobileOpen = !mobileOpen">
                        <svg x-show="!mobileOpen" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        <svg x-show="mobileOpen" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

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
             class="md:hidden border-t border-cloud bg-white">
            <nav class="px-4 py-4 space-y-1 font-body text-sm font-medium text-plum">
                <a href="{{ url('/shop') }}" class="flex items-center gap-2 px-3 py-3 rounded-2xl hover:bg-blush/30 hover:text-cherry transition-colors" @click="mobileOpen = false">
                    🛍️ Shop All
                </a>
                <a href="{{ url('/shop/cute-collection') }}" class="flex items-center gap-2 px-3 py-3 rounded-2xl bg-blush/20 text-cherry font-semibold hover:bg-blush/40 transition-colors" @click="mobileOpen = false">
                    🌸 Cute Stuff
                </a>
                <a href="{{ url('/new-arrivals') }}" class="flex items-center gap-2 px-3 py-3 rounded-2xl hover:bg-blush/30 hover:text-cherry transition-colors" @click="mobileOpen = false">
                    ✨ New Arrivals
                </a>
                <a href="{{ url('/best-sellers') }}" class="flex items-center gap-2 px-3 py-3 rounded-2xl hover:bg-blush/30 hover:text-cherry transition-colors" @click="mobileOpen = false">
                    🔥 Best Sellers
                </a>
                <a href="{{ url('/blog') }}" class="flex items-center gap-2 px-3 py-3 rounded-2xl hover:bg-blush/30 hover:text-cherry transition-colors" @click="mobileOpen = false">
                    📖 Blog
                </a>
                <a href="{{ url('/about') }}" class="flex items-center gap-2 px-3 py-3 rounded-2xl hover:bg-blush/30 hover:text-cherry transition-colors" @click="mobileOpen = false">
                    💛 About
                </a>
                <div class="border-t border-cloud pt-3 mt-2 space-y-1">
                    @auth
                        <a href="{{ route('account') }}" class="flex items-center gap-2 px-3 py-3 rounded-2xl hover:bg-blush/30 hover:text-cherry transition-colors" @click="mobileOpen = false">
                            👤 My Account
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left flex items-center gap-2 px-3 py-3 rounded-2xl hover:bg-blush/30 hover:text-cherry transition-colors">
                                🚪 Log Out
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="flex items-center gap-2 px-3 py-3 rounded-2xl hover:bg-blush/30 hover:text-cherry transition-colors" @click="mobileOpen = false">
                            👤 Login
                        </a>
                        <a href="{{ route('register') }}" class="flex items-center gap-2 px-3 py-3 rounded-2xl bg-cherry text-white font-semibold hover:opacity-90 transition-opacity" @click="mobileOpen = false">
                            🌸 Create Account
                        </a>
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
    <footer class="bg-plum text-white mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10">

                {{-- Brand --}}
                <div class="md:col-span-1">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="text-2xl">🌸</span>
                        <span class="font-heading text-xl font-semibold">Inkbloom Co.</span>
                    </div>
                    <p class="font-accent text-lg text-blush">"Where ideas bloom."</p>
                    <p class="font-body text-sm text-fog mt-2">Paper. Petals. A little poetry.</p>
                    {{-- Socials --}}
                    <div class="flex gap-3 mt-4">
                        <a href="#" class="text-fog hover:text-blush transition-colors text-sm font-body">Instagram</a>
                        <a href="#" class="text-fog hover:text-blush transition-colors text-sm font-body">TikTok</a>
                        <a href="#" class="text-fog hover:text-blush transition-colors text-sm font-body">Pinterest</a>
                    </div>
                </div>

                {{-- Shop --}}
                <div>
                    <h4 class="font-heading text-base font-semibold text-blush mb-4">Shop</h4>
                    <ul class="space-y-2 font-body text-sm text-fog">
                        <li><a href="{{ url('/shop') }}" class="hover:text-white transition-colors">All Products</a></li>
                        <li><a href="{{ url('/shop/cute-collection') }}" class="hover:text-white transition-colors">🌸 Cute Collection</a></li>
                        <li><a href="{{ url('/new-arrivals') }}" class="hover:text-white transition-colors">New Arrivals</a></li>
                        <li><a href="{{ url('/best-sellers') }}" class="hover:text-white transition-colors">Best Sellers</a></li>
                        <li><a href="{{ url('/shop/gifts-bundles') }}" class="hover:text-white transition-colors">Gifts & Bundles</a></li>
                    </ul>
                </div>

                {{-- Help --}}
                <div>
                    <h4 class="font-heading text-base font-semibold text-blush mb-4">Help</h4>
                    <ul class="space-y-2 font-body text-sm text-fog">
                        <li><a href="{{ url('/faq') }}" class="hover:text-white transition-colors">FAQ</a></li>
                        <li><a href="{{ url('/shipping-returns') }}" class="hover:text-white transition-colors">Shipping & Returns</a></li>
                        <li><a href="{{ url('/track-order') }}" class="hover:text-white transition-colors">Track Order</a></li>
                        <li><a href="{{ url('/contact') }}" class="hover:text-white transition-colors">Contact Us</a></li>
                    </ul>
                </div>

                {{-- Legal --}}
                <div>
                    <h4 class="font-heading text-base font-semibold text-blush mb-4">Legal</h4>
                    <ul class="space-y-2 font-body text-sm text-fog">
                        <li><a href="{{ url('/privacy-policy') }}" class="hover:text-white transition-colors">Privacy Policy</a></li>
                        <li><a href="{{ url('/terms') }}" class="hover:text-white transition-colors">Terms & Conditions</a></li>
                        <li><a href="{{ url('/about') }}" class="hover:text-white transition-colors">About Us</a></li>
                    </ul>
                    {{-- WhatsApp --}}
                    <div class="mt-6">
                        <a href="#" class="inline-flex items-center gap-2 bg-matcha text-plum font-body font-semibold text-sm px-4 py-2 rounded-2xl hover:opacity-90 transition-opacity">
                            💬 WhatsApp Us
                        </a>
                    </div>
                </div>

            </div>

            {{-- Bottom bar --}}
            <div class="border-t border-white/10 mt-12 pt-6 flex flex-col md:flex-row items-center justify-between gap-3">
                <p class="font-body text-sm text-fog">© {{ date('Y') }} Inkbloom Co. All rights reserved.</p>
                <p class="font-accent text-base text-blush">made with love, petals, and way too many pens. 🌸</p>
            </div>
        </div>
    </footer>

</body>
</html>
