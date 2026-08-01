<x-layouts.storefront title="Inkbloom Co. — Where ideas bloom.">

{{-- HERO --}}
<section class="relative doodle-bg overflow-hidden">
  <div class="max-w-7xl mx-auto px-6 pt-16 pb-20 grid md:grid-cols-2 gap-10 items-center relative">
    <svg class="absolute -top-4 left-[40%] w-8 h-8 opacity-70" viewBox="0 0 24 24" fill="none" stroke="#FF4D6D" stroke-width="2"><path d="M12 2l2.4 6.6L21 10l-5 4.6L17.6 22 12 18.3 6.4 22 8 14.6 3 10l6.6-1.4L12 2z"/></svg>
    <svg class="absolute top-24 right-10 w-6 h-6 opacity-60" viewBox="0 0 24 24" fill="#E4D6FF"><circle cx="12" cy="12" r="10"/></svg>

    <div class="relative z-10">
      <span class="chip mb-5"><span class="w-2 h-2 bg-cherry rounded-full"></span> New drop live · Pastel Pens</span>
      <h1 class="font-display text-5xl md:text-6xl leading-[1.05]">
        Stationery,<br>
        <span class="relative inline-block">
          softly reimagined.
          <svg class="absolute -bottom-2 left-0 w-full" height="10" viewBox="0 0 300 10" preserveAspectRatio="none"><path d="M2 6 Q 75 0, 150 6 T 298 6" stroke="#FF4D6D" stroke-width="3" fill="none" stroke-linecap="round"/></svg>
        </span>
      </h1>
      <p class="hand text-2xl text-fog mt-4">Paper. Petals. A little poetry.</p>
      <p class="text-base md:text-lg text-plum/80 mt-4 max-w-md">
        Aesthetic stationery for students, artists and dreamers across Pakistan.
        Made beautiful, kept affordable.
      </p>
      <div class="mt-8 flex flex-wrap gap-3">
        <a href="{{ url('/shop/cute-collection') }}" class="btn-pop">Shop the Cute Stuff 🌸</a>
        <a href="{{ url('/new-arrivals') }}" class="btn-ghost">Browse New Arrivals →</a>
      </div>
      <div class="mt-8 flex flex-wrap items-center gap-5 text-xs text-fog">
        <span class="flex items-center gap-1">⭐⭐⭐⭐⭐ <b class="text-plum">4.9</b> · 1,200+ happy customers</span>
        <span>·</span>
        <span>🚚 Ships nationwide · TCS</span>
      </div>
    </div>

    <div class="relative h-[460px] md:h-[520px]">
      <div class="absolute inset-4 bg-gradient-to-br from-blush via-lilac to-matcha rounded-5xl opacity-60 blur-sm"></div>
      <div class="absolute inset-6 bg-paper rounded-5xl border-2 border-plum/10 overflow-hidden shadow-soft">
        <svg viewBox="0 0 400 400" class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-[340px] h-[340px] float">
          <g transform="translate(200, 220)">
            <rect x="-5" y="60" width="10" height="50" rx="5" fill="#D4E9D0"/>
            <ellipse cx="-18" cy="90" rx="15" ry="7" fill="#D4E9D0" transform="rotate(-30 -18 90)"/>
            <ellipse cx="0" cy="-48" rx="26" ry="36" fill="#FFD4DE"/>
            <ellipse cx="-46" cy="-18" rx="26" ry="36" fill="#FFD4DE" transform="rotate(-60 -46 -18)"/>
            <ellipse cx="46" cy="-18" rx="26" ry="36" fill="#FFD4DE" transform="rotate(60 46 -18)"/>
            <ellipse cx="-34" cy="36" rx="26" ry="36" fill="#FFD4DE" transform="rotate(-130 -34 36)"/>
            <ellipse cx="34" cy="36" rx="26" ry="36" fill="#FFD4DE" transform="rotate(130 34 36)"/>
            <circle cx="0" cy="0" r="38" fill="#FFF2C4"/>
            <circle cx="-19" cy="7" r="6" fill="#FF4D6D" opacity="0.45"/>
            <circle cx="19" cy="7" r="6" fill="#FF4D6D" opacity="0.45"/>
            <circle cx="-9" cy="-6" r="3" fill="#3D2B4F"/>
            <circle cx="9" cy="-6" r="3" fill="#3D2B4F"/>
            <path d="M -8,6 Q 0,14 8,6" stroke="#3D2B4F" stroke-width="2.5" fill="none" stroke-linecap="round"/>
            <g transform="translate(55, -25) rotate(20)">
              <rect x="-4" y="-35" width="8" height="40" rx="4" fill="#3D2B4F"/>
              <circle cx="0" cy="-40" r="10" fill="#FFF2C4"/>
            </g>
          </g>
        </svg>
        <div class="absolute top-6 left-6 bg-white rounded-2xl p-3 shadow-soft flex items-center gap-2 rotate-[-6deg]"><div class="w-10 h-10 rounded-xl bg-lilac flex items-center justify-center text-xl">✏️</div><div><div class="text-[11px] text-fog">pastel pen set</div><div class="text-xs font-semibold">Rs 450</div></div></div>
        <div class="absolute top-10 right-6 bg-white rounded-2xl p-3 shadow-soft flex items-center gap-2 rotate-[5deg]"><div class="w-10 h-10 rounded-xl bg-matcha flex items-center justify-center text-xl">📒</div><div><div class="text-[11px] text-fog">dreamy journal</div><div class="text-xs font-semibold">Rs 690</div></div></div>
        <div class="absolute bottom-8 left-10 bg-white rounded-2xl p-3 shadow-soft flex items-center gap-2 rotate-[4deg]"><div class="w-10 h-10 rounded-xl bg-butter flex items-center justify-center text-xl">🌸</div><div><div class="text-[11px] text-fog">washi tape</div><div class="text-xs font-semibold">Rs 220</div></div></div>
        <div class="absolute bottom-10 right-8 bg-white rounded-2xl p-3 shadow-soft flex items-center gap-2 rotate-[-4deg]"><div class="w-10 h-10 rounded-xl bg-blush flex items-center justify-center text-xl">💗</div><div><div class="text-[11px] text-fog">sticker pack</div><div class="text-xs font-semibold">Rs 320</div></div></div>
        <div class="absolute top-16 right-16 bg-butter border-2 border-plum rounded-2xl px-3 py-1.5 rotate-3"><div class="text-xs font-display">psst: new drop!</div></div>
      </div>
    </div>
  </div>

  <div class="border-y border-cloud bg-white/60">
    <div class="max-w-7xl mx-auto px-6 py-4 flex flex-wrap gap-x-10 gap-y-2 justify-center items-center text-sm text-plum/80">
      <span>📦 <b>COD</b> available nationwide</span>
      <span>🚚 Ships in <b>24 hrs</b></span>
      <span>↩️ <b>7-day</b> easy returns</span>
      <span>💸 Flat <b>Rs 200</b> shipping</span>
      <span>🌸 Tiny <b>surprise</b> in every order</span>
    </div>
  </div>
</section>

{{-- FEATURED CATEGORIES --}}
<section class="py-20 px-6 reveal">
  <div class="max-w-7xl mx-auto">
    <div class="flex items-end justify-between mb-10 flex-wrap gap-3">
      <div>
        <p class="hand text-2xl text-cherry">shop by mood</p>
        <h2 class="font-display text-4xl md:text-5xl">Pick your aesthetic.</h2>
      </div>
      <a href="{{ url('/shop') }}" class="text-sm font-semibold hover:text-cherry underline underline-offset-4">See all categories →</a>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-5">
      {{-- Cute Collection hero tile --}}
      <a href="{{ url('/shop/cute-collection') }}" class="relative col-span-2 row-span-2 rounded-4xl overflow-hidden p-7 min-h-[320px] product-card" style="background: linear-gradient(135deg,#FFD4DE 0%,#E4D6FF 100%);">
        <span class="chip absolute top-5 right-5">🌸 Signature</span>
        <div class="absolute bottom-6 left-6 right-6">
          <h3 class="font-display text-3xl md:text-4xl">Cute Collection</h3>
          <p class="text-sm text-plum/80 mt-1 max-w-xs">The one that started it all. Kawaii stickers, character pens, aesthetic sets.</p>
          <div class="mt-4 inline-flex items-center gap-1 text-sm font-semibold text-cherry">Shop now →</div>
        </div>
      </a>
      @php
        $catColors = ['#D4E9D0','#FFF2C4','#E4D6FF','#FFD4DE','#F4F0F6','#FFFBF5'];
        $catEmojis = ['✏️','📒','🎨','🎒','🗂️','🎁'];
        $i = 0;
      @endphp
      @foreach($categories->reject(fn($c) => $c->slug === 'cute-collection')->take(6) as $cat)
      <a href="{{ route('category.show', $cat->slug) }}" class="rounded-4xl p-5 min-h-[150px] product-card relative" style="background:{{ $catColors[$i] ?? '#F4F0F6' }};">
        <div class="text-3xl">{{ $catEmojis[$i] ?? '📦' }}</div>
        <div class="absolute bottom-4 left-5 right-5">
          <h3 class="font-display text-xl">{{ $cat->name }}</h3>
          <p class="text-xs text-plum/70">{{ $cat->tagline ?? '' }}</p>
        </div>
      </a>
      @php $i++; @endphp
      @endforeach
    </div>
  </div>
</section>

{{-- NEW ARRIVALS --}}
@if($newArrivals->isNotEmpty())
<section class="py-20 px-6 bg-cloud/50">
  <div class="max-w-7xl mx-auto">
    <div class="flex items-end justify-between mb-10 flex-wrap gap-3">
      <div>
        <p class="hand text-2xl text-cherry">fresh off the press</p>
        <h2 class="font-display text-4xl md:text-5xl">New Arrivals</h2>
        <p class="text-sm text-fog mt-1">pieces that just bloomed in. Grab them before they're gone.</p>
      </div>
      <a href="{{ url('/new-arrivals') }}" class="text-sm font-semibold hover:text-cherry underline underline-offset-4">See all new →</a>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-5">
      @php $bgColors = ['#FFD4DE','#E4D6FF','#D4E9D0','#FFF2C4']; @endphp
      @foreach($newArrivals as $i => $product)
      <article class="bg-white rounded-3xl overflow-hidden product-card">
        <a href="{{ route('product.show', $product->slug) }}">
          <div class="aspect-square relative" style="background:{{ $bgColors[$i % 4] }};">
            <span class="absolute top-3 left-3 chip" style="background:#FF4D6D;color:white;border-color:#FF4D6D;">NEW</span>
            <div class="absolute inset-0 flex items-center justify-center text-6xl">🖋️</div>
          </div>
          <div class="p-4">
            <p class="text-xs text-fog">{{ $product->category->name ?? '' }}</p>
            <h3 class="font-display text-lg leading-tight">{{ $product->name }}</h3>
            <div class="flex items-center justify-between mt-2">
              <span class="font-semibold">Rs {{ number_format($product->price) }}</span>
              <span class="text-xs star">★★★★★</span>
            </div>
          </div>
        </a>
      </article>
      @endforeach
    </div>
  </div>
</section>
@endif

{{-- CUTE STUFF --}}
<section class="py-20 px-6 relative overflow-hidden" style="background: linear-gradient(180deg,#FFD4DE 0%,#FFFBF5 100%);">
  <div class="max-w-7xl mx-auto">
    <div class="flex items-end justify-between flex-wrap gap-4 mb-8">
      <div>
        <p class="hand text-2xl text-cherry">our favourite corner</p>
        <h2 class="font-display text-4xl md:text-5xl flex items-center gap-2">Shop the Cute Stuff <span>🌸</span></h2>
        <p class="text-sm text-plum/80 mt-2 max-w-lg">The heart of Inkbloom. Kawaii, dreamy, unreasonably pretty. The cutest one yet is probably already on its way.</p>
      </div>
      <div class="bloomie-tip -rotate-3"><div class="font-display">psst...</div><div class="text-xs">you'll want everything in here.</div></div>
    </div>

    @if($cutePicks->isNotEmpty())
    <div class="scroll-row flex gap-4 overflow-x-auto pb-4 snap-x">
      @php $cuteColors = ['#FFD4DE','#E4D6FF','#D4E9D0','#FFF2C4','#FFD4DE','#E4D6FF']; @endphp
      @foreach($cutePicks as $i => $product)
      <a href="{{ route('product.show', $product->slug) }}" class="snap-start shrink-0 w-64 bg-white rounded-3xl overflow-hidden product-card">
        <div class="aspect-square relative" style="background:{{ $cuteColors[$i % 6] }};">
          <div class="absolute inset-0 flex items-center justify-center text-7xl">💗</div>
          <span class="absolute top-3 left-3 chip">{{ $product->category->name ?? 'Cute' }}</span>
        </div>
        <div class="p-4 flex items-center justify-between">
          <span class="font-display">{{ $product->name }}</span>
          <span class="font-semibold text-sm">Rs {{ number_format($product->price) }}</span>
        </div>
      </a>
      @endforeach
    </div>
    @else
    {{-- Placeholder when no cute collection products yet --}}
    <div class="scroll-row flex gap-4 overflow-x-auto pb-4 snap-x">
      @foreach([['💗','Pink Dreams Set','Rs 380'],['🧸','Bear Bestie Pen','Rs 260'],['🍡','Mochi Eraser Trio','Rs 240'],['🌷','Tulip Field Tape','Rs 220'],['✨','Dreamy Desk Kit','Rs 1,450'],['🐰','Bunny Mood Memo','Rs 310']] as $j => $item)
      <a href="{{ url('/shop/cute-collection') }}" class="snap-start shrink-0 w-64 bg-white rounded-3xl overflow-hidden product-card">
        <div class="aspect-square relative" style="background:{{ ['#FFD4DE','#E4D6FF','#D4E9D0','#FFF2C4','#FFD4DE','#E4D6FF'][$j] }};">
          <div class="absolute inset-0 flex items-center justify-center text-7xl">{{ $item[0] }}</div>
        </div>
        <div class="p-4 flex items-center justify-between">
          <span class="font-display">{{ $item[1] }}</span>
          <span class="font-semibold text-sm">{{ $item[2] }}</span>
        </div>
      </a>
      @endforeach
    </div>
    @endif

    <div class="mt-8 flex items-center justify-between flex-wrap gap-3">
      <div class="chip bg-white">🏆 Cutest Pick This Week · rotates every Monday</div>
      <a href="{{ url('/shop/cute-collection') }}" class="btn-pop">Explore Cute Collection →</a>
    </div>
  </div>
</section>

{{-- ABOUT PREVIEW --}}
<section class="py-20 px-6 reveal">
  <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-10 items-center">
    <div class="relative rounded-4xl overflow-hidden aspect-square dots-bg flex items-center justify-center">
      <svg viewBox="0 0 400 400" class="w-[300px] h-[300px]">
        <g transform="translate(200, 230)">
          <rect x="-5" y="60" width="10" height="50" rx="5" fill="#D4E9D0"/>
          <ellipse cx="0" cy="-48" rx="26" ry="36" fill="#FFD4DE"/>
          <ellipse cx="-46" cy="-18" rx="26" ry="36" fill="#FFD4DE" transform="rotate(-60 -46 -18)"/>
          <ellipse cx="46" cy="-18" rx="26" ry="36" fill="#FFD4DE" transform="rotate(60 46 -18)"/>
          <ellipse cx="-34" cy="36" rx="26" ry="36" fill="#FFD4DE" transform="rotate(-130 -34 36)"/>
          <ellipse cx="34" cy="36" rx="26" ry="36" fill="#FFD4DE" transform="rotate(130 34 36)"/>
          <circle cx="0" cy="0" r="38" fill="#FFF2C4"/>
          <circle cx="-19" cy="7" r="6" fill="#FF4D6D" opacity="0.45"/>
          <circle cx="19" cy="7" r="6" fill="#FF4D6D" opacity="0.45"/>
          <circle cx="-9" cy="-2" r="3" fill="#3D2B4F"/>
          <circle cx="9" cy="-2" r="3" fill="#3D2B4F"/>
          <path d="M -6,8 Q 0,12 6,8" stroke="#3D2B4F" stroke-width="2.5" fill="none" stroke-linecap="round"/>
        </g>
      </svg>
      <span class="absolute top-4 left-4 hand text-xl">meet your new favourite brand →</span>
    </div>
    <div>
      <p class="hand text-2xl text-cherry">how we began</p>
      <h2 class="font-display text-4xl md:text-5xl leading-tight">A little story about big dreams and pretty pens.</h2>
      <p class="mt-5 text-plum/80">Hi, I'm <b>Maddy</b>. I've been obsessed with stationery for as long as I can remember. Growing up with an art background, stationery was never just school supplies. It was joy wrapped in a gel pen, a whole mood sitting inside a pastel notebook.</p>
      <p class="mt-4 text-plum/80">But cute stationery in Pakistan? It was either hard to find or just… expensive. So I started asking: <i>why can't beautiful things be affordable?</i> That question became Inkbloom Co.</p>
      <a href="{{ url('/about') }}" class="btn-ghost mt-6 inline-flex">Read our story →</a>
    </div>
  </div>
</section>

{{-- BEST SELLERS --}}
@if($bestSellers->isNotEmpty())
<section class="py-20 px-6 bg-butter/40">
  <div class="max-w-7xl mx-auto">
    <div class="flex items-end justify-between mb-10 flex-wrap gap-3">
      <div>
        <p class="hand text-2xl text-cherry">tried, tested, obsessed over</p>
        <h2 class="font-display text-4xl md:text-5xl">Best Sellers</h2>
      </div>
      <a href="{{ url('/best-sellers') }}" class="text-sm font-semibold hover:text-cherry underline underline-offset-4">See all best sellers →</a>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-5">
      @php $bgColors = ['#FFD4DE','#D4E9D0','#E4D6FF','#FFF2C4']; @endphp
      @foreach($bestSellers as $i => $product)
      <article class="bg-white rounded-3xl overflow-hidden product-card">
        <a href="{{ route('product.show', $product->slug) }}">
          <div class="aspect-square relative" style="background:{{ $bgColors[$i % 4] }};">
            <span class="absolute top-3 left-3 chip" style="background:#FFF2C4;">🏆 #{{ $i + 1 }}</span>
            <div class="absolute inset-0 flex items-center justify-center text-6xl">🖊️</div>
          </div>
          <div class="p-4">
            <p class="text-xs text-fog">{{ $product->category->name ?? '' }}</p>
            <h3 class="font-display text-lg leading-tight">{{ $product->name }}</h3>
            <div class="flex items-center justify-between mt-2">
              <span class="font-semibold">
                Rs {{ number_format($product->sale_price ?? $product->price) }}
                @if($product->sale_price)
                  <span class="text-fog line-through text-xs font-normal">Rs {{ number_format($product->price) }}</span>
                @endif
              </span>
              <span class="text-xs star">★★★★★</span>
            </div>
          </div>
        </a>
      </article>
      @endforeach
    </div>
  </div>
</section>
@endif

{{-- BLOG --}}
@if($blogPosts->isNotEmpty())
<section class="py-20 px-6 reveal">
  <div class="max-w-7xl mx-auto">
    <div class="flex items-end justify-between mb-10 flex-wrap gap-3">
      <div>
        <p class="hand text-2xl text-cherry">from the journal</p>
        <h2 class="font-display text-4xl md:text-5xl">Blog</h2>
        <p class="text-sm text-fog mt-1">soft reads for stationery lovers: gift guides, study vibes, desk setups.</p>
      </div>
      <a href="{{ url('/blog') }}" class="text-sm font-semibold hover:text-cherry underline underline-offset-4">See all posts →</a>
    </div>
    <div class="grid md:grid-cols-3 gap-6">
      @php $blogBgs = ['linear-gradient(135deg,#FFD4DE,#E4D6FF)','linear-gradient(135deg,#D4E9D0,#FFF2C4)','linear-gradient(135deg,#FFF2C4,#FFD4DE)']; @endphp
      @foreach($blogPosts as $i => $post)
      <a href="{{ url('/blog/'.$post->slug) }}" class="rounded-4xl overflow-hidden border border-cloud bg-white product-card">
        <div class="aspect-[4/3] relative" style="background: {{ $blogBgs[$i % 3] }};">
          @if($post->image)
            <img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
          @endif
          <span class="absolute bottom-3 left-3 chip">{{ $post->category->name ?? 'Blog' }}</span>
        </div>
        <div class="p-5">
          <p class="text-xs text-fog">{{ $post->published_at?->format('M d, Y') }} · {{ ceil(str_word_count($post->content ?? '') / 200) }} min read</p>
          <h3 class="font-display text-xl mt-1 leading-tight">{{ $post->title }}</h3>
          <p class="text-sm text-plum/70 mt-2">{{ $post->excerpt ?? \Illuminate\Support\Str::limit(strip_tags($post->content ?? ''), 100) }}</p>
        </div>
      </a>
      @endforeach
    </div>
  </div>
</section>
@endif

{{-- TESTIMONIALS --}}
<section class="py-20 px-6 bg-lilac/40">
  <div class="max-w-7xl mx-auto">
    <div class="text-center mb-12">
      <p class="hand text-2xl text-cherry">the nicest words</p>
      <h2 class="font-display text-4xl md:text-5xl">Loved by dreamers across Pakistan.</h2>
      <div class="mt-3 flex items-center justify-center gap-2 text-sm text-plum/80"><span class="star text-lg">★★★★★</span> 4.9 average · 1,200+ reviews</div>
    </div>
    @if($testimonials->isNotEmpty())
    <div class="grid md:grid-cols-3 gap-6">
      @php $avatarBgs = ['#FFD4DE','#D4E9D0','#E4D6FF']; @endphp
      @foreach($testimonials as $i => $testimonial)
      <figure class="bg-white rounded-3xl p-6 shadow-soft">
        <div class="star text-lg">{{ str_repeat('★', $testimonial->rating) }}{{ str_repeat('☆', 5 - $testimonial->rating) }}</div>
        <blockquote class="mt-3">"{{ $testimonial->text }}"</blockquote>
        <figcaption class="mt-4 flex items-center gap-3">
          <div class="w-10 h-10 rounded-full flex items-center justify-center font-display" style="background:{{ $avatarBgs[$i % 3] }};">{{ strtoupper(substr($testimonial->name, 0, 1)) }}</div>
          <div>
            <div class="font-semibold text-sm">{{ $testimonial->name }}</div>
            <div class="text-xs text-fog">verified buyer</div>
          </div>
        </figcaption>
      </figure>
      @endforeach
    </div>
    @else
    <div class="grid md:grid-cols-3 gap-6">
      <figure class="bg-white rounded-3xl p-6 shadow-soft"><div class="star text-lg">★★★★★</div><blockquote class="mt-3">"The packaging alone made my day — there was literally a tiny flower tucked inside. And the pens? Smooth, pretty, absolutely worth it."</blockquote><figcaption class="mt-4 flex items-center gap-3"><div class="w-10 h-10 rounded-full bg-blush flex items-center justify-center font-display">A</div><div><div class="font-semibold text-sm">Aiman F.</div><div class="text-xs text-fog">Lahore · verified buyer</div></div></figcaption></figure>
      <figure class="bg-white rounded-3xl p-6 shadow-soft"><div class="star text-lg">★★★★★</div><blockquote class="mt-3">"I finally found aesthetic stationery in Pakistan that isn't ridiculously priced. The washi tape set is so pretty I keep rewrapping gifts."</blockquote><figcaption class="mt-4 flex items-center gap-3"><div class="w-10 h-10 rounded-full bg-matcha flex items-center justify-center font-display">Z</div><div><div class="font-semibold text-sm">Zara K.</div><div class="text-xs text-fog">Karachi · verified buyer</div></div></figcaption></figure>
      <figure class="bg-white rounded-3xl p-6 shadow-soft"><div class="star text-lg">★★★★★</div><blockquote class="mt-3">"Ordered the back-to-school bundle for my little sister and she screamed. Shipped fast, looked even better in person. Will buy again forever."</blockquote><figcaption class="mt-4 flex items-center gap-3"><div class="w-10 h-10 rounded-full bg-lilac flex items-center justify-center font-display">H</div><div><div class="font-semibold text-sm">Hira M.</div><div class="text-xs text-fog">Islamabad · verified buyer</div></div></figcaption></figure>
    </div>
    @endif
    <div class="text-center mt-10"><a href="{{ url('/testimonials') }}" class="text-sm font-semibold hover:text-cherry underline underline-offset-4">See all reviews →</a></div>
  </div>
</section>

{{-- FAQ --}}
<section class="py-20 px-6 reveal">
  <div class="max-w-4xl mx-auto">
    <div class="text-center mb-12">
      <p class="hand text-2xl text-cherry">quick answers</p>
      <h2 class="font-display text-4xl md:text-5xl">Got questions? We've got answers. 🌸</h2>
    </div>
    <div class="space-y-3">
      <details class="group bg-white rounded-3xl border border-cloud p-5 open:shadow-soft" open>
        <summary class="list-none flex items-center justify-between cursor-pointer"><span class="font-display text-lg">How much does shipping cost?</span><span class="w-8 h-8 rounded-full bg-butter flex items-center justify-center font-bold group-open:rotate-45 transition-transform">+</span></summary>
        <p class="mt-3 text-sm text-plum/80">Flat Rs 200 nationwide. No surprises at checkout.</p>
      </details>
      <details class="group bg-white rounded-3xl border border-cloud p-5">
        <summary class="list-none flex items-center justify-between cursor-pointer"><span class="font-display text-lg">Can I cancel my order?</span><span class="w-8 h-8 rounded-full bg-butter flex items-center justify-center font-bold group-open:rotate-45 transition-transform">+</span></summary>
        <p class="mt-3 text-sm text-plum/80">Yes, before dispatch. Contact us immediately. Once shipped, cancellation isn't possible.</p>
      </details>
      <details class="group bg-white rounded-3xl border border-cloud p-5">
        <summary class="list-none flex items-center justify-between cursor-pointer"><span class="font-display text-lg">What is your return policy?</span><span class="w-8 h-8 rounded-full bg-butter flex items-center justify-center font-bold group-open:rotate-45 transition-transform">+</span></summary>
        <p class="mt-3 text-sm text-plum/80">7-day window from delivery, unused item in original packaging.</p>
      </details>
    </div>
    <div class="text-center mt-8"><a href="{{ url('/faq') }}" class="text-sm font-semibold hover:text-cherry underline underline-offset-4">Read all FAQs →</a></div>
  </div>
</section>

{{-- NEWSLETTER --}}
<section class="py-20 px-6 reveal">
  <div class="max-w-5xl mx-auto rounded-5xl p-10 md:p-14 relative overflow-hidden" style="background: linear-gradient(135deg,#FFD4DE 0%,#E4D6FF 50%,#D4E9D0 100%);">
    <div class="grid md:grid-cols-2 gap-8 items-center relative">
      <div>
        <p class="hand text-2xl text-cherry">letters worth opening</p>
        <h2 class="font-display text-3xl md:text-4xl leading-tight">New drops. Soft deals. Zero spam.</h2>
        <p class="mt-3 text-plum/80 max-w-sm">Join the inner bloom. Plus 10% off your first order, just for being here.</p>
      </div>
      <div x-data="{ sent: false, email: '', loading: false }">
        <div x-show="sent" class="bg-white rounded-3xl p-5 text-center font-semibold text-cherry">You're in! 🌸</div>
        <form x-show="!sent" class="bg-white rounded-3xl p-3 flex flex-col sm:flex-row gap-2 shadow-soft"
          @submit.prevent="
            loading = true;
            fetch('{{ route('newsletter.subscribe') }}', {
              method: 'POST',
              headers: { 'Content-Type': 'application/json', 'Accept': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
              body: JSON.stringify({ email })
            }).then(r => r.json()).then(() => { sent = true; loading = false; }).catch(() => { loading = false; })
          ">
          <input type="email" x-model="email" placeholder="your@email.com" class="flex-1 px-5 py-3 rounded-2xl bg-paper focus:outline-none focus:ring-2 focus:ring-cherry/30 text-sm" required />
          <button type="submit" class="btn-pop justify-center" :disabled="loading" x-text="loading ? 'Joining…' : 'Bloom with us 🌸'"></button>
        </form>
      </div>
    </div>
  </div>
</section>

</x-layouts.storefront>
