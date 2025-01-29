<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category; // Подключение модели Category


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

    public function indexCart() {
        $products = Product::all();
        return view('home', compact('products'));
    }

    public function showProductsByCategory($id)
    {
        // Получаем категорию по ID
        $category = Category::findOrFail($id);

        // Получаем товары, которые принадлежат этой категории
        $products = Product::where('id_category', $id)->get();

        // Возвращаем view с товарами
        return view('category.products', compact('category', 'products'));
    }

//    public function showProductsByBrand($id)
//    {
//        // Получаем категорию по ID
//        $brand = Brand::findOrFail($id);
//
//        // Получаем товары, которые принадлежат этой категории
//        $products = Product::where('id_brand', $id)->get();
//
//        // Возвращаем view с товарами
//        return view('brand.products', compact('brand', 'products'));
//    }

    public function showProductsByBrand($id)
    {
        // Получаем бренд по ID
//        $brand = Brand::findOrFail($id);
//
//        // Получаем товары этого бренда
//        $products = Product::where('id_brand', $id)->get();
//
//        // Возвращаем view
//        return view('brand.products', compact('brand', 'products'));
        $brand = Brand::findOrFail($id); // Ищем бренд по ID
        $products = Product::where('id_brand', $id)->get(); // Получаем товары

        return view('brand.products', compact('brand', 'products'));

    }
}
