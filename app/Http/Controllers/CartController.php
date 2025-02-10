<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
	public function addToCart(Request $request)
{
    // Проверка наличия product_id в запросе
    if (!$request->has('product_id')) {
        return response()->json(['error' => 'Product ID is required'], 400);
    }

    $productId = $request->input('product_id');
    $product = Product::find($productId);

    // Проверка на существование продукта
    if (!$product) {
        return response()->json(['error' => 'Product not found'], 404);
    }

		$quantitlyToAdd = 1;  


    // Проверка наличия товара в корзине
    $cartItem = Cart::where('user_id', auth()->id())
                    ->where('product_id', $productId)
                    ->first();

    if ($cartItem) {
        // Если товар уже в корзине, увеличиваем количество
				$cartItem->update(['quantity' => $cartItem->quantity + $quantitlyToAdd]);
    } else {
        // Если товара нет в корзине, создаем новую запись
        $cartItem = Cart::create([
            'user_id' => auth()->id(),
            'product_id' => $productId,
						'quantity' => $quantitlyToAdd
        ]);
    }

		if ($product->quantitly >= $quantitlyToAdd) {
			// Уменьшаем количество товара на складе
			$product->decrement('quantitly', $quantitlyToAdd);
	} else {
			return response()->json(['error' => 'Not enough stock available'], 400);
	}

    // Получаем актуальные данные корзины
    $cart = Cart::with('product')->where('user_id', auth()->id())->get();

    return response()->json([
        'success' => true,
        'cart' => $cart
    ]);
}

public function index()
{
    $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();

    return view('cart.index', compact('cartItems'));
}

    public function removeFromCart($id)
    {
        $cartItem = Cart::find($id);

        if ($cartItem && $cartItem->user_id === Auth::id()) {
            $cartItem->delete();
        }

        return redirect()->route('cart.view');
    }

    public function clearCart()
{
    // Получаем все товары в корзине текущего пользователя
    $cartItems = Cart::where('user_id', auth()->id())->get();

    // Восстанавливаем количество каждого товара в таблице products
    foreach ($cartItems as $cartItem) {
        $product = $cartItem->product;

        // Увеличиваем количество товара в базе данных
        $product->increment('quantitly', $cartItem->quantity);
    }

    // Удаляем все товары из корзины
    Cart::where('user_id', auth()->id())->delete();

    return redirect()->route('cart.index')->with('success', 'Корзина очищена');
}


		
}
