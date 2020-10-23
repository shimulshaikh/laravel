<?php

namespace App\Http\Controllers;

use App\CustomerDetails;
use Illuminate\Http\Request;

class CustomerDetailsController extends Controller
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
        $customerDetalis = CustomerDetails::latest()->get();
        return view('website.backend.customerDetail.index', compact('customerDetalis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website.backend.customerDetail.create');
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
                'firstName' => 'required',
                'lastName' => 'required',
                'phone' => 'required',
                'email' => 'required|email',
                'address1' => 'required',
                'address2' => 'required',
                'town' => 'required',
                'district' => 'required',
                'postCode' => 'required',
                'otherNotes' => 'required'
            ]);
             
             
                $customerDetails = new CustomerDetails();

                $customerDetails->firstName = request('firstName');
                $customerDetails->lastName = request('lastName');
                $customerDetails->companyName = request('companyName');                
                $customerDetails->phone = request('phone');
                $customerDetails->email = request('email');
                $customerDetails->country = request('country');
                $customerDetails->address1 = request('address1');
                $customerDetails->address2 = request('address2');
                $customerDetails->town = request('town');
                $customerDetails->district = request('district');
                $customerDetails->postCode = request('postCode');
                $customerDetails->otherNotes = request('otherNotes');

                $customerDetails->save();

                return redirect()->route('customerDetali.index')
                   ->with('add_Customer','Customer has been created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CustomerDetails  $customerDetails
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerDetails $customerDetails)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CustomerDetails  $customerDetails
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customerDetali = CustomerDetails::findorFail($id);
        return view('website.backend.customerDetail.edit', compact('customerDetali'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CustomerDetails  $customerDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        request()->validate([
                'firstName' => 'required',
                'lastName' => 'required',
                'phone' => 'required',
                'email' => 'required|email',
                'address1' => 'required',
                'address2' => 'required',
                'town' => 'required',
                'district' => 'required',
                'postCode' => 'required',
                'otherNotes' => 'required'
            ]);
             
                $customerDetails = CustomerDetails::findorFail($request->id);

                $customerDetails->firstName = request('firstName');
                $customerDetails->lastName = request('lastName');
                $customerDetails->companyName = request('companyName');                
                $customerDetails->phone = request('phone');
                $customerDetails->email = request('email');
                $customerDetails->country = request('country');
                $customerDetails->address1 = request('address1');
                $customerDetails->address2 = request('address2');
                $customerDetails->town = request('town');
                $customerDetails->district = request('district');
                $customerDetails->postCode = request('postCode');
                $customerDetails->otherNotes = request('otherNotes');

                $customerDetails->save();

                return redirect()->route('customerDetali.index')
                   ->with('update_Customer','Customer has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CustomerDetails  $customerDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

            $customerDetail = CustomerDetails::findorFail($id);
            $customerDetail->delete();
            return back()->with('Delete','Customer has been deleted successfully');
    }
}
