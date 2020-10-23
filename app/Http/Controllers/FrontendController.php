<?php

namespace App\Http\Controllers;
use App\ProductImage;
use App\Product;
use Illuminate\Http\Request;
use Session;
use App\Cart;
use App\CustomerDetails;
use App\Payment;

class FrontendController extends Controller
{    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = ProductImage::latest()->get();
        return view('website.frontend.layouts.main', compact('products'));
    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::find($id);
        //dd($product);
        $oldCart = \Session::has('cart') ? \Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product,$product->id);

        $request->session()->put('cart', $cart);
        //dd($request->session()->get('cart'));
        return redirect()->route('website.index');
    }

    public function getCart()
    {
        if (!Session::has('cart')) {
            return view('website.frontend.shop.shopping-cart',['products'=>null]);
        }

        $oldCart=Session::get('cart');
        $cart = new Cart($oldCart);
        //dd($cart);

        return view('website.frontend.shop.shopping-cart',['products'=>$cart->items,'totalPrice'=>$cart->totalPrice]);
    }


    public function getChackout()
    {
         if (!Session::has('cart')) {
            return view('website.frontend.shop.shopping-cart',['products'=>null]);
        }

        $oldCart=Session::get('cart');
        $cart = new Cart($oldCart);
        //dd($cart);

        return view('website.frontend.shop.checkOut',['products'=>$cart->items,'totalPrice'=>$cart->totalPrice]);
    }

    public function storeOrder(Request $request)
    {
        request()->validate([
                'firstName' => 'required',
                'lastName' => 'required',
                'phone' => 'required',
                'companyName' => 'required',
                'email' => 'required|email',
                'country' => 'required',
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
                $customerDetails = CustomerDetails::orderBy('created_at')->first();
                $customerDetailId = $customerDetails->id;
                dd($customerDetailId);
    

            //Data pass in payment table    
            $payment = new Payment();

            $payment->paymentType = $request->paymentType; 
            $payment->total = $request->totalPrice; 
            $payment->customerId = $customerDetailId;
            $payment->status = 'active';
            //($payment);
            $payment->save();

            $request->session()->flush();

            return redirect()->route('website.index');


    }




     public function getLogin()
    {
        return view('welcome');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
