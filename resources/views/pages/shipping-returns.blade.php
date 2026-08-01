<x-layouts.storefront title="Shipping & Returns · Inkbloom Co.">

{{-- Hero --}}
<section class="py-16 px-6 doodle-bg">
  <div class="max-w-3xl mx-auto text-center">
    <p class="hand text-2xl text-cherry mb-2">all the details</p>
    <h1 class="font-display text-5xl">Shipping & Returns</h1>
    <p class="mt-3 text-plum/70">Flat rates, fast delivery, and a no-stress returns process. Here's everything you need to know.</p>
  </div>
</section>

{{-- Stats --}}
<section class="py-10 px-6">
  <div class="max-w-4xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-4">
    <div class="bg-white rounded-3xl border border-cloud p-5 text-center">
      <div class="text-3xl mb-2">📦</div>
      <div class="font-display text-2xl">Rs 200</div>
      <div class="text-fog text-xs mt-1">flat shipping fee</div>
    </div>
    <div class="bg-white rounded-3xl border border-cloud p-5 text-center">
      <div class="text-3xl mb-2">⚡</div>
      <div class="font-display text-2xl">24h</div>
      <div class="text-fog text-xs mt-1">dispatch time</div>
    </div>
    <div class="bg-white rounded-3xl border border-cloud p-5 text-center">
      <div class="text-3xl mb-2">🚚</div>
      <div class="font-display text-2xl">2–5 days</div>
      <div class="text-fog text-xs mt-1">delivery window</div>
    </div>
    <div class="bg-white rounded-3xl border border-cloud p-5 text-center">
      <div class="text-3xl mb-2">↩️</div>
      <div class="font-display text-2xl">7 days</div>
      <div class="text-fog text-xs mt-1">return window</div>
    </div>
  </div>
</section>

{{-- Shipping --}}
<section class="py-10 px-6">
  <div class="max-w-3xl mx-auto">
    <h2 class="font-display text-3xl mb-6">Shipping</h2>

    <div class="bg-white rounded-3xl border border-cloud p-6 mb-5">
      <h3 class="font-display text-xl mb-4">Rates</h3>
      <table class="w-full text-sm">
        <thead><tr class="border-b border-cloud"><th class="py-2 text-left text-fog font-medium">Order Type</th><th class="py-2 text-left text-fog font-medium">Fee</th></tr></thead>
        <tbody>
          <tr class="border-b border-cloud"><td class="py-3">All orders (nationwide)</td><td class="py-3 font-semibold">Rs 200</td></tr>
          <tr><td class="py-3 text-fog" colspan="2">No minimum order for free shipping currently. Flat Rs 200 always.</td></tr>
        </tbody>
      </table>
    </div>

    <div class="bg-white rounded-3xl border border-cloud p-6 mb-5">
      <h3 class="font-display text-xl mb-4">Delivery Times</h3>
      <table class="w-full text-sm">
        <thead><tr class="border-b border-cloud"><th class="py-2 text-left text-fog font-medium">Location</th><th class="py-2 text-left text-fog font-medium">Estimated Delivery</th></tr></thead>
        <tbody>
          <tr class="border-b border-cloud"><td class="py-3">Lahore, Karachi, Islamabad</td><td class="py-3 font-semibold">2–3 business days</td></tr>
          <tr><td class="py-3">Rest of Pakistan</td><td class="py-3 font-semibold">3–5 business days</td></tr>
        </tbody>
      </table>
    </div>

    <div class="bg-white rounded-3xl border border-cloud p-6">
      <h3 class="font-display text-xl mb-3">Courier Partner</h3>
      <p class="text-plum/70 text-sm leading-relaxed">We ship exclusively via <strong>TCS</strong> — nationwide coverage, COD support, and reliable tracking. Once your order is dispatched, you'll receive a tracking number via email so you can follow it every step of the way.</p>
      <a href="{{ url('/track-order') }}" class="inline-flex items-center gap-2 mt-4 text-cherry font-semibold text-sm hover:underline">Track your order →</a>
    </div>
  </div>
</section>

{{-- Returns --}}
<section class="py-10 px-6 bg-cloud/40">
  <div class="max-w-3xl mx-auto">
    <h2 class="font-display text-3xl mb-6">Returns</h2>

    <div class="bg-white rounded-3xl border border-cloud p-6 mb-5">
      <h3 class="font-display text-xl mb-3">The Policy</h3>
      <div class="space-y-3 text-sm text-plum/70 leading-relaxed">
        <p>We offer a <strong>7-day return window</strong> from the date of delivery. If something isn't right, we want to make it right.</p>
        <ul class="list-disc list-inside space-y-1 ml-2">
          <li>Item must be unused and in original packaging</li>
          <li>Contact us within 7 days of receiving your order</li>
          <li>Return shipping is at the customer's cost</li>
          <li>Refund issued to original payment method within 3–5 business days of us receiving the item</li>
        </ul>
      </div>
    </div>

    <div class="bg-white rounded-3xl border border-cloud p-6 mb-5">
      <h3 class="font-display text-xl mb-3">Non-Returnable Items</h3>
      <p class="text-sm text-plum/70 mb-3">The following are exchange-only, no returns:</p>
      <ul class="space-y-2 text-sm text-plum/70">
        <li class="flex items-start gap-2"><span class="text-cherry mt-0.5">•</span> Sale items</li>
        <li class="flex items-start gap-2"><span class="text-cherry mt-0.5">•</span> Opened sticker packs</li>
        <li class="flex items-start gap-2"><span class="text-cherry mt-0.5">•</span> Custom bundles</li>
      </ul>
    </div>

    <div class="bg-white rounded-3xl border border-cloud p-6 mb-5">
      <h3 class="font-display text-xl mb-3">Defective or Wrong Items</h3>
      <p class="text-sm text-plum/70 leading-relaxed">If you received a damaged, defective, or incorrect item, we've got you fully covered. Return shipping is on us and we'll send a replacement or issue a full refund right away. Just contact us with a photo and your order number.</p>
    </div>

    <div class="bg-white rounded-3xl border border-cloud p-6">
      <h3 class="font-display text-xl mb-3">COD Refunds</h3>
      <p class="text-sm text-plum/70 leading-relaxed">For COD orders, refunds are processed via bank transfer or Easypaisa/JazzCash. We'll confirm details with you when you initiate the return.</p>
    </div>
  </div>
</section>

{{-- CTA --}}
<section class="py-16 px-6 text-center">
  <div class="max-w-xl mx-auto">
    <p class="hand text-xl text-cherry mb-2">still have questions?</p>
    <h2 class="font-display text-3xl mb-4">We're happy to help.</h2>
    <div class="flex flex-wrap gap-4 justify-center">
      <a href="{{ url('/contact') }}" class="btn-pop">Contact us →</a>
      <a href="{{ url('/faq') }}" class="btn-ghost">Read the FAQ</a>
    </div>
  </div>
</section>

</x-layouts.storefront>
