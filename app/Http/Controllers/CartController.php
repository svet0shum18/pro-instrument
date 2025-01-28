<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    // Add product to cart
    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $product = Product::find($productId);

        if (!$product || $product->quantity < 1) {
            return response()->json(['error' => 'Product not available'], 400);
        }

        $cart = Session::get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += 1;
        } else {
            $cart[$productId] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1
            ];
        }

        // Update product quantity in the database
        $product->quantity -= 1;
        $product->save();

        Session::put('cart', $cart);

        return response()->json(['success' => 'Product added to cart']);
    }

    // Show cart modal content
    public function showCart()
    {
        $cart = Session::get('cart', []);
        return response()->json(['cart' => $cart]);
    }

    // Remove a single product from the cart
    public function removeFromCart(Request $request)
    {
        $productId = $request->input('product_id');
        $cart = Session::get('cart', []);

        if (isset($cart[$productId])) {
            $product = Product::find($productId);
            $product->quantity += $cart[$productId]['quantity'];
            $product->save();

            unset($cart[$productId]);
            Session::put('cart', $cart);
        }

        return response()->json(['success' => 'Product removed from cart']);
    }

    // Clear the cart
    public function clearCart()
    {
        $cart = Session::get('cart', []);

        foreach ($cart as $productId => $item) {
            $product = Product::find($productId);
            $product->quantity += $item['quantity'];
            $product->save();
        }

        Session::forget('cart');

        return response()->json(['success' => 'Cart cleared']);
    }

    // Proceed to checkout
    public function checkout()
    {
        // Здесь можно получить товары из корзины
        $cartItems = session()->get('cart', []);

        return view('cart.checkout', compact('cartItems'));
    }
}

