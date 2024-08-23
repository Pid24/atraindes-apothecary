<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->orderBy('id', 'DESC')->take(6)->get();
        $categories = Category::all();
        return view('front.index', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    public function details(Product $product)
    {
        return view('front.details', [
            'product' => $product,
        ]);
    }
}
