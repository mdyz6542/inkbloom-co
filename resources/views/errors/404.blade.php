<x-layouts.storefront title="Page Not Found · Inkbloom Co.">

<section class="min-h-[70vh] flex flex-col items-center justify-center text-center px-6 py-20">

  {{-- Bloomie looking confused --}}
  <div class="relative inline-block mb-8">
    <svg viewBox="0 0 200 200" class="w-44 h-44 float" xmlns="http://www.w3.org/2000/svg">
      <g transform="translate(100,110)">
        <rect x="-4" y="38" width="8" height="42" rx="4" fill="#D4E9D0"/>
        <ellipse cx="0" cy="-36" rx="20" ry="28" fill="#FFD4DE"/>
        <ellipse cx="-32" cy="-12" rx="20" ry="28" fill="#E4D6FF" transform="rotate(-60 -32 -12)"/>
        <ellipse cx="32" cy="-12" rx="20" ry="28" fill="#FFD4DE" transform="rotate(60 32 -12)"/>
        <ellipse cx="-24" cy="28" rx="20" ry="28" fill="#E4D6FF" transform="rotate(-130 -24 28)"/>
        <ellipse cx="24" cy="28" rx="20" ry="28" fill="#FFD4DE" transform="rotate(130 24 28)"/>
        <circle cx="0" cy="0" r="28" fill="#FFF2C4"/>
        <circle cx="-13" cy="5" r="4.5" fill="#FF4D6D" opacity="0.45"/>
        <circle cx="13" cy="5" r="4.5" fill="#FF4D6D" opacity="0.45"/>
        {{-- Confused eyes --}}
        <path d="M -8,-6 L -4,-3 M -4,-6 L -8,-3" stroke="#3D2B4F" stroke-width="2" stroke-linecap="round"/>
        <path d="M 4,-6 L 8,-3 M 8,-6 L 4,-3" stroke="#3D2B4F" stroke-width="2" stroke-linecap="round"/>
        {{-- Wavy mouth --}}
        <path d="M -7,8 Q -3,5 0,8 Q 3,11 7,8" stroke="#3D2B4F" stroke-width="2" fill="none" stroke-linecap="round"/>
      </g>
      <text x="155" y="40" font-size="20" text-anchor="middle">❓</text>
      <text x="28" y="35" font-size="16" text-anchor="middle">✨</text>
    </svg>
    <div class="absolute -top-2 -right-2 bg-cherry text-white rounded-2xl px-3 py-1 text-sm font-bold rotate-6">404</div>
  </div>

  <p class="hand text-2xl text-cherry mb-2">uh oh</p>
  <h1 class="font-display text-4xl md:text-5xl mb-3">This page went out for coffee.</h1>
  <p class="text-plum/60 max-w-md mb-8">It didn't leave a note. Let's get you back somewhere lovely.</p>

  <div class="flex flex-wrap gap-4 justify-center">
    <a href="{{ url('/shop') }}" class="btn-pop">Browse the shop →</a>
    <a href="{{ url('/') }}" class="btn-ghost">Go home</a>
  </div>

  {{-- Suggestions --}}
  <div class="mt-16 grid grid-cols-2 md:grid-cols-4 gap-4 max-w-2xl w-full">
    <a href="{{ url('/new-arrivals') }}" class="bg-white rounded-2xl border border-cloud p-4 text-center text-sm hover:shadow-gummy transition-shadow">
      <div class="text-2xl mb-1">✨</div><div class="font-semibold">New Arrivals</div>
    </a>
    <a href="{{ url('/best-sellers') }}" class="bg-white rounded-2xl border border-cloud p-4 text-center text-sm hover:shadow-gummy transition-shadow">
      <div class="text-2xl mb-1">🏆</div><div class="font-semibold">Best Sellers</div>
    </a>
    <a href="{{ url('/blog') }}" class="bg-white rounded-2xl border border-cloud p-4 text-center text-sm hover:shadow-gummy transition-shadow">
      <div class="text-2xl mb-1">📖</div><div class="font-semibold">Blog</div>
    </a>
    <a href="{{ url('/contact') }}" class="bg-white rounded-2xl border border-cloud p-4 text-center text-sm hover:shadow-gummy transition-shadow">
      <div class="text-2xl mb-1">💌</div><div class="font-semibold">Contact</div>
    </a>
  </div>

</section>

</x-layouts.storefront>
