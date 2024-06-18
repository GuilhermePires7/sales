<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function sale(Request $request, $id = 0)
    {
        $sales = Customer::all();

        //dd($sales);
        return view('site.sale', ['sales' => $sales]);
        //return response()->json(['info' => $sales[$id] ?? 'Dados não encontrados']);
    }



    public function customers(Request $request)
    {
        $data = [];
        return view('site.customers', ['data' => $data]);
    }

    public function customers_save(Request $request)
    {
        $customers = new Customer();
        $customers->name = $request->name;
        $customers->rg = $request->rg;
        $customers->cpf = $request->cpf;


        print_r($customers->getAttributes());
        $customers->save();
        return view('site.customers');
    }
}
