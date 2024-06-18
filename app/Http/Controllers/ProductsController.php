<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Product;

class ProductsController extends Controller
{
    public function products(Request $request)
    {

        $products = Product::all();
        return view('site.products', ['products' => $products]);
    }
    public function products_save(Request $request)
    {
        /*$request->validate([
            'name' => 'required',
            'rg' => 'required',
            'cpf' => 'required'
        ]);*/
        $products = new Product();
        $products->name = $request->name;
        $products->price = $request->price;
        $products->description = $request->description;


        print_r($products->getAttributes());
        $products->save();
        return view('site.products');
    }
}
