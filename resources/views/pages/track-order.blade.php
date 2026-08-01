<x-layouts.storefront title="Track Your Order · Inkbloom Co.">

<section class="py-20 px-6 doodle-bg">
  <div class="max-w-xl mx-auto text-center">
    <div class="text-5xl mb-4">📦</div>
    <p class="hand text-2xl text-cherry mb-2">where's my stuff?</p>
    <h1 class="font-display text-4xl mb-3">Track Your Order</h1>
    <p class="text-plum/70 mb-8">Enter your TCS tracking number below and we'll show you exactly where your order is.</p>

    <div class="bg-white rounded-4xl border border-cloud p-8 text-left">
      <label class="field-label">TCS Tracking Number</label>
      <input type="text" class="field-input mb-4" placeholder="e.g. 123456789">
      <button class="btn-pop w-full justify-center">Track my order 🚚</button>
      <p class="text-xs text-fog text-center mt-4">Your tracking number is in your dispatch confirmation email.</p>
    </div>

    <div class="mt-8 text-sm text-fog">
      <p>Can't find your tracking number? <a href="{{ url('/contact') }}" class="text-cherry underline">Contact us</a> and we'll look it up for you.</p>
    </div>
  </div>
</section>

</x-layouts.storefront>
