<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfirmation;
use App\Models\Address;
use App\Models\Order;
use App\Models\OrderItem;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function __construct(private CartService $cart) {}

    public function index()
    {
        if ($this->cart->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        return view('pages.checkout', [
            'items'    => $this->cart->all(),
            'subtotal' => $this->cart->subtotal(),
            'shipping' => 200,
            'total'    => $this->cart->subtotal() + 200,
        ]);
    }

    public function place(Request $request)
    {
        if ($this->cart->isEmpty()) {
            return redirect()->route('cart');
        }

        $data = $request->validate([
            'name'           => 'required|string|max:100',
            'email'          => 'required|email',
            'phone'          => 'required|string|max:20',
            'line1'          => 'required|string|max:255',
            'line2'          => 'nullable|string|max:255',
            'city'           => 'required|string|max:100',
            'province'       => 'nullable|string|max:100',
            'payment_method' => 'required|in:cod,jazzcash,easypaisa,bank_transfer',
            'notes'          => 'nullable|string|max:500',
            'gift_wrap'      => 'nullable|boolean',
        ]);

        $subtotal = $this->cart->subtotal();
        $shipping = 200;
        $total    = $subtotal + $shipping;

        $order = Order::create([
            'user_id'        => auth()->id(),
            'guest_email'    => auth()->check() ? null : $data['email'],
            'order_number'   => 'INK-' . strtoupper(Str::random(8)),
            'status'         => 'pending',
            'subtotal'       => $subtotal,
            'shipping_fee'   => $shipping,
            'discount'       => 0,
            'total'          => $total,
            'payment_method' => $data['payment_method'],
            'payment_status' => 'unpaid',
            'notes'          => $data['notes'] ?? null,
            'gift_wrap'      => (bool) ($data['gift_wrap'] ?? false),
        ]);

        foreach ($this->cart->all() as $item) {
            OrderItem::create([
                'order_id'   => $order->id,
                'product_id' => $item['id'],
                'name'       => $item['name'],
                'price'      => $item['price'],
                'quantity'   => $item['quantity'],
                'total'      => $item['price'] * $item['quantity'],
            ]);
        }

        Address::create([
            'order_id'    => $order->id,
            'user_id'     => auth()->id(),
            'name'        => $data['name'],
            'phone'       => $data['phone'],
            'line1'       => $data['line1'],
            'line2'       => $data['line2'] ?? null,
            'city'        => $data['city'],
            'province'    => $data['province'] ?? null,
        ]);

        $this->cart->clear();

        // Send confirmation email
        $emailTo = $data['email'];
        try {
            Mail::to($emailTo)->send(new OrderConfirmation($order->load('items', 'address')));
        } catch (\Exception $e) {
            // Email failure should never block the order
        }

        return redirect()->route('checkout.success', $order->order_number);
    }

    public function success(string $orderNumber)
    {
        $order = Order::where('order_number', $orderNumber)->with('items', 'address')->firstOrFail();
        return view('pages.checkout-success', compact('order'));
    }
}
