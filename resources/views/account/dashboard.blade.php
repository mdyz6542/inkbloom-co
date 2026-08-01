<x-layouts.storefront title="My Account · Inkbloom Co.">

<section class="py-12 px-6">
  <div class="max-w-5xl mx-auto">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-8 flex-wrap gap-4">
      <div>
        <p class="hand text-xl text-cherry">welcome back</p>
        <h1 class="font-display text-4xl">Hi, {{ auth()->user()->name }} 🌸</h1>
      </div>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn-ghost text-sm">Log out</button>
      </form>
    </div>

    {{-- Quick stats --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
      <div class="bg-white rounded-3xl border border-cloud p-5 text-center">
        <div class="text-3xl mb-1">📦</div>
        <div class="font-display text-2xl">{{ $orders->count() }}</div>
        <div class="text-fog text-xs mt-0.5">recent orders</div>
      </div>
      <a href="{{ url('/shop') }}" class="bg-blush rounded-3xl p-5 text-center hover:shadow-gummy transition-shadow">
        <div class="text-3xl mb-1">🛍️</div>
        <div class="font-semibold text-sm mt-1">Shop Now</div>
        <div class="text-fog text-xs">browse all products</div>
      </a>
      <a href="{{ url('/track-order') }}" class="bg-matcha/40 rounded-3xl p-5 text-center hover:shadow-gummy transition-shadow">
        <div class="text-3xl mb-1">🚚</div>
        <div class="font-semibold text-sm mt-1">Track Order</div>
        <div class="text-fog text-xs">enter tracking number</div>
      </a>
      <a href="{{ url('/contact') }}" class="bg-butter rounded-3xl p-5 text-center hover:shadow-gummy transition-shadow">
        <div class="text-3xl mb-1">💌</div>
        <div class="font-semibold text-sm mt-1">Need Help?</div>
        <div class="text-fog text-xs">contact us</div>
      </a>
    </div>

    {{-- Recent orders --}}
    <div class="bg-white rounded-3xl border border-cloud p-6">
      <div class="flex items-center justify-between mb-5">
        <h2 class="font-display text-xl">Recent Orders</h2>
        <a href="{{ route('account.orders') }}" class="text-cherry text-sm font-semibold hover:underline">View all →</a>
      </div>

      @if($orders->isEmpty())
        <div class="text-center py-12">
          <div class="text-5xl mb-3">🌱</div>
          <p class="font-display text-lg">No orders yet</p>
          <p class="text-fog text-sm mt-1">Your first order is just a click away.</p>
          <a href="{{ url('/shop') }}" class="btn-pop mt-4 inline-flex">Shop now →</a>
        </div>
      @else
        <div class="space-y-3">
          @foreach($orders as $order)
          <a href="{{ route('account.order-detail', $order->order_number) }}" class="flex items-center justify-between p-4 rounded-2xl border border-cloud hover:bg-cloud/30 transition-colors group">
            <div class="flex items-center gap-4">
              <div class="w-10 h-10 rounded-xl bg-blush flex items-center justify-center text-lg">📦</div>
              <div>
                <div class="font-semibold text-sm">{{ $order->order_number }}</div>
                <div class="text-fog text-xs">{{ $order->created_at->format('d M Y') }} · {{ $order->items->count() }} item(s)</div>
              </div>
            </div>
            <div class="flex items-center gap-3 shrink-0">
              <span class="text-sm font-semibold">Rs {{ number_format($order->total) }}</span>
              <span class="chip text-xs {{ match($order->status) {
                'pending'    => 'bg-butter',
                'processing' => 'bg-lilac',
                'dispatched' => 'bg-matcha',
                'delivered'  => 'bg-matcha',
                'cancelled'  => 'bg-blush',
                default      => 'bg-cloud',
              } }}">{{ ucfirst($order->status) }}</span>
              <svg class="w-4 h-4 text-fog group-hover:text-cherry transition-colors" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m9 18 6-6-6-6"/></svg>
            </div>
          </a>
          @endforeach
        </div>
      @endif
    </div>

  </div>
</section>

</x-layouts.storefront>
