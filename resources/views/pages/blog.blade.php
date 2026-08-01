<x-layouts.storefront title="Blog · Inkbloom Co." description="Stationery tips, desk setup ideas, buying guides and more from the Inkbloom Co. blog. Written for students and aesthetic lovers across Pakistan.">

{{-- Hero --}}
<section class="py-16 px-6 doodle-bg">
  <div class="max-w-3xl mx-auto text-center">
    <p class="hand text-2xl text-cherry mb-2">stories, tips & pretty things</p>
    <h1 class="font-display text-5xl">The Inkbloom Blog</h1>
    <p class="mt-3 text-plum/70">Buying guides, desk aesthetics, study tips, and more.</p>
  </div>
</section>

{{-- Featured Post --}}
@if($featured)
<section class="py-10 px-6">
  <div class="max-w-7xl mx-auto">
    <a href="{{ route('blog.show', $featured->slug) }}" class="block bg-white rounded-4xl overflow-hidden border border-cloud hover:shadow-gummy transition-shadow group">
      <div class="grid md:grid-cols-2">
        <div class="aspect-video md:aspect-auto relative" style="background: linear-gradient(135deg,#FFD4DE,#E4D6FF); min-height:280px;">
          <div class="absolute inset-0 flex items-center justify-center text-8xl">📖</div>
          <span class="absolute top-4 left-4 chip" style="background:#FF4D6D;color:white;border-color:#FF4D6D;">Featured</span>
        </div>
        <div class="p-8 md:p-12 flex flex-col justify-center">
          @if($featured->category)
            <span class="chip mb-4 inline-flex" style="background:#FFD4DE;border-color:#FFD4DE;">{{ $featured->category->name }}</span>
          @endif
          <h2 class="font-display text-3xl leading-tight group-hover:text-cherry transition-colors">{{ $featured->title }}</h2>
          @if($featured->excerpt)
            <p class="text-plum/70 mt-3 leading-relaxed">{{ $featured->excerpt }}</p>
          @endif
          <div class="flex items-center gap-3 mt-6 text-xs text-fog">
            <span>{{ $featured->published_at?->format('d M Y') ?? 'Recently' }}</span>
            <span>·</span>
            <span>5 min read</span>
          </div>
          <span class="mt-4 text-cherry font-semibold text-sm group-hover:underline">Read more →</span>
        </div>
      </div>
    </a>
  </div>
</section>
@endif

{{-- Posts Grid + Sidebar --}}
<section class="py-10 px-6">
  <div class="max-w-7xl mx-auto grid md:grid-cols-[1fr_280px] gap-8">

    <div>
      @if($posts->isNotEmpty())
      <div class="grid md:grid-cols-2 gap-6">
        @php $bgColors = ['#FFD4DE','#E4D6FF','#D4E9D0','#FFF2C4','#F4F0F6','#FFD4DE']; @endphp
        @foreach($posts as $i => $post)
        <article class="bg-white rounded-3xl overflow-hidden border border-cloud hover:shadow-gummy transition-shadow group">
          <a href="{{ route('blog.show', $post->slug) }}">
            <div class="aspect-video relative" style="background:{{ $bgColors[$i % 6] }};">
              <div class="absolute inset-0 flex items-center justify-center text-5xl">📝</div>
            </div>
            <div class="p-5">
              @if($post->category)
                <span class="text-xs font-semibold text-cherry">{{ $post->category->name }}</span>
              @endif
              <h3 class="font-display text-lg mt-1 leading-tight group-hover:text-cherry transition-colors">{{ $post->title }}</h3>
              @if($post->excerpt)
                <p class="text-fog text-sm mt-2 leading-relaxed line-clamp-2">{{ $post->excerpt }}</p>
              @endif
              <div class="mt-4 flex items-center justify-between text-xs text-fog">
                <span>{{ $post->published_at?->format('d M Y') ?? 'Recently' }}</span>
                <span class="text-cherry font-semibold group-hover:underline">Read →</span>
              </div>
            </div>
          </a>
        </article>
        @endforeach
      </div>
      @if($posts->hasPages())
        <div class="mt-10 text-center">{{ $posts->links() }}</div>
      @endif
      @else
      <div class="text-center py-20">
        <div class="text-6xl mb-4">📝</div>
        <h3 class="font-display text-2xl">Blog posts coming soon</h3>
        <p class="text-fog mt-2">We're writing something good. Check back soon!</p>
      </div>
      @endif
    </div>

    {{-- Sidebar --}}
    <aside class="space-y-5">
      @if($categories->isNotEmpty())
      <div class="bg-white rounded-3xl border border-cloud p-5">
        <h3 class="font-display text-lg mb-4">Categories</h3>
        <ul class="space-y-2 text-sm">
          @foreach($categories as $cat)
          <li class="flex items-center justify-between text-plum/70 hover:text-cherry cursor-pointer">
            <span>{{ $cat->name }}</span>
            <span class="bg-cloud rounded-full px-2 py-0.5 text-xs">{{ $cat->posts_count }}</span>
          </li>
          @endforeach
        </ul>
      </div>
      @endif

      <div class="bg-butter rounded-3xl p-5">
        <p class="hand text-xl text-cherry mb-2">letters worth opening</p>
        <h3 class="font-display text-lg mb-3">Join the newsletter</h3>
        <p class="text-sm text-plum/70 mb-4">New drops, soft deals, zero spam.</p>
        <input type="email" class="field-input mb-3" placeholder="your@email.com">
        <button class="btn-pop w-full justify-center text-sm">Subscribe 🌸</button>
      </div>
    </aside>

  </div>
</section>

</x-layouts.storefront>
