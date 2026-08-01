<x-mail::message>
# Your order is officially blooming. 🌸

Hi {{ $order->address?->name ?? 'there' }},

Thank you for your order! We're packing it up with care and a tiny surprise inside.

---

**Order Number:** {{ $order->order_number }}
**Date:** {{ $order->created_at->format('d M Y') }}

---

## What you ordered

@foreach($order->items as $item)
- **{{ $item->name }}** × {{ $item->quantity }} — Rs {{ number_format($item->total) }}
@endforeach

---

| | |
|---|---|
| Subtotal | Rs {{ number_format($order->subtotal) }} |
| Shipping | Rs {{ number_format($order->shipping_fee) }} |
| **Total** | **Rs {{ number_format($order->total) }}** |

---

## Delivery details

{{ $order->address?->name }}
{{ $order->address?->line1 }}{{ $order->address?->line2 ? ', ' . $order->address->line2 : '' }}
{{ $order->address?->city }}{{ $order->address?->province ? ', ' . $order->address->province : '' }}
📞 {{ $order->address?->phone }}

---

**Payment:** {{ match($order->payment_method) {
    'cod'           => 'Cash on Delivery — pay when your order arrives.',
    'jazzcash'      => 'JazzCash — payment received, thank you!',
    'easypaisa'     => 'Easypaisa — payment received, thank you!',
    'bank_transfer' => 'Bank Transfer — please send your receipt to confirm your order.',
    default         => $order->payment_method,
} }}

@if($order->payment_method === 'bank_transfer')
> Please send your payment receipt to us on WhatsApp or Instagram **@inkbloomco** so we can confirm your order quickly.
@endif

---

We'll send you a tracking number as soon as your order is dispatched (usually within 24 hours).

<x-mail::button :url="url('/track-order')" color="success">
Track My Order
</x-mail::button>

Questions? Reply to this email or reach us on Instagram **@inkbloomco**.

*Paper. Petals. A little poetry.* 🌸

**Inkbloom Co.**
</x-mail::message>
