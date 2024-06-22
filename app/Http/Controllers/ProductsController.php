<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Product;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();
        return view('site.layouts.products.index', ['products' => $products]);
    }
    public function create(Request $request)
    {
        return view('site.layouts.products.create_products');
    }
    public function store(Request $request)
    {
        $products = new Product();
        $products->name = $request->name;
        $products->price = $request->price;
        $products->description = $request->description;


        print_r($products->getAttributes());
        $products->save();
        return redirect()->route('/products');
    }
}
