@php
$faqSchema = [
    '@context'   => 'https://schema.org',
    '@type'      => 'FAQPage',
    'mainEntity' => [
        ['@type' => 'Question', 'name' => 'How much does shipping cost?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Flat Rs 200 nationwide. No surprises at checkout.']],
        ['@type' => 'Question', 'name' => 'How long will my order take to arrive?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Karachi, Lahore, Islamabad: 2 to 3 business days. Rest of Pakistan: 3 to 5 business days.']],
        ['@type' => 'Question', 'name' => 'What payment methods do you accept?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'COD, JazzCash, Easypaisa, and bank transfer.']],
        ['@type' => 'Question', 'name' => 'Can I cancel my order?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes, but only before dispatch. Contact us immediately after placing your order.']],
        ['@type' => 'Question', 'name' => 'What is your return policy?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => '7-day window from delivery. Item must be unused and in original packaging.']],
        ['@type' => 'Question', 'name' => 'Do you ship all across Pakistan?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes, we deliver nationwide through TCS.']],
    ],
];
@endphp
<x-layouts.storefront
    title="FAQ · Inkbloom Co."
    description="Got questions about shipping, returns, payments or products? Find all the answers here.">
    <x-slot:head>
        <script type="application/ld+json">{!! json_encode($faqSchema, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}</script>
    </x-slot:head>

{{-- Hero --}}
<section class="py-16 px-6 doodle-bg">
  <div class="max-w-3xl mx-auto text-center">
    <div class="text-5xl mb-4">🌸</div>
    <h1 class="font-display text-5xl">Got questions? We've got answers.</h1>
    <p class="mt-3 text-plum/70">And if you don't find what you're looking for, we're always just a message away.</p>
  </div>
</section>

{{-- FAQ Content --}}
<section class="py-16 px-6">
  <div class="max-w-3xl mx-auto space-y-10">

    {{-- Shipping --}}
    <div>
      <h2 class="font-display text-2xl mb-4 flex items-center gap-2"><span class="text-cherry">🚚</span> Shipping</h2>
      <div class="space-y-3">
        <details class="bg-white rounded-3xl border border-cloud p-5" open>
          <summary class="list-none cursor-pointer flex items-center justify-between font-semibold">How much does shipping cost?<span class="w-7 h-7 rounded-full bg-butter flex items-center justify-center font-bold text-sm">+</span></summary>
          <p class="mt-3 text-plum/70 text-sm">Flat Rs 200 nationwide. No surprises at checkout.</p>
        </details>
        <details class="bg-white rounded-3xl border border-cloud p-5">
          <summary class="list-none cursor-pointer flex items-center justify-between font-semibold">How long will my order take to arrive?<span class="w-7 h-7 rounded-full bg-butter flex items-center justify-center font-bold text-sm">+</span></summary>
          <p class="mt-3 text-plum/70 text-sm">Karachi, Lahore, Islamabad: 2 to 3 business days. Rest of Pakistan: 3 to 5 business days.</p>
        </details>
        <details class="bg-white rounded-3xl border border-cloud p-5">
          <summary class="list-none cursor-pointer flex items-center justify-between font-semibold">Do you ship all across Pakistan?<span class="w-7 h-7 rounded-full bg-butter flex items-center justify-center font-bold text-sm">+</span></summary>
          <p class="mt-3 text-plum/70 text-sm">Yes, we deliver nationwide through TCS.</p>
        </details>
        <details class="bg-white rounded-3xl border border-cloud p-5">
          <summary class="list-none cursor-pointer flex items-center justify-between font-semibold">Which courier do you use?<span class="w-7 h-7 rounded-full bg-butter flex items-center justify-center font-bold text-sm">+</span></summary>
          <p class="mt-3 text-plum/70 text-sm">TCS. Your tracking number is sent via email once your order is dispatched.</p>
        </details>
        <details class="bg-white rounded-3xl border border-cloud p-5">
          <summary class="list-none cursor-pointer flex items-center justify-between font-semibold">How do I track my order?<span class="w-7 h-7 rounded-full bg-butter flex items-center justify-center font-bold text-sm">+</span></summary>
          <p class="mt-3 text-plum/70 text-sm">Go to <a href="{{ url('/track-order') }}" class="text-cherry underline">/track-order</a> and enter your TCS tracking number. Easy.</p>
        </details>
      </div>
    </div>

    {{-- Payments & Orders --}}
    <div>
      <h2 class="font-display text-2xl mb-4 flex items-center gap-2"><span class="text-cherry">💳</span> Payments & Orders</h2>
      <div class="space-y-3">
        <details class="bg-white rounded-3xl border border-cloud p-5">
          <summary class="list-none cursor-pointer flex items-center justify-between font-semibold">What payment methods do you accept?<span class="w-7 h-7 rounded-full bg-butter flex items-center justify-center font-bold text-sm">+</span></summary>
          <p class="mt-3 text-plum/70 text-sm">COD (Cash on Delivery), JazzCash, Easypaisa, and bank transfer. We've got you covered.</p>
        </details>
        <details class="bg-white rounded-3xl border border-cloud p-5">
          <summary class="list-none cursor-pointer flex items-center justify-between font-semibold">Is there a minimum order amount?<span class="w-7 h-7 rounded-full bg-butter flex items-center justify-center font-bold text-sm">+</span></summary>
          <p class="mt-3 text-plum/70 text-sm">Yes, Rs 500 minimum. Shouldn't be hard to hit, honestly.</p>
        </details>
        <details class="bg-white rounded-3xl border border-cloud p-5">
          <summary class="list-none cursor-pointer flex items-center justify-between font-semibold">Can I cancel my order?<span class="w-7 h-7 rounded-full bg-butter flex items-center justify-center font-bold text-sm">+</span></summary>
          <p class="mt-3 text-plum/70 text-sm">Yes, but only before dispatch. Contact us immediately. Once shipped, cancellation isn't possible (emergencies: reach out and we'll try to help).</p>
        </details>
        <details class="bg-white rounded-3xl border border-cloud p-5">
          <summary class="list-none cursor-pointer flex items-center justify-between font-semibold">Can I change my order after placing it?<span class="w-7 h-7 rounded-full bg-butter flex items-center justify-center font-bold text-sm">+</span></summary>
          <p class="mt-3 text-plum/70 text-sm">Only before dispatch. Contact us quickly and we'll do our best.</p>
        </details>
        <details class="bg-white rounded-3xl border border-cloud p-5">
          <summary class="list-none cursor-pointer flex items-center justify-between font-semibold">Do you offer gift wrapping?<span class="w-7 h-7 rounded-full bg-butter flex items-center justify-center font-bold text-sm">+</span></summary>
          <p class="mt-3 text-plum/70 text-sm">Yes! There's a gift wrapping checkbox on the order summary page at checkout. It's a lovely touch.</p>
        </details>
      </div>
    </div>

    {{-- Returns --}}
    <div>
      <h2 class="font-display text-2xl mb-4 flex items-center gap-2"><span class="text-cherry">↩️</span> Returns & Refunds</h2>
      <div class="space-y-3">
        <details class="bg-white rounded-3xl border border-cloud p-5">
          <summary class="list-none cursor-pointer flex items-center justify-between font-semibold">What is your return policy?<span class="w-7 h-7 rounded-full bg-butter flex items-center justify-center font-bold text-sm">+</span></summary>
          <p class="mt-3 text-plum/70 text-sm">7-day window from delivery. Item must be unused and in original packaging. Full details on the <a href="{{ url('/shipping-returns') }}" class="text-cherry underline">Shipping & Returns page</a>.</p>
        </details>
        <details class="bg-white rounded-3xl border border-cloud p-5">
          <summary class="list-none cursor-pointer flex items-center justify-between font-semibold">How do I return an item?<span class="w-7 h-7 rounded-full bg-butter flex items-center justify-center font-bold text-sm">+</span></summary>
          <p class="mt-3 text-plum/70 text-sm">Contact us within 7 days and we'll guide you through it. Return shipping is at the customer's cost, unless the item is defective or we sent the wrong thing.</p>
        </details>
        <details class="bg-white rounded-3xl border border-cloud p-5">
          <summary class="list-none cursor-pointer flex items-center justify-between font-semibold">When will I get my refund?<span class="w-7 h-7 rounded-full bg-butter flex items-center justify-center font-bold text-sm">+</span></summary>
          <p class="mt-3 text-plum/70 text-sm">3 to 5 business days after we receive the item back.</p>
        </details>
        <details class="bg-white rounded-3xl border border-cloud p-5">
          <summary class="list-none cursor-pointer flex items-center justify-between font-semibold">Are there items I can't return?<span class="w-7 h-7 rounded-full bg-butter flex items-center justify-center font-bold text-sm">+</span></summary>
          <p class="mt-3 text-plum/70 text-sm">Sale items, opened sticker packs, and custom bundles are exchange-only, no returns.</p>
        </details>
      </div>
    </div>

    {{-- Products --}}
    <div>
      <h2 class="font-display text-2xl mb-4 flex items-center gap-2"><span class="text-cherry">🛍️</span> Products</h2>
      <div class="space-y-3">
        <details class="bg-white rounded-3xl border border-cloud p-5">
          <summary class="list-none cursor-pointer flex items-center justify-between font-semibold">What if a product I want is out of stock?<span class="w-7 h-7 rounded-full bg-butter flex items-center justify-center font-bold text-sm">+</span></summary>
          <p class="mt-3 text-plum/70 text-sm">Hit "Notify Me" on the product page and we'll email you the second it's back.</p>
        </details>
        <details class="bg-white rounded-3xl border border-cloud p-5">
          <summary class="list-none cursor-pointer flex items-center justify-between font-semibold">Do you offer bulk or wholesale orders?<span class="w-7 h-7 rounded-full bg-butter flex items-center justify-center font-bold text-sm">+</span></summary>
          <p class="mt-3 text-plum/70 text-sm">Yes! Contact us via WhatsApp or Instagram DM to discuss quantities and pricing.</p>
        </details>
      </div>
    </div>

    {{-- General --}}
    <div>
      <h2 class="font-display text-2xl mb-4 flex items-center gap-2"><span class="text-cherry">💬</span> General</h2>
      <div class="space-y-3">
        <details class="bg-white rounded-3xl border border-cloud p-5">
          <summary class="list-none cursor-pointer flex items-center justify-between font-semibold">Do I need an account to order?<span class="w-7 h-7 rounded-full bg-butter flex items-center justify-center font-bold text-sm">+</span></summary>
          <p class="mt-3 text-plum/70 text-sm">Guest checkout is available! An account is recommended if you'd like to track orders easily.</p>
        </details>
        <details class="bg-white rounded-3xl border border-cloud p-5">
          <summary class="list-none cursor-pointer flex items-center justify-between font-semibold">How do I get in touch?<span class="w-7 h-7 rounded-full bg-butter flex items-center justify-center font-bold text-sm">+</span></summary>
          <p class="mt-3 text-plum/70 text-sm">Contact page, WhatsApp, or Instagram DM. We reply within 24 hours on business days.</p>
        </details>
      </div>
    </div>

  </div>
</section>

{{-- Still stuck CTA --}}
<section class="py-16 px-6">
  <div class="max-w-xl mx-auto bg-butter rounded-4xl p-10 text-center border-2 border-plum/10">
    <div class="text-4xl mb-4">🌸</div>
    <h2 class="font-display text-3xl mb-3">Still stuck?</h2>
    <p class="text-plum/70 mb-6">We're just a message away. No bots, no auto-replies, just a real person who genuinely wants to help.</p>
    <a href="{{ url('/contact') }}" class="btn-pop inline-flex">Get in touch →</a>
  </div>
</section>

</x-layouts.storefront>
