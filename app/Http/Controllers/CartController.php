<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct(private CartService $cart) {}

    public function index()
    {
        return view('pages.cart', [
            'items'    => $this->cart->all(),
            'subtotal' => $this->cart->subtotal(),
            'shipping' => 200,
            'total'    => $this->cart->subtotal() + 200,
        ]);
    }

    public function add(Request $request)
    {
        $request->validate(['product_id' => 'required|exists:products,id', 'quantity' => 'integer|min:1']);
        $product = Product::findOrFail($request->product_id);
        $this->cart->add($product, (int) $request->input('quantity', 1));

        if ($request->expectsJson()) {
            return response()->json(['count' => $this->cart->count(), 'message' => 'Added to cart!']);
        }

        return back()->with('success', 'Added to cart!');
    }

    public function update(Request $request)
    {
        $request->validate(['product_id' => 'required|integer', 'quantity' => 'required|integer|min:0']);
        $this->cart->update((int) $request->product_id, (int) $request->quantity);

        return back();
    }

    public function remove(Request $request)
    {
        $request->validate(['product_id' => 'required|integer']);
        $this->cart->remove((int) $request->product_id);

        return back();
    }
}
