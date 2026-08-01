<x-layouts.storefront title="{{ $category->name }} · Inkbloom Co.">

{{-- Category Hero --}}
<section class="relative overflow-hidden" style="background: linear-gradient(135deg,#FFD4DE 0%,#E4D6FF 100%);">
  <div class="max-w-7xl mx-auto px-6 py-16 grid md:grid-cols-2 gap-8 items-center">
    <div>
      <div class="text-xs mb-4">
        <a href="{{ url('/') }}" class="hover:text-cherry">Home</a>
        <span class="crumb-sep">›</span>
        <a href="{{ url('/shop') }}" class="hover:text-cherry">Shop</a>
        <span class="crumb-sep">›</span>
        <span class="text-plum font-medium">{{ $category->name }}</span>
      </div>
      <p class="hand text-2xl text-cherry">{{ $category->tagline ?? 'browse & discover' }}</p>
      <h1 class="font-display text-5xl md:text-6xl">{{ $category->name }}</h1>
      @if($category->intro_copy)
        <div class="mt-5 text-plum/80 max-w-xl leading-relaxed">
          <p>{{ $category->intro_copy }}</p>
        </div>
      @endif
      <div class="mt-6 flex gap-3 flex-wrap">
        <span class="chip bg-white">{{ $products->total() }} products</span>
        <span class="chip bg-white">⭐ top rated</span>
      </div>
    </div>

    <div class="relative h-[360px]">
      <div class="absolute inset-4 bg-white/50 rounded-5xl backdrop-blur"></div>
      <svg viewBox="0 0 400 400" class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-[260px] h-[260px] float">
        <g transform="translate(200, 220)">
          <rect x="-5" y="60" width="10" height="50" rx="5" fill="#D4E9D0"/>
          <ellipse cx="0" cy="-48" rx="26" ry="36" fill="#FFD4DE"/>
          <ellipse cx="-46" cy="-18" rx="26" ry="36" fill="#FFD4DE" transform="rotate(-60 -46 -18)"/>
          <ellipse cx="46" cy="-18" rx="26" ry="36" fill="#FFD4DE" transform="rotate(60 46 -18)"/>
          <ellipse cx="-34" cy="36" rx="26" ry="36" fill="#FFD4DE" transform="rotate(-130 -34 36)"/>
          <ellipse cx="34" cy="36" rx="26" ry="36" fill="#FFD4DE" transform="rotate(130 34 36)"/>
          <circle cx="0" cy="0" r="38" fill="#FFF2C4"/>
          <circle cx="-19" cy="7" r="6" fill="#FF4D6D" opacity="0.45"/>
          <circle cx="19" cy="7" r="6" fill="#FF4D6D" opacity="0.45"/>
          <circle cx="-9" cy="-6" r="3" fill="#3D2B4F"/>
          <circle cx="9" cy="-6" r="3" fill="#3D2B4F"/>
          <path d="M -8,6 Q 0,14 8,6" stroke="#3D2B4F" stroke-width="2.5" fill="none" stroke-linecap="round"/>
        </g>
      </svg>
      <div class="absolute top-6 right-6 bg-butter border-2 border-plum rounded-2xl px-4 py-2 rotate-3 font-display text-sm">too good to scroll past ✨</div>
    </div>
  </div>
</section>

{{-- Products --}}
<section class="py-16 px-6">
  <div class="max-w-7xl mx-auto grid md:grid-cols-[240px_1fr] gap-8">

    {{-- Filters --}}
    <aside class="space-y-5">
      <div class="bg-white rounded-3xl border border-cloud p-5">
        <h3 class="font-display text-lg mb-3">Price</h3>
        <div class="flex gap-2"><input class="field-input py-2 text-xs" placeholder="min"/><input class="field-input py-2 text-xs" placeholder="max"/></div>
      </div>
      <div class="bg-white rounded-3xl border border-cloud p-5">
        <h3 class="font-display text-lg mb-3">Availability</h3>
        <ul class="space-y-2 text-sm">
          <li><label class="flex items-center gap-2 cursor-pointer"><input type="checkbox" class="accent-cherry" checked/> In stock</label></li>
          <li><label class="flex items-center gap-2 cursor-pointer"><input type="checkbox" class="accent-cherry"/> On sale</label></li>
          <li><label class="flex items-center gap-2 cursor-pointer"><input type="checkbox" class="accent-cherry"/> New arrivals</label></li>
        </ul>
      </div>
      <button class="btn-ghost w-full justify-center">Clear filters</button>
    </aside>

    <div>
      <div class="flex items-center justify-between mb-6">
        <p class="text-sm text-fog">Showing {{ $products->firstItem() ?? 0 }}–{{ $products->lastItem() ?? 0 }} of {{ $products->total() }} in {{ $category->name }}</p>
        <select class="field-input py-2" style="width:auto;">
          <option>Sort: Featured</option>
          <option>Newest</option>
          <option>Price low→high</option>
          <option>Price high→low</option>
        </select>
      </div>

      @if($products->isEmpty())
        <div class="text-center py-20">
          <div class="text-6xl mb-4">🌱</div>
          <h3 class="font-display text-2xl">Coming soon</h3>
          <p class="text-fog mt-2">We're stocking this category with the prettiest things. Check back soon!</p>
          <a href="{{ url('/shop') }}" class="btn-pop mt-6 inline-flex">Browse all products →</a>
        </div>
      @else
      <div class="grid grid-cols-2 md:grid-cols-3 gap-5">
        @php $bgColors = ['#FFD4DE','#E4D6FF','#D4E9D0','#FFF2C4','#FFD4DE','#F4F0F6']; @endphp
        @foreach($products as $i => $product)
        <article class="bg-white rounded-3xl overflow-hidden product-card">
          <a href="{{ route('product.show', $product->slug) }}">
            <div class="aspect-square relative" style="background:{{ $bgColors[$i % 6] }};">
              @if($product->is_new)
                <span class="absolute top-3 left-3 chip" style="background:#FF4D6D;color:white;border-color:#FF4D6D;">NEW</span>
              @endif
              <x-product-image :product="$product" size="text-7xl" class="absolute inset-0 w-full h-full" />
            </div>
            <div class="p-4">
              <h3 class="font-display">{{ $product->name }}</h3>
              <div class="flex items-center justify-between mt-2">
                <span class="font-semibold">Rs {{ number_format($product->sale_price ?? $product->price) }}</span>
                <span class="text-xs star">★★★★★</span>
              </div>
            </div>
          </a>
        </article>
        @endforeach
      </div>
      @if($products->hasPages())
        <div class="text-center mt-10">{{ $products->links() }}</div>
      @endif
      @endif
    </div>
  </div>
</section>

{{-- Cross-sell --}}
<section class="py-16 px-6 bg-cloud/50">
  <div class="max-w-7xl mx-auto text-center">
    <p class="hand text-2xl text-cherry">one more thing</p>
    <h2 class="font-display text-3xl">Can't pick? Try a curated bundle.</h2>
    <p class="text-plum/70 mt-2">We've done the hard part for you. All the cute, none of the decision fatigue.</p>
    <a href="{{ url('/shop/gifts-bundles') }}" class="btn-pop mt-6 inline-flex">Shop bundles →</a>
  </div>
</section>

</x-layouts.storefront>
