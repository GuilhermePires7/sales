<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Customer;
use App\Models\Sales;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        $products = Product::all();
        $sales = Sales::all();
        return view('site.layouts.sales.index')->with('customers', $customers)
            ->with('products', $products)->with('sales', $sales);
    }
    public function create(Request $request)
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('site.layouts.sales.create')->with('customers', $customers)
            ->with('products', $products);
    }
    public function store(Request $request)
    {

        Sales::create($request->all());
        return redirect('/');
    }
    public function update(Request $request, $id)
    {
        $sales = Sales::find($id);
        $sales->update($request->all());

        return redirect()->route('sales.index')->with('sucess', 'Post updated sucessfully');
    }

    public function destroy($id)
    {
        $sale = Sales::find($id);
        $sale->delete();

        return redirect()->route('sales.index')->with('Sucess', 'Sale destroy with sucessfully');
    }
    public function edit($id)
    {
        $sales = Sales::find($id);
        return view('', compact('sales'));
    }
}
