<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;

class CustomersController extends Controller
{
    public function index(Request $request)
    {
        $customers = Customer::all();

        return view('site.layouts.customers.index')->with('customers', $customers);
    }
    public function create(Request $request)
    {
        return view('site.layouts.customers.create_customers');
    }
    public function store(Request $request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->rg = $request->rg;
        $customer->cpf = $request->cpf;

        print_r($customer->getAttributes());
        $customer->save();
        return redirect('/customers');
    }
}
