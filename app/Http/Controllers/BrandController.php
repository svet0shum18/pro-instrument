<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;

class BrandController extends Controller
{
/**
* Отображает товары по выбранному бренду.
*/
public function showProductsByBrand($slug)
{
// Находим бренд по slug
$brand = Brand::where('slug', $slug)->firstOrFail();

// Получаем товары этого бренда
$products = $brand->products;

// Возвращаем view с товарами
return view('brand.products', compact('brand', 'products'));
}
}
