@php
$productSchema = [
    '@context'    => 'https://schema.org',
    '@type'       => 'Product',
    'name'        => $product->name,
    'description' => $product->description ?? $product->name,
    'sku'         => $product->sku ?? 'INK-'.$product->id,
    'brand'       => ['@type' => 'Brand', 'name' => 'Inkbloom Co.'],
    'offers'      => [
        '@type'         => 'Offer',
        'priceCurrency' => 'PKR',
        'price'         => (string) ($product->sale_price ?? $product->price),
        'availability'  => $product->stock > 0 ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock',
        'url'           => url()->current(),
        'seller'        => ['@type' => 'Organization', 'name' => 'Inkbloom Co.'],
    ],
    'aggregateRating' => ['@type' => 'AggregateRating', 'ratingValue' => '4.9', 'reviewCount' => '24'],
];
$breadcrumbSchema = [
    '@context'        => 'https://schema.org',
    '@type'           => 'BreadcrumbList',
    'itemListElement' => array_filter([
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => url('/')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Shop', 'item' => url('/shop')],
        $product->category ? ['@type' => 'ListItem', 'position' => 3, 'name' => $product->category->name, 'item' => route('category.show', $product->category->slug)] : null,
        ['@type' => 'ListItem', 'position' => $product->category ? 4 : 3, 'name' => $product->name],
    ]),
];
@endphp
<x-layouts.storefront
    title="{{ $product->meta_title ?? $product->name . ' · Inkbloom Co.' }}"
    description="{{ $product->meta_description ?? $product->description }}"
    ogType="product">
    <x-slot:head>
        <script type="application/ld+json">{!! json_encode($productSchema, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}</script>
        <script type="application/ld+json">{!! json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}</script>
    </x-slot:head>

{{-- Breadcrumb --}}
<div class="max-w-7xl mx-auto px-6 pt-6">
  <div class="text-xs text-fog">
    <a href="{{ url('/') }}" class="hover:text-cherry">Home</a>
    <span class="crumb-sep">›</span>
    <a href="{{ url('/shop') }}" class="hover:text-cherry">Shop</a>
    @if($product->category)
    <span class="crumb-sep">›</span>
    <a href="{{ route('category.show', $product->category->slug) }}" class="hover:text-cherry">{{ $product->category->name }}</a>
    @endif
    <span class="crumb-sep">›</span>
    <span class="text-plum font-medium">{{ $product->name }}</span>
  </div>
</div>

{{-- Above the fold --}}
<section class="py-8 px-6">
  <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-10">

    {{-- Gallery --}}
    <div>
      <div class="grid grid-cols-[80px_1fr] gap-4">
        <div class="space-y-3">
          <button class="w-20 h-20 rounded-2xl bg-blush flex items-center justify-center text-3xl ring-2 ring-cherry">🖋️</button>
          <button class="w-20 h-20 rounded-2xl bg-lilac flex items-center justify-center text-3xl hover:ring-2 hover:ring-cherry">💗</button>
          <button class="w-20 h-20 rounded-2xl bg-matcha flex items-center justify-center text-3xl hover:ring-2 hover:ring-cherry">✨</button>
        </div>
        <div class="relative aspect-square rounded-4xl overflow-hidden" style="background: linear-gradient(135deg,#FFD4DE,#E4D6FF);">
          <div class="absolute inset-0 flex items-center justify-center text-9xl">🖋️</div>
          @if($product->is_bestseller)
            <span class="absolute top-4 left-4 chip" style="background:#FFF2C4;">🏆 Best Seller</span>
          @elseif($product->is_new)
            <span class="absolute top-4 left-4 chip" style="background:#FF4D6D;color:white;border-color:#FF4D6D;">NEW</span>
          @endif
        </div>
      </div>
    </div>

    {{-- Info --}}
    <div>
      <div class="flex items-center gap-2 mb-2">
        @if($product->category)
          <span class="chip" style="background:#FFD4DE;border-color:#FFD4DE;">{{ $product->category->name }}</span>
        @endif
        @if($product->is_bestseller)
          <span class="chip" style="background:#FFF2C4;">🏆 Best Seller</span>
        @elseif($product->is_new)
          <span class="chip" style="background:#FF4D6D;color:white;border-color:#FF4D6D;">NEW</span>
        @endif
      </div>

      <h1 class="font-display text-4xl leading-tight">{{ $product->name }}</h1>
      @if($product->tagline)
        <p class="hand text-2xl text-fog mt-1">{{ $product->tagline }}</p>
      @endif

      <div class="flex items-center gap-3 mt-4 text-sm">
        <span class="star text-lg">★★★★★</span>
        <span class="font-semibold">4.9</span>
        <span class="text-fog">·</span>
        <a href="#reviews" class="text-fog hover:text-cherry underline">reviews</a>
        <span class="text-fog">·</span>
        @if($product->stock > 0)
          <span class="font-semibold flex items-center gap-1"><span class="w-2 h-2 bg-green-500 rounded-full"></span> In stock</span>
        @else
          <span class="font-semibold flex items-center gap-1 text-fog"><span class="w-2 h-2 bg-fog rounded-full"></span> Out of stock</span>
        @endif
      </div>

      <div class="mt-5 flex items-end gap-3">
        <span class="font-display text-4xl">Rs {{ number_format($product->sale_price ?? $product->price) }}</span>
        @if($product->sale_price)
          <span class="line-through text-fog">Rs {{ number_format($product->price) }}</span>
          <span class="chip" style="background:#FFD4DE;">Save {{ round((($product->price - $product->sale_price) / $product->price) * 100) }}%</span>
        @endif
      </div>

      @if($product->description)
        <p class="mt-5 text-plum/80">{{ $product->description }}</p>
      @endif

      {{-- Quantity + CTA --}}
      <div class="mt-6" x-data="{
        qty: 1,
        adding: false,
        added: false,
        async addToCart() {
          this.adding = true;
          const res = await fetch('{{ route('cart.add') }}', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Accept': 'application/json' },
            body: JSON.stringify({ product_id: {{ $product->id }}, quantity: this.qty })
          });
          const data = await res.json();
          this.adding = false;
          this.added = true;
          document.querySelectorAll('[data-cart-count]').forEach(el => el.textContent = data.count);
          if (window.bounceCart) window.bounceCart();
          setTimeout(() => this.added = false, 2000);
        }
      }">
        <div class="flex items-center gap-3">
          <div class="flex items-center border-2 border-plum rounded-full">
            <button type="button" @click="qty = Math.max(1, qty - 1)" class="w-10 h-10 text-lg font-bold">−</button>
            <span class="w-10 text-center font-semibold" x-text="qty">1</span>
            <button type="button" @click="qty++" class="w-10 h-10 text-lg font-bold">+</button>
          </div>
          @if($product->stock > 0)
            <button @click="addToCart()" :disabled="adding"
              class="btn-pop flex-1 justify-center"
              x-text="adding ? 'Adding...' : (added ? 'Added! 🌸' : 'Add to cart · Rs {{ number_format($product->sale_price ?? $product->price) }} 🌸')">
              Add to cart · Rs {{ number_format($product->sale_price ?? $product->price) }} 🌸
            </button>
          @else
            <div class="flex-1" x-data="{ sent: false, email: '' }">
              <div x-show="!sent" class="flex gap-2">
                <input type="email" x-model="email" class="field-input flex-1 py-2 text-sm" placeholder="your@email.com">
                <button @click="
                  fetch('{{ route('restock.notify') }}', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Accept': 'application/json' },
                    body: JSON.stringify({ product_id: {{ $product->id }}, email: email })
                  }).then(() => { sent = true });
                " class="btn-ghost text-sm whitespace-nowrap">Notify me 🔔</button>
              </div>
              <p x-show="sent" class="text-sm font-semibold text-cherry py-2">We'll let you know when it's back! 🌸</p>
            </div>
          @endif
          <button aria-label="Wishlist" class="w-12 h-12 rounded-full bg-white border-2 border-plum flex items-center justify-center hover:bg-blush transition-colors">
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 21s-7-4.5-9.5-9A5.5 5.5 0 0 1 12 6a5.5 5.5 0 0 1 9.5 6C19 16.5 12 21 12 21z"/></svg>
          </button>
        </div>
      </div>

      {{-- Trust Badges --}}
      <div class="mt-6 grid grid-cols-3 gap-2 text-xs">
        <div class="bg-cloud/50 rounded-2xl p-3 text-center"><div class="text-xl">📦</div><div class="font-semibold mt-1">COD</div><div class="text-fog">available</div></div>
        <div class="bg-cloud/50 rounded-2xl p-3 text-center"><div class="text-xl">🚚</div><div class="font-semibold mt-1">Ships in 24h</div><div class="text-fog">via TCS</div></div>
        <div class="bg-cloud/50 rounded-2xl p-3 text-center"><div class="text-xl">↩️</div><div class="font-semibold mt-1">7-day returns</div><div class="text-fog">hassle-free</div></div>
      </div>

      {{-- Bloomie Tip --}}
      <div class="mt-5 bloomie-tip flex items-center gap-2">
        <span>🌸</span>
        <span>psst, pairs perfectly with something else from the</span> <a href="{{ url('/shop/cute-collection') }}" class="underline font-semibold">Cute Collection</a>.</span>
      </div>
    </div>
  </div>
</section>

{{-- Below the fold --}}
<section class="py-12 px-6">
  <div class="max-w-7xl mx-auto grid md:grid-cols-3 gap-8">
    <div class="md:col-span-2 space-y-5">
      <details class="bg-white rounded-3xl border border-cloud p-5" open>
        <summary class="list-none cursor-pointer flex items-center justify-between"><span class="font-display text-xl">The details</span><span class="w-8 h-8 rounded-full bg-butter flex items-center justify-center font-bold">+</span></summary>
        <div class="mt-4 text-plum/80 text-sm leading-relaxed">
          @if($product->description)
            <p>{{ $product->description }}</p>
          @else
            <p>A beautiful piece from our collection, carefully chosen because it made us stop and think: okay, that's too good to scroll past.</p>
          @endif
        </div>
      </details>

      <details class="bg-white rounded-3xl border border-cloud p-5">
        <summary class="list-none cursor-pointer flex items-center justify-between"><span class="font-display text-xl">Specifications</span><span class="w-8 h-8 rounded-full bg-butter flex items-center justify-center font-bold">+</span></summary>
        <table class="mt-4 w-full text-sm">
          @if($product->sku)
          <tr class="border-b border-cloud"><td class="py-2 text-fog w-32">SKU</td><td>{{ $product->sku }}</td></tr>
          @endif
          <tr class="border-b border-cloud"><td class="py-2 text-fog">Category</td><td>{{ $product->category->name ?? 'Uncategorized' }}</td></tr>
          <tr class="border-b border-cloud"><td class="py-2 text-fog">Availability</td><td>{{ $product->stock > 0 ? 'In Stock ('.$product->stock.' units)' : 'Out of Stock' }}</td></tr>
          <tr><td class="py-2 text-fog">Brand</td><td>Inkbloom Co.</td></tr>
        </table>
      </details>

      <details class="bg-white rounded-3xl border border-cloud p-5">
        <summary class="list-none cursor-pointer flex items-center justify-between"><span class="font-display text-xl">Shipping & returns</span><span class="w-8 h-8 rounded-full bg-butter flex items-center justify-center font-bold">+</span></summary>
        <div class="mt-4 text-sm text-plum/80 space-y-2">
          <p><b>Shipping:</b> Flat Rs 200 nationwide via TCS. Major cities 2–3 days, rest of PK 3–5 days.</p>
          <p><b>Returns:</b> 7-day window from delivery. Must be unused and in original packaging. <a href="{{ url('/shipping-returns') }}" class="text-cherry underline">Full policy →</a></p>
        </div>
      </details>
    </div>

    {{-- Sidebar --}}
    @if($related->isNotEmpty())
    <div class="bg-white rounded-3xl border border-cloud p-5">
      <h3 class="font-display text-xl mb-4">You might also love</h3>
      <div class="space-y-3 text-sm">
        @foreach($related->take(4) as $item)
        <a href="{{ route('product.show', $item->slug) }}" class="flex items-center gap-3 hover:text-cherry transition-colors">
          <div class="w-12 h-12 rounded-2xl bg-blush flex items-center justify-center text-xl shrink-0">🖋️</div>
          <div>
            <div class="font-semibold text-sm">{{ $item->name }}</div>
            <div class="text-fog text-xs">Rs {{ number_format($item->sale_price ?? $item->price) }}</div>
          </div>
        </a>
        @endforeach
      </div>
    </div>
    @endif
  </div>
</section>

{{-- Related Products --}}
@if($related->isNotEmpty())
<section class="py-16 px-6">
  <div class="max-w-7xl mx-auto">
    <div class="mb-8">
      <p class="hand text-2xl text-cherry">you might also love</p>
      <h2 class="font-display text-3xl">Things that pair beautifully</h2>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-5">
      @php $bgColors = ['#FFD4DE','#E4D6FF','#D4E9D0','#FFF2C4']; @endphp
      @foreach($related->take(4) as $i => $item)
      <article class="bg-white rounded-3xl overflow-hidden product-card">
        <a href="{{ route('product.show', $item->slug) }}">
          <div class="aspect-square" style="background:{{ $bgColors[$i % 4] }};"><div class="w-full h-full flex items-center justify-center text-6xl">🖋️</div></div>
          <div class="p-4">
            <h3 class="font-display">{{ $item->name }}</h3>
            <div class="mt-1 flex items-center justify-between"><span class="font-semibold">Rs {{ number_format($item->sale_price ?? $item->price) }}</span><span class="star text-xs">★★★★★</span></div>
          </div>
        </a>
      </article>
      @endforeach
    </div>
  </div>
</section>
@endif

{{-- Sticky mobile ATC bar --}}
@if($product->stock > 0)
<div class="md:hidden fixed bottom-0 left-0 right-0 bg-white border-t border-cloud p-3 flex items-center gap-3 z-30 shadow-gummy">
  <div class="flex-1">
    <div class="text-xs text-fog">{{ $product->name }}</div>
    <div class="font-display text-lg">Rs {{ number_format($product->sale_price ?? $product->price) }}</div>
  </div>
  <form method="POST" action="{{ route('cart.add') }}">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <input type="hidden" name="quantity" value="1">
    <button type="submit" class="btn-pop">Add to cart 🌸</button>
  </form>
</div>
@endif

</x-layouts.storefront>
