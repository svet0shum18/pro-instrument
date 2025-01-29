<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $cartItem = Cart::where('product_id', $id)->first();

        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            Cart::create([
                'product_id' => $id,
                'quantity' => 1
            ]);
        }

        return response()->json(['message' => 'Товар добавлен в корзину']);
    }

    public function showCart()
    {
        $cartItems = Cart::with('product')->get();
        return view('cart', compact('cartItems'))->render();
    }

    public function checkout()
    {
        // Логика оформления заказа
        Cart::truncate(); // Очистка корзины после оформления заказа
        return redirect()->back()->with('success', 'Заказ успешно оформлен!');
    }
}
