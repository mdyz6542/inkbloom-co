<x-layouts.storefront title="{{ $post->meta_title ?? $post->title }} · Inkbloom Co.">

{{-- Breadcrumb --}}
<div class="max-w-3xl mx-auto px-6 pt-6">
  <div class="text-xs text-fog">
    <a href="{{ url('/') }}" class="hover:text-cherry">Home</a>
    <span class="crumb-sep">›</span>
    <a href="{{ url('/blog') }}" class="hover:text-cherry">Blog</a>
    @if($post->category)
    <span class="crumb-sep">›</span>
    <span>{{ $post->category->name }}</span>
    @endif
    <span class="crumb-sep">›</span>
    <span class="text-plum font-medium">{{ $post->title }}</span>
  </div>
</div>

{{-- Article Header --}}
<article class="max-w-3xl mx-auto px-6 py-10">
  @if($post->category)
    <span class="chip mb-4 inline-flex" style="background:#FFD4DE;border-color:#FFD4DE;">{{ $post->category->name }}</span>
  @endif
  <h1 class="font-display text-4xl md:text-5xl leading-tight">{{ $post->title }}</h1>
  @if($post->excerpt)
    <p class="mt-4 text-lg text-plum/70 leading-relaxed">{{ $post->excerpt }}</p>
  @endif
  <div class="mt-5 flex items-center gap-3 text-sm text-fog">
    <div class="w-8 h-8 rounded-full bg-blush flex items-center justify-center font-bold text-cherry text-xs">M</div>
    <span class="font-semibold text-plum">Maddy</span>
    <span>·</span>
    <span>{{ $post->published_at?->format('d M Y') ?? 'Recently' }}</span>
    <span>·</span>
    <span>5 min read</span>
  </div>

  {{-- Cover --}}
  <div class="mt-8 rounded-4xl overflow-hidden aspect-video relative" style="background: linear-gradient(135deg,#FFD4DE,#E4D6FF);">
    <div class="absolute inset-0 flex items-center justify-center text-9xl">📖</div>
  </div>

  {{-- Content --}}
  <div class="mt-10 prose prose-plum max-w-none text-plum/80 leading-relaxed space-y-5">
    @if($post->content)
      {!! nl2br(e($post->content)) !!}
    @else
      <p>This post is still being written. Check back soon!</p>
    @endif
  </div>

  {{-- Inline CTA --}}
  <div class="my-10 bg-butter rounded-3xl p-6 text-center border-2 border-plum/10">
    <p class="hand text-xl text-cherry mb-2">psst, while you're here</p>
    <p class="text-plum/70 text-sm mb-4">Everything mentioned in this post is available in the shop right now.</p>
    <a href="{{ url('/shop') }}" class="btn-pop inline-flex">Shop the collection →</a>
  </div>

  {{-- Author card --}}
  <div class="mt-10 bg-white rounded-3xl border border-cloud p-6 flex items-start gap-5">
    <div class="w-16 h-16 rounded-full bg-blush flex items-center justify-center font-display text-2xl text-cherry shrink-0">M</div>
    <div>
      <div class="font-display text-lg">Maddy</div>
      <div class="text-fog text-xs mb-2">Founder, Inkbloom Co.</div>
      <p class="text-sm text-plum/70 leading-relaxed">Art background, lifelong stationery obsessive. Building Inkbloom to make beautiful things affordable for everyone in Pakistan.</p>
    </div>
  </div>
</article>

{{-- Related Posts --}}
@if($related->isNotEmpty())
<section class="py-16 px-6 bg-cloud/50">
  <div class="max-w-7xl mx-auto">
    <div class="text-center mb-10">
      <p class="hand text-xl text-cherry">keep reading</p>
      <h2 class="font-display text-3xl">You might also like</h2>
    </div>
    <div class="grid md:grid-cols-3 gap-6">
      @php $bgColors = ['#FFD4DE','#E4D6FF','#D4E9D0']; @endphp
      @foreach($related as $i => $r)
      <article class="bg-white rounded-3xl overflow-hidden border border-cloud hover:shadow-gummy transition-shadow group">
        <a href="{{ route('blog.show', $r->slug) }}">
          <div class="aspect-video relative" style="background:{{ $bgColors[$i % 3] }};">
            <div class="absolute inset-0 flex items-center justify-center text-5xl">📝</div>
          </div>
          <div class="p-5">
            <h3 class="font-display text-lg leading-tight group-hover:text-cherry transition-colors">{{ $r->title }}</h3>
            <p class="text-fog text-xs mt-2">{{ $r->published_at?->format('d M Y') ?? 'Recently' }}</p>
          </div>
        </a>
      </article>
      @endforeach
    </div>
    <div class="text-center mt-8">
      <a href="{{ url('/blog') }}" class="btn-ghost inline-flex">All posts →</a>
    </div>
  </div>
</section>
@endif

</x-layouts.storefront>
