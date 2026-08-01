<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Collection;

class CartService
{
    private const KEY = 'inkbloom_cart';

    public function all(): array
    {
        return session(self::KEY, []);
    }

    public function add(Product $product, int $qty = 1): void
    {
        $cart = $this->all();
        $id = $product->id;

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $qty;
        } else {
            $cart[$id] = [
                'id'       => $product->id,
                'name'     => $product->name,
                'slug'     => $product->slug,
                'image'    => $product->main_image,
                'price'    => (float) ($product->sale_price ?? $product->price),
                'quantity' => $qty,
            ];
        }

        session([self::KEY => $cart]);
    }

    public function update(int $productId, int $qty): void
    {
        $cart = $this->all();
        if ($qty <= 0) {
            unset($cart[$productId]);
        } elseif (isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $qty;
        }
        session([self::KEY => $cart]);
    }

    public function remove(int $productId): void
    {
        $cart = $this->all();
        unset($cart[$productId]);
        session([self::KEY => $cart]);
    }

    public function clear(): void
    {
        session()->forget(self::KEY);
    }

    public function count(): int
    {
        return array_sum(array_column($this->all(), 'quantity'));
    }

    public function subtotal(): float
    {
        return array_reduce($this->all(), fn($carry, $item) => $carry + ($item['price'] * $item['quantity']), 0.0);
    }

    public function isEmpty(): bool
    {
        return empty($this->all());
    }
}
