<?php

namespace App\Http\Controllers;

use App\Payment;
use App\CustomerDetails;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::latest()->get();
        return view('website.backend.payment.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customerDetalis = CustomerDetails::latest()->get();
        return view('website.backend.payment.create', compact('customerDetalis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
                'paymentType' => 'required',
                'total' => 'required|integer|min:1',
                'customerId' => 'required'
            ]);

            $payment = new Payment();

            $payment->paymentType = request('paymentType');
            $payment->total = request('total');
            $payment->customerId = $request->get('customerId');

            $payment->save();

            return redirect()->route('payment.index')
                   ->with('add_Payment','Payment has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payment = Payment::findorFail($id);
        $customerDetalis = CustomerDetails::all();
            
        return view('website.backend.payment.edit', compact('payment','customerDetalis')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        request()->validate([
                'paymentType' => 'required',
                'total' => 'required|integer|min:1',
                'customerId' => 'required'
            ]);

            $payment = Payment::findorFail($request->id);

            $payment->paymentType = request('paymentType');
            $payment->total = request('total');
            $payment->customerId = $request->get('customerId');

            $payment->save();

            return redirect()->route('payment.index')
                   ->with('update_Payment','Payment has been created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment = Payment::findorFail($id);

            $payment->delete();

            return back()->with('Delete','Payment has been deleted successfully');
    }
}
