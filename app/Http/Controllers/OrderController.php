<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function placeOrder(Request $request) {
        $order = Order::create([
            'customer_name' => $request->name,
            'customer_email' => $request->email,
            'customer_address' => $request->address,
            'total_price' => $request->total_price,
        ]);

        foreach (Cart::all() as $cartItem) {
            $order->orderItems()->create([
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->quantity * $cartItem->product->price,
            ]);
        }

        Cart::truncate();
        return redirect()->route('products.index')->with('success', 'Заказ оформлен!');
    }

}
