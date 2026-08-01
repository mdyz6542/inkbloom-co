<x-layouts.storefront title="Your Cart · Inkbloom Co.">

<section class="py-12 px-6">
  <div class="max-w-5xl mx-auto">

    {{-- Header --}}
    <div class="mb-8">
      <p class="hand text-xl text-cherry mb-1">almost there</p>
      <h1 class="font-display text-4xl">Your Cart</h1>
    </div>

    @if(session('success'))
      <div class="mb-6 bg-matcha/30 text-plum rounded-2xl px-5 py-3 text-sm font-semibold">{{ session('success') }}</div>
    @endif

    @if(empty($items))
      {{-- Empty cart --}}
      <div class="text-center py-24">
        <div class="text-7xl mb-5">🌸</div>
        <h2 class="font-display text-3xl mb-2">Your cart is taking a little nap.</h2>
        <p class="text-fog">Wake it up with something lovely.</p>
        <a href="{{ url('/shop') }}" class="btn-pop mt-6 inline-flex">Browse the shop →</a>
      </div>
    @else
    <div class="grid md:grid-cols-[1fr_340px] gap-8">

      {{-- Items --}}
      <div class="space-y-4">
        @foreach($items as $item)
        <div class="bg-white rounded-3xl border border-cloud p-5 flex items-center gap-5">
          <x-product-image :image="$item['image'] ?? null" :alt="$item['name']" size="text-4xl" class="w-20 h-20 rounded-2xl shrink-0" style="background:#FFD4DE;" />
          <div class="flex-1 min-w-0">
            <h3 class="font-display text-lg leading-tight">{{ $item['name'] }}</h3>
            <p class="text-fog text-sm mt-0.5">Rs {{ number_format($item['price']) }} each</p>
          </div>
          <div class="flex items-center gap-3 shrink-0">
            {{-- Quantity --}}
            <form method="POST" action="{{ route('cart.update') }}" class="flex items-center border-2 border-plum rounded-full">
              @csrf
              <input type="hidden" name="product_id" value="{{ $item['id'] }}">
              <button type="submit" name="quantity" value="{{ max(0, $item['quantity'] - 1) }}" class="w-9 h-9 text-lg font-bold flex items-center justify-center">−</button>
              <span class="w-8 text-center font-semibold text-sm">{{ $item['quantity'] }}</span>
              <button type="submit" name="quantity" value="{{ $item['quantity'] + 1 }}" class="w-9 h-9 text-lg font-bold flex items-center justify-center">+</button>
            </form>
            {{-- Line total --}}
            <span class="font-semibold w-24 text-right">Rs {{ number_format($item['price'] * $item['quantity']) }}</span>
            {{-- Remove --}}
            <form method="POST" action="{{ route('cart.remove') }}">
              @csrf
              <input type="hidden" name="product_id" value="{{ $item['id'] }}">
              <button type="submit" class="w-8 h-8 rounded-full hover:bg-blush flex items-center justify-center text-fog hover:text-cherry transition-colors" aria-label="Remove">
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6 6 18M6 6l12 12"/></svg>
              </button>
            </form>
          </div>
        </div>
        @endforeach

        <div class="flex items-center justify-between pt-2">
          <a href="{{ url('/shop') }}" class="text-sm text-fog hover:text-cherry underline">← Continue shopping</a>
        </div>
      </div>

      {{-- Summary --}}
      <div class="bg-white rounded-3xl border border-cloud p-6 h-fit">
        <h2 class="font-display text-xl mb-5">Order Summary</h2>
        <div class="space-y-3 text-sm">
          <div class="flex justify-between"><span class="text-fog">Subtotal</span><span>Rs {{ number_format($subtotal) }}</span></div>
          <div class="flex justify-between"><span class="text-fog">Shipping</span><span>Rs {{ number_format($shipping) }}</span></div>
          <div class="border-t border-cloud pt-3 flex justify-between font-display text-lg"><span>Total</span><span>Rs {{ number_format($total) }}</span></div>
        </div>

        <div class="mt-4 bg-cloud/50 rounded-2xl p-3 text-xs text-fog text-center">
          🌸 Use code <b class="text-plum">BLOOM10</b> at checkout for 10% off your first order.
        </div>

        <a href="{{ url('/checkout') }}" class="btn-pop w-full justify-center mt-5">Proceed to checkout →</a>

        <div class="mt-4 grid grid-cols-3 gap-2 text-xs text-center text-fog">
          <div><div class="text-lg">📦</div>COD available</div>
          <div><div class="text-lg">🔒</div>Secure</div>
          <div><div class="text-lg">↩️</div>7-day returns</div>
        </div>
      </div>

    </div>
    @endif

  </div>
</section>

</x-layouts.storefront>
