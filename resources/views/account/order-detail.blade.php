<x-layouts.storefront title="Order {{ $order->order_number }} · Inkbloom Co.">

<section class="py-12 px-6">
  <div class="max-w-3xl mx-auto">

    <div class="flex items-center gap-2 mb-2 text-sm text-fog">
      <a href="{{ route('account') }}" class="hover:text-cherry">My Account</a>
      <span>›</span>
      <a href="{{ route('account.orders') }}" class="hover:text-cherry">Orders</a>
      <span>›</span>
      <span class="text-plum">{{ $order->order_number }}</span>
    </div>

    <div class="flex items-center justify-between flex-wrap gap-4 mb-8">
      <h1 class="font-display text-4xl">{{ $order->order_number }}</h1>
      <span class="chip text-sm" style="{{ match($order->status) {
        'pending'    => 'background:#FFF2C4',
        'processing' => 'background:#E4D6FF',
        'dispatched' => 'background:#D4E9D0',
        'delivered'  => 'background:#D4E9D0',
        'cancelled'  => 'background:#FFD4DE',
        default      => '',
      } }}">{{ ucfirst($order->status) }}</span>
    </div>

    {{-- Items --}}
    <div class="bg-white rounded-3xl border border-cloud p-6 mb-5">
      <h2 class="font-display text-xl mb-4">Items ordered</h2>
      <div class="space-y-4">
        @foreach($order->items as $item)
        <div class="flex items-center gap-4">
          <x-product-image :product="$item->product" :alt="$item->name" size="text-2xl" class="w-14 h-14 rounded-2xl bg-blush shrink-0" />
          <div class="flex-1">
            <div class="font-semibold">{{ $item->name }}</div>
            <div class="text-fog text-xs mt-0.5">Rs {{ number_format($item->price) }} × {{ $item->quantity }}</div>
          </div>
          <div class="font-semibold shrink-0">Rs {{ number_format($item->total) }}</div>
        </div>
        @endforeach
      </div>
      <div class="border-t border-cloud mt-5 pt-4 space-y-2 text-sm">
        <div class="flex justify-between text-fog"><span>Subtotal</span><span>Rs {{ number_format($order->subtotal) }}</span></div>
        <div class="flex justify-between text-fog"><span>Shipping</span><span>Rs {{ number_format($order->shipping_fee) }}</span></div>
        <div class="flex justify-between font-display text-lg border-t border-cloud pt-2 mt-1"><span>Total</span><span>Rs {{ number_format($order->total) }}</span></div>
      </div>
    </div>

    <div class="grid md:grid-cols-2 gap-5">
      {{-- Delivery address --}}
      @if($order->address)
      <div class="bg-white rounded-3xl border border-cloud p-6">
        <h2 class="font-display text-lg mb-3">Delivery address</h2>
        <div class="text-sm text-plum/70 space-y-0.5">
          <p class="font-semibold text-plum">{{ $order->address->name }}</p>
          <p>{{ $order->address->line1 }}</p>
          @if($order->address->line2)<p>{{ $order->address->line2 }}</p>@endif
          <p>{{ $order->address->city }}@if($order->address->province), {{ $order->address->province }}@endif</p>
          <p class="mt-1">📞 {{ $order->address->phone }}</p>
        </div>
      </div>
      @endif

      {{-- Payment --}}
      <div class="bg-white rounded-3xl border border-cloud p-6">
        <h2 class="font-display text-lg mb-3">Payment</h2>
        <div class="text-sm text-plum/70 space-y-1">
          <p>{{ match($order->payment_method) {
            'cod'           => '💵 Cash on Delivery',
            'jazzcash'      => '📱 JazzCash',
            'easypaisa'     => '💚 Easypaisa',
            'bank_transfer' => '🏦 Bank Transfer',
            default         => $order->payment_method,
          } }}</p>
          <p>Status: <span class="font-semibold {{ $order->payment_status === 'paid' ? 'text-green-600' : 'text-plum' }}">{{ ucfirst(str_replace('_', ' ', $order->payment_status)) }}</span></p>
        </div>
        @if($order->tracking_number)
        <div class="mt-4 pt-4 border-t border-cloud">
          <p class="text-xs text-fog mb-1">TCS Tracking Number</p>
          <p class="font-semibold text-cherry">{{ $order->tracking_number }}</p>
          <a href="{{ url('/track-order') }}" class="text-xs text-cherry hover:underline mt-1 inline-block">Track on site →</a>
        </div>
        @endif
      </div>
    </div>

    <div class="mt-6 flex flex-wrap gap-3">
      <a href="{{ route('account.orders') }}" class="btn-ghost">← Back to orders</a>
      <a href="{{ url('/shop') }}" class="btn-pop">Shop again 🌸</a>
    </div>

  </div>
</section>

</x-layouts.storefront>
