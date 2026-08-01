<x-layouts.storefront title="Testimonials · Inkbloom Co.">

{{-- Hero --}}
<section class="py-16 px-6" style="background: linear-gradient(135deg,#FFD4DE 0%,#E4D6FF 100%);">
  <div class="max-w-3xl mx-auto text-center">
    <p class="hand text-2xl text-cherry mb-2">real people, real love</p>
    <h1 class="font-display text-5xl">What everyone's saying 🌸</h1>
    <p class="mt-3 text-plum/70">Every review is a little love letter. We read them all.</p>
  </div>
</section>

{{-- Stats --}}
<section class="py-10 px-6 bg-white border-b border-cloud">
  <div class="max-w-4xl mx-auto grid grid-cols-3 gap-6 text-center">
    <div>
      <div class="font-display text-4xl text-cherry">4.9</div>
      <div class="star text-lg mt-1">★★★★★</div>
      <div class="text-fog text-xs mt-1">average rating</div>
    </div>
    <div>
      <div class="font-display text-4xl text-cherry">{{ $testimonials->count() }}+</div>
      <div class="text-fog text-sm mt-2">happy customers</div>
      <div class="text-fog text-xs">and counting</div>
    </div>
    <div>
      <div class="font-display text-4xl text-cherry">100%</div>
      <div class="text-fog text-sm mt-2">would recommend</div>
      <div class="text-fog text-xs">to a friend</div>
    </div>
  </div>
</section>

{{-- Featured quote --}}
@php $featured = $testimonials->where('is_featured', true)->first(); @endphp
@if($featured)
<section class="py-16 px-6">
  <div class="max-w-3xl mx-auto bg-butter rounded-4xl p-10 text-center border-2 border-plum/10">
    <div class="star text-2xl mb-5">★★★★★</div>
    <blockquote class="font-display text-2xl leading-snug">"{{ $featured->text }}"</blockquote>
    <div class="mt-6 flex items-center justify-center gap-3">
      <div class="w-10 h-10 rounded-full bg-blush flex items-center justify-center font-display font-bold text-cherry">{{ strtoupper(substr($featured->name, 0, 1)) }}</div>
      <div class="text-left">
        <div class="font-semibold text-sm">{{ $featured->name }}</div>
        <div class="text-fog text-xs">Verified buyer</div>
      </div>
    </div>
  </div>
</section>
@endif

{{-- Reviews Grid --}}
<section class="py-10 px-6">
  <div class="max-w-7xl mx-auto">
    <div class="text-center mb-10">
      <p class="hand text-xl text-cherry">from the community</p>
      <h2 class="font-display text-3xl">More love notes</h2>
    </div>

    @if($testimonials->isNotEmpty())
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5">
      @php $bgColors = ['#FFD4DE','#E4D6FF','#D4E9D0','#FFF2C4','#F4F0F6','#FFD4DE']; @endphp
      @foreach($testimonials as $i => $t)
      <div class="bg-white rounded-3xl border border-cloud p-6 flex flex-col gap-4">
        <div class="star text-base">{{ str_repeat('★', $t->rating ?? 5) }}</div>
        <p class="text-plum/80 text-sm leading-relaxed flex-1">"{{ $t->text }}"</p>
        <div class="flex items-center gap-3 mt-2">
          <div class="w-10 h-10 rounded-full flex items-center justify-center font-display font-bold text-sm shrink-0" style="background:{{ $bgColors[$i % 6] }};">{{ strtoupper(substr($t->name, 0, 1)) }}</div>
          <div>
            <div class="font-semibold text-sm">{{ $t->name }}</div>
            <div class="text-fog text-xs">Verified buyer</div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    @else
    <div class="text-center py-20">
      <div class="text-6xl mb-4">🌸</div>
      <h3 class="font-display text-2xl">Reviews coming soon</h3>
      <p class="text-fog mt-2">Be the first to share your experience!</p>
      <a href="{{ url('/shop') }}" class="btn-pop mt-6 inline-flex">Shop now →</a>
    </div>
    @endif
  </div>
</section>

{{-- CTA --}}
<section class="py-16 px-6 bg-cloud/50">
  <div class="max-w-xl mx-auto text-center">
    <p class="hand text-2xl text-cherry mb-2">join the bloom</p>
    <h2 class="font-display text-3xl mb-4">Ready to find your favourite thing?</h2>
    <p class="text-plum/70 mb-6">Everything you see here started with one order. Yours could be next.</p>
    <a href="{{ url('/shop') }}" class="btn-pop inline-flex">Shop now →</a>
  </div>
</section>

</x-layouts.storefront>
