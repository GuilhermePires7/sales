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
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('site.layouts.customers.edit')->with('customer', $customer);
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);
        $customer->update($request->all());
        return redirect()->route('customers.index');
    }
    public function destroy($id)
    {
        $sale = Customer::find($id);
        $sale->delete();
        return redirect()->route('customers.index');
    }

}
