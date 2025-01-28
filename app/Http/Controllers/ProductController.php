<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all(); // Получение всех товаров
        $giftProducts = Product::inRandomOrder()->limit(6)->get();
        return view('home', [
            'products' => Product::all(), // Все товары
            'giftProducts' => $giftProducts // Случайные товары
        ]);
    }

    public function updateStock(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($request->action == 'add') {
            $product->stock -= 1; // Уменьшение количества
        } elseif ($request->action == 'remove') {
            $product->stock += 1; // Увеличение количества
        }

        $product->save();

        return response()->json(['success' => true, 'stock' => $product->stock]);
    }

    public function showGiftIdeas()
    {
        // Извлекаем 6 случайных товаров для подарков
        $giftProducts = Product::inRandomOrder()->limit(6)->get();

        dd($giftProducts);

        // Передаем товары в представление
        return view('home', compact('giftProducts'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query'); // Получение поискового запроса из формы

        // Поиск товаров по имени или описанию
        $products = Product::where('name', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->get();

        // Передача результатов поиска в представление
        return view('search-results', ['products' => $products, 'query' => $query]);
    }
}
