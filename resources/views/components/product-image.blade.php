@props([
    'product'  => null,
    'image'    => null,
    'alt'      => null,
    'fallback' => '🖋️',
    'size'     => 'text-6xl',
])

@php
    $src = $image ?? $product?->main_image;
@endphp

@if($src)
    <img src="{{ asset($src) }}"
         alt="{{ $alt ?? $product?->name ?? '' }}"
         loading="lazy"
         {{ $attributes->merge(['class' => 'object-cover']) }}>
@else
    <div {{ $attributes->merge(['class' => 'flex items-center justify-center '.$size]) }}>{{ $fallback }}</div>
@endif
