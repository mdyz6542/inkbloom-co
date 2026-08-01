<x-layouts.storefront title="Contact Us · Inkbloom Co." description="Get in touch with Inkbloom Co. via WhatsApp, Instagram or email. We reply within 24 hours on business days.">

{{-- Hero --}}
<section class="py-16 px-6 doodle-bg">
  <div class="max-w-3xl mx-auto text-center">
    <p class="hand text-2xl text-cherry mb-2">say hello</p>
    <h1 class="font-display text-5xl">We'd love to hear from you.</h1>
    <p class="mt-3 text-plum/70">Questions, feedback, wholesale inquiries, or just want to share your stationery haul? We're here for all of it.</p>
  </div>
</section>

{{-- Quick Channels --}}
<section class="py-10 px-6">
  <div class="max-w-4xl mx-auto grid md:grid-cols-3 gap-5">
    <a href="#" class="bg-white rounded-3xl border border-cloud p-6 text-center hover:shadow-gummy transition-shadow group">
      <div class="w-14 h-14 rounded-2xl flex items-center justify-center mx-auto mb-4 text-2xl" style="background:#25D366;">💬</div>
      <h3 class="font-display text-lg mb-1">WhatsApp</h3>
      <p class="text-fog text-sm">Fastest response. Business hours only.</p>
      <p class="mt-3 text-cherry text-sm font-semibold group-hover:underline">Chat now →</p>
    </a>
    <a href="https://instagram.com/inkbloomco" target="_blank" class="bg-white rounded-3xl border border-cloud p-6 text-center hover:shadow-gummy transition-shadow group">
      <div class="w-14 h-14 rounded-2xl flex items-center justify-center mx-auto mb-4 text-2xl" style="background: linear-gradient(135deg,#f09433,#e6683c,#dc2743,#cc2366,#bc1888);">📸</div>
      <h3 class="font-display text-lg mb-1">Instagram</h3>
      <p class="text-fog text-sm">DMs open. We love seeing your hauls.</p>
      <p class="mt-3 text-cherry text-sm font-semibold group-hover:underline">@inkbloomco →</p>
    </a>
    <a href="mailto:hello@inkbloom.co" class="bg-white rounded-3xl border border-cloud p-6 text-center hover:shadow-gummy transition-shadow group">
      <div class="w-14 h-14 rounded-2xl bg-blush flex items-center justify-center mx-auto mb-4 text-2xl">✉️</div>
      <h3 class="font-display text-lg mb-1">Email</h3>
      <p class="text-fog text-sm">hello@inkbloom.co — reply within 24hrs.</p>
      <p class="mt-3 text-cherry text-sm font-semibold group-hover:underline">Send an email →</p>
    </a>
  </div>
</section>

{{-- Contact Form + Info --}}
<section class="py-10 px-6">
  <div class="max-w-4xl mx-auto grid md:grid-cols-[1fr_300px] gap-8">

    {{-- Form --}}
    <div class="bg-white rounded-3xl border border-cloud p-8">
      <h2 class="font-display text-2xl mb-6">Send us a message</h2>
      <form class="space-y-5">
        <div class="grid md:grid-cols-2 gap-4">
          <div>
            <label class="field-label">Your name</label>
            <input type="text" class="field-input" placeholder="Maddy">
          </div>
          <div>
            <label class="field-label">Email address</label>
            <input type="email" class="field-input" placeholder="you@example.com">
          </div>
        </div>
        <div>
          <label class="field-label">Subject</label>
          <select class="field-input">
            <option value="">Select a topic</option>
            <option>Order inquiry</option>
            <option>Return / exchange</option>
            <option>Product question</option>
            <option>Wholesale / bulk</option>
            <option>Collaboration</option>
            <option>Something else</option>
          </select>
        </div>
        <div>
          <label class="field-label">Your message</label>
          <textarea class="field-input" rows="5" placeholder="Tell us everything..."></textarea>
        </div>
        <button type="submit" class="btn-pop w-full justify-center">Send message 🌸</button>
      </form>
    </div>

    {{-- Info sidebar --}}
    <div class="space-y-5">
      <div class="bg-white rounded-3xl border border-cloud p-6">
        <h3 class="font-display text-lg mb-4">Business hours</h3>
        <div class="space-y-2 text-sm text-plum/70">
          <div class="flex justify-between"><span>Monday – Friday</span><span class="font-semibold text-plum">10am – 6pm</span></div>
          <div class="flex justify-between"><span>Saturday</span><span class="font-semibold text-plum">11am – 4pm</span></div>
          <div class="flex justify-between"><span>Sunday</span><span class="text-fog">Closed</span></div>
        </div>
        <p class="mt-4 text-xs text-fog">We reply within 24 hours on business days. Messages sent over the weekend are answered first thing Monday.</p>
      </div>

      <div class="bg-white rounded-3xl border border-cloud p-6">
        <h3 class="font-display text-lg mb-3">Based in</h3>
        <p class="text-sm text-plum/70">Lahore, Pakistan 🇵🇰</p>
        <p class="text-sm text-fog mt-1">Shipping nationwide via TCS.</p>
      </div>

      <div class="bg-butter rounded-3xl p-5 text-sm">
        <p class="font-semibold text-plum mb-1">Quick answer needed?</p>
        <p class="text-plum/70">Check our <a href="{{ url('/faq') }}" class="text-cherry underline font-semibold">FAQ page</a> first. Most questions have answers there already.</p>
      </div>
    </div>

  </div>
</section>

</x-layouts.storefront>
