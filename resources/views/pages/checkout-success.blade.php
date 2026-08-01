<x-layouts.storefront title="Order Confirmed · Inkbloom Co.">

<section class="py-20 px-6">
  <div class="max-w-2xl mx-auto text-center">

    {{-- Bloomie celebration --}}
    <div class="flex justify-center mb-6">
      <svg viewBox="0 0 200 200" class="w-40 h-40 float" xmlns="http://www.w3.org/2000/svg">
        <g transform="translate(100,110)">
          <rect x="-4" y="38" width="8" height="40" rx="4" fill="#D4E9D0"/>
          <ellipse cx="0" cy="-36" rx="20" ry="28" fill="#FFD4DE"/>
          <ellipse cx="-32" cy="-12" rx="20" ry="28" fill="#E4D6FF" transform="rotate(-60 -32 -12)"/>
          <ellipse cx="32" cy="-12" rx="20" ry="28" fill="#FFD4DE" transform="rotate(60 32 -12)"/>
          <ellipse cx="-24" cy="28" rx="20" ry="28" fill="#E4D6FF" transform="rotate(-130 -24 28)"/>
          <ellipse cx="24" cy="28" rx="20" ry="28" fill="#FFD4DE" transform="rotate(130 24 28)"/>
          <circle cx="0" cy="0" r="28" fill="#FFF2C4"/>
          <circle cx="-13" cy="5" r="4.5" fill="#FF4D6D" opacity="0.45"/>
          <circle cx="13" cy="5" r="4.5" fill="#FF4D6D" opacity="0.45"/>
          <circle cx="-6" cy="-4" r="2.2" fill="#3D2B4F"/>
          <circle cx="6" cy="-4" r="2.2" fill="#3D2B4F"/>
          <path d="M -6,5 Q 0,11 6,5" stroke="#3D2B4F" stroke-width="2" fill="none" stroke-linecap="round"/>
        </g>
        <text x="140" y="30" font-size="22" text-anchor="middle">🎉</text>
        <text x="30" y="20" font-size="18" text-anchor="middle">✨</text>
        <text x="160" y="80" font-size="16" text-anchor="middle">🌸</text>
      </svg>
    </div>

    <h1 class="font-display text-4xl md:text-5xl">Your order is officially blooming.</h1>
    <p class="mt-3 text-plum/70 text-lg">We'll send it your way with a tiny surprise inside. 🌸</p>

    {{-- Order number --}}
    <div class="mt-8 bg-butter rounded-3xl p-6 border-2 border-plum/10 inline-block w-full">
      <p class="text-fog text-sm">Order number</p>
      <p class="font-display text-3xl text-cherry mt-1">{{ $order->order_number }}</p>
      <p class="text-xs text-fog mt-2">Save this for tracking. A confirmation email is on its way.</p>
    </div>

    {{-- Order details --}}
    <div class="mt-6 bg-white rounded-3xl border border-cloud p-6 text-left">
      <h2 class="font-display text-xl mb-4">What you ordered</h2>
      <div class="space-y-3">
        @foreach($order->items as $item)
        <div class="flex items-center justify-between text-sm">
          <div class="flex items-center gap-3">
            <x-product-image :product="$item->product" :alt="$item->name" size="text-lg" class="w-10 h-10 rounded-xl bg-blush" />
            <div>
              <div class="font-semibold">{{ $item->name }}</div>
              <div class="text-fog text-xs">Qty: {{ $item->quantity }}</div>
            </div>
          </div>
          <div class="font-semibold">Rs {{ number_format($item->total) }}</div>
        </div>
        @endforeach
      </div>
      <div class="border-t border-cloud mt-4 pt-4 space-y-2 text-sm">
        <div class="flex justify-between"><span class="text-fog">Subtotal</span><span>Rs {{ number_format($order->subtotal) }}</span></div>
        <div class="flex justify-between"><span class="text-fog">Shipping</span><span>Rs {{ number_format($order->shipping_fee) }}</span></div>
        <div class="flex justify-between font-display text-lg border-t border-cloud pt-2 mt-1"><span>Total</span><span>Rs {{ number_format($order->total) }}</span></div>
      </div>
    </div>

    {{-- Delivery info --}}
    @if($order->address)
    <div class="mt-4 bg-white rounded-3xl border border-cloud p-6 text-left">
      <h2 class="font-display text-xl mb-3">Delivering to</h2>
      <p class="text-sm text-plum/70">{{ $order->address->name }}</p>
      <p class="text-sm text-plum/70">{{ $order->address->line1 }}@if($order->address->line2), {{ $order->address->line2 }}@endif</p>
      <p class="text-sm text-plum/70">{{ $order->address->city }}@if($order->address->province), {{ $order->address->province }}@endif</p>
      <p class="text-sm text-plum/70 mt-1">📞 {{ $order->address->phone }}</p>
    </div>
    @endif

    {{-- Payment method --}}
    <div class="mt-4 bg-white rounded-3xl border border-cloud p-5 text-sm flex items-center gap-3">
      <span class="text-2xl">
        @if($order->payment_method === 'cod') 💵
        @elseif($order->payment_method === 'jazzcash') 📱
        @elseif($order->payment_method === 'easypaisa') 💚
        @else 🏦
        @endif
      </span>
      <div class="text-left">
        <div class="font-semibold">{{ match($order->payment_method) {
          'cod' => 'Cash on Delivery',
          'jazzcash' => 'JazzCash',
          'easypaisa' => 'Easypaisa',
          'bank_transfer' => 'Bank Transfer',
          default => $order->payment_method,
        } }}</div>
        <div class="text-fog text-xs">
          @if($order->payment_method === 'cod') Pay when your order arrives.
          @elseif($order->payment_method === 'bank_transfer') Please transfer the amount and WhatsApp us your receipt to confirm your order.
          @else Payment received. Thank you!
          @endif
        </div>
      </div>
    </div>

    {{-- What's next --}}
    <div class="mt-8 bg-cloud/50 rounded-3xl p-6 text-sm text-plum/70 text-left space-y-3">
      <h2 class="font-display text-lg text-plum">What happens next</h2>
      <div class="flex gap-3"><span class="text-cherry font-bold shrink-0">1.</span><span>We'll pack your order with care (and a little surprise).</span></div>
      <div class="flex gap-3"><span class="text-cherry font-bold shrink-0">2.</span><span>Dispatched within 24 hours via TCS. You'll get a tracking number by email.</span></div>
      <div class="flex gap-3"><span class="text-cherry font-bold shrink-0">3.</span><span>Delivery in 2–5 business days depending on your city.</span></div>
    </div>

    {{-- CTAs --}}
    <div class="mt-8 flex flex-col sm:flex-row gap-4 justify-center">
      <a href="{{ url('/shop') }}" class="btn-pop">Keep shopping 🌸</a>
      <a href="{{ url('/track-order') }}" class="btn-ghost">Track my order</a>
    </div>

  </div>
</section>

</x-layouts.storefront>
