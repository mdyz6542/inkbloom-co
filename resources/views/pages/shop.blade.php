<x-layouts.storefront title="Shop All · Inkbloom Co." description="Browse our full collection of aesthetic stationery in Pakistan. Pens, notebooks, washi tape, kawaii stickers and more. Flat Rs 200 shipping nationwide.">

{{-- Page Header --}}
<section class="py-10 px-6 doodle-bg">
  <div class="max-w-7xl mx-auto">
    <div class="text-xs text-fog mb-3">
      <a href="{{ url('/') }}" class="hover:text-cherry">Home</a>
      <span class="crumb-sep">›</span>
      <span class="text-plum font-medium">Shop</span>
    </div>
    <div class="flex items-end justify-between flex-wrap gap-3">
      <div>
        <p class="hand text-2xl text-cherry">every petal, every page</p>
        <h1 class="font-display text-4xl md:text-5xl">Shop All</h1>
        <p class="text-sm text-plum/70 mt-1">{{ $products->total() }} lovely things · all under one roof</p>
      </div>
      <div class="flex items-center gap-2 text-sm">
        <span class="text-fog">Sort by:</span>
        <select class="field-input py-2 pr-8" style="width:auto;">
          <option>Featured</option>
          <option>Newest</option>
          <option>Price: low to high</option>
          <option>Price: high to low</option>
        </select>
      </div>
    </div>
  </div>
</section>

{{-- Main: Filters + Products --}}
<section class="py-10 px-6">
  <div class="max-w-7xl mx-auto grid md:grid-cols-[260px_1fr] gap-8">

    {{-- Filters Sidebar --}}
    <aside class="space-y-5">
      <div class="bg-white rounded-3xl border border-cloud p-5">
        <h3 class="font-display text-lg mb-3">Category</h3>
        <ul class="space-y-2 text-sm">
          @foreach($categories as $cat)
          <li>
            <label class="flex items-center gap-2 cursor-pointer">
              <input type="checkbox" class="accent-cherry" />
              {{ $cat->name }}
            </label>
          </li>
          @endforeach
        </ul>
      </div>

      <div class="bg-white rounded-3xl border border-cloud p-5">
        <h3 class="font-display text-lg mb-3">Price</h3>
        <div class="flex gap-2 mb-3">
          <input class="field-input py-2 text-xs" placeholder="Rs min"/>
          <input class="field-input py-2 text-xs" placeholder="Rs max"/>
        </div>
        <ul class="space-y-2 text-sm">
          <li><label class="flex items-center gap-2 cursor-pointer"><input type="radio" name="price" class="accent-cherry"/> Under Rs 500</label></li>
          <li><label class="flex items-center gap-2 cursor-pointer"><input type="radio" name="price" class="accent-cherry"/> Rs 500 – 1,000</label></li>
          <li><label class="flex items-center gap-2 cursor-pointer"><input type="radio" name="price" class="accent-cherry"/> Rs 1,000 – 2,000</label></li>
          <li><label class="flex items-center gap-2 cursor-pointer"><input type="radio" name="price" class="accent-cherry"/> Rs 2,000+</label></li>
        </ul>
      </div>

      <div class="bg-white rounded-3xl border border-cloud p-5">
        <h3 class="font-display text-lg mb-3">Availability</h3>
        <ul class="space-y-2 text-sm">
          <li><label class="flex items-center gap-2 cursor-pointer"><input type="checkbox" class="accent-cherry" checked/> In stock</label></li>
          <li><label class="flex items-center gap-2 cursor-pointer"><input type="checkbox" class="accent-cherry"/> On sale</label></li>
          <li><label class="flex items-center gap-2 cursor-pointer"><input type="checkbox" class="accent-cherry"/> New arrivals</label></li>
        </ul>
      </div>

      <button class="btn-ghost w-full justify-center">Clear all filters</button>
    </aside>

    {{-- Products Grid --}}
    <div>
      @if($products->isEmpty())
        <div class="text-center py-20">
          <div class="text-6xl mb-4">🌱</div>
          <h3 class="font-display text-2xl">Nothing here yet</h3>
          <p class="text-fog mt-2">Products are on their way. Check back soon!</p>
        </div>
      @else
      <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
        @php $bgColors = ['#FFD4DE','#E4D6FF','#D4E9D0','#FFF2C4','#FFD4DE','#F4F0F6']; @endphp
        @foreach($products as $i => $product)
        <article class="bg-white rounded-3xl overflow-hidden product-card">
          <a href="{{ route('product.show', $product->slug) }}">
            <div class="aspect-square relative" style="background:{{ $bgColors[$i % 6] }};">
              @if($product->is_new)
                <span class="absolute top-3 left-3 chip" style="background:#FF4D6D;color:white;border-color:#FF4D6D;">NEW</span>
              @elseif($product->is_bestseller)
                <span class="absolute top-3 left-3 chip" style="background:#FFF2C4;">🏆 Best</span>
              @elseif($product->sale_price)
                <span class="absolute top-3 left-3 chip" style="background:#FF4D6D;color:white;border-color:#FF4D6D;">SALE</span>
              @endif
              <div class="absolute inset-0 flex items-center justify-center text-6xl">🖋️</div>
            </div>
            <div class="p-4">
              <p class="text-xs text-fog">{{ $product->category->name ?? '' }}</p>
              <h3 class="font-display text-base leading-tight">{{ $product->name }}</h3>
              <div class="flex items-center justify-between mt-2">
                <span class="font-semibold">
                  Rs {{ number_format($product->sale_price ?? $product->price) }}
                  @if($product->sale_price)
                    <span class="line-through text-xs text-fog font-normal">Rs {{ number_format($product->price) }}</span>
                  @endif
                </span>
                <span class="text-xs star">★★★★★</span>
              </div>
            </div>
          </a>
        </article>
        @endforeach
      </div>

      {{-- Pagination --}}
      @if($products->hasPages())
      <div class="mt-10 flex items-center justify-between flex-wrap gap-3">
        <p class="text-sm text-fog">Showing {{ $products->firstItem() }}–{{ $products->lastItem() }} of {{ $products->total() }}</p>
        <div class="flex items-center gap-1">
          {{ $products->links() }}
        </div>
      </div>
      @endif
      @endif
    </div>
  </div>
</section>

</x-layouts.storefront>
