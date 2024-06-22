<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Payment;
use App\Models\Sales;

class PaymentsController extends Controller
{
    public function index($id)
    {
        $sale = Sales::findOrFail($id);
        //dd($sale);
        return view('site.payments', ['sale' => $sale]);
    }

    public function store(Request $request)
    {
        $payment = Payment::create($request->all());
    }
    public function show(Request $request, $id)
    {
        //dd($request);
        Payment::create($request->all());

        return redirect()->route('sales.index');
    }
}
