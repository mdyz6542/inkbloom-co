<x-layouts.storefront title="My Orders · Inkbloom Co.">

<section class="py-12 px-6">
  <div class="max-w-4xl mx-auto">

    <div class="flex items-center gap-3 mb-2">
      <a href="{{ route('account') }}" class="text-fog hover:text-cherry text-sm">← My Account</a>
    </div>
    <h1 class="font-display text-4xl mb-8">My Orders</h1>

    @if($orders->isEmpty())
      <div class="bg-white rounded-3xl border border-cloud p-16 text-center">
        <div class="text-6xl mb-4">🌱</div>
        <h2 class="font-display text-2xl">No orders yet</h2>
        <p class="text-fog mt-2">Your first order is just a click away.</p>
        <a href="{{ url('/shop') }}" class="btn-pop mt-6 inline-flex">Shop now →</a>
      </div>
    @else
      <div class="space-y-4">
        @foreach($orders as $order)
        <div class="bg-white rounded-3xl border border-cloud p-6">
          <div class="flex items-start justify-between flex-wrap gap-4">
            <div>
              <div class="font-display text-lg">{{ $order->order_number }}</div>
              <div class="text-fog text-sm mt-0.5">Placed {{ $order->created_at->format('d M Y') }}</div>
            </div>
            <div class="flex items-center gap-3">
              <span class="font-semibold">Rs {{ number_format($order->total) }}</span>
              <span class="chip {{ match($order->status) {
                'pending'    => '',
                'processing' => '',
                'dispatched' => '',
                'delivered'  => '',
                default      => '',
              } }}" style="{{ match($order->status) {
                'pending'    => 'background:#FFF2C4',
                'processing' => 'background:#E4D6FF',
                'dispatched' => 'background:#D4E9D0',
                'delivered'  => 'background:#D4E9D0',
                'cancelled'  => 'background:#FFD4DE',
                default      => '',
              } }}">{{ ucfirst($order->status) }}</span>
            </div>
          </div>

          <div class="mt-4 space-y-2">
            @foreach($order->items as $item)
            <div class="flex items-center gap-3 text-sm text-plum/70">
              <x-product-image :product="$item->product" :alt="$item->name" size="text-base" class="w-8 h-8 rounded-xl bg-blush shrink-0" />
              <span>{{ $item->name }}</span>
              <span class="text-fog">× {{ $item->quantity }}</span>
              <span class="ml-auto font-semibold">Rs {{ number_format($item->total) }}</span>
            </div>
            @endforeach
          </div>

          <div class="mt-4 flex items-center justify-between flex-wrap gap-2">
            <div class="text-xs text-fog">
              {{ match($order->payment_method) {
                'cod'           => '💵 Cash on Delivery',
                'jazzcash'      => '📱 JazzCash',
                'easypaisa'     => '💚 Easypaisa',
                'bank_transfer' => '🏦 Bank Transfer',
                default         => $order->payment_method,
              } }} ·
              {{ match($order->payment_status) {
                'unpaid'                => 'Unpaid',
                'awaiting_verification' => 'Awaiting verification',
                'paid'                  => '✅ Paid',
                default                 => $order->payment_status,
              } }}
            </div>
            <a href="{{ route('account.order-detail', $order->order_number) }}" class="text-cherry text-sm font-semibold hover:underline">View details →</a>
          </div>
        </div>
        @endforeach
      </div>

      @if($orders->hasPages())
        <div class="mt-8 text-center">{{ $orders->links() }}</div>
      @endif
    @endif

  </div>
</section>

</x-layouts.storefront>
