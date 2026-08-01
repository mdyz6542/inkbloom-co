<x-layouts.storefront title="Best Sellers · Inkbloom Co.">

{{-- Hero --}}
<section class="py-16 px-6" style="background: linear-gradient(135deg,#FFF2C4 0%,#FFD4DE 100%);">
  <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-8 items-center">
    <div>
      <div class="text-xs text-plum/60 mb-4">
        <a href="{{ url('/') }}" class="hover:text-cherry">Home</a>
        <span class="crumb-sep">›</span>
        <span class="text-plum font-medium">Best Sellers</span>
      </div>
      <p class="hand text-2xl text-cherry mb-2">the crowd pleasers</p>
      <h1 class="font-display text-5xl md:text-6xl leading-tight">Best Sellers</h1>
      <p class="mt-4 text-plum/70 leading-relaxed">The ones everyone keeps coming back for. Community-approved, Bloomie-tested.</p>
      <div class="mt-6 flex gap-3 flex-wrap">
        <span class="chip" style="background:#FFF2C4;">🏆 {{ $products->total() }} top picks</span>
        <span class="chip" style="background:#FFD4DE;">Most loved</span>
      </div>
    </div>
    <div class="relative h-[280px] hidden md:flex items-center justify-center">
      <div class="text-[10rem] float">🏆</div>
    </div>
  </div>
</section>

{{-- Products --}}
<section class="py-16 px-6">
  <div class="max-w-7xl mx-auto">
    @if($products->isEmpty())
      <div class="text-center py-20">
        <div class="text-6xl mb-4">🌱</div>
        <h3 class="font-display text-2xl">Best sellers coming soon</h3>
        <p class="text-fog mt-2">Our community is still voting with their wallets. Check back soon!</p>
        <a href="{{ url('/shop') }}" class="btn-pop mt-6 inline-flex">Browse all products →</a>
      </div>
    @else
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
      @php $bgColors = ['#FFF2C4','#FFD4DE','#E4D6FF','#D4E9D0','#FFF2C4','#F4F0F6']; @endphp
      @foreach($products as $i => $product)
      <article class="bg-white rounded-3xl overflow-hidden product-card">
        <a href="{{ route('product.show', $product->slug) }}">
          <div class="aspect-square relative" style="background:{{ $bgColors[$i % 6] }};">
            <span class="absolute top-3 left-3 chip" style="background:#FFF2C4;">🏆 Best</span>
            <x-product-image :product="$product" size="text-6xl" class="absolute inset-0 w-full h-full" />
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

    @if($products->hasPages())
    <div class="mt-10 text-center">{{ $products->links() }}</div>
    @endif
    @endif
  </div>
</section>

</x-layouts.storefront>
