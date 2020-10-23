<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductCatagory;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
        public function index()
        {
        	$products = Product::latest()->get();
            return view('website.backend.product.index', compact('products'));
        }


        public function create()
        {
        	$productCategorys = ProductCatagory::all();
            return view('website.backend.product.create', compact('productCategorys'));
        }


        public function store(Request $request)
        {
        	
            request()->validate([
        		'categoryId' => 'required',
        		'productName' => 'required',
        		'price' => 'required|integer|min:1',
        		'productDesc' => 'required'
        	]);
        	 
        	 

    	        $slug = Str::slug($request->productName, '-');
    	        $Product = new Product();

    	        $Product->productName = request('productName');
    	        $Product->productDesc = request('productDesc');
    	        $Product->price = request('price');
    	        $Product->categoryId = $request->get('categoryId');
    	    	$Product->slug = $slug;

    	    	$Product->save();

        		return redirect()->route('product.index')
        		   ->with('add_Product','Product has been created successfully');
        }
    

        public function edit($id)
        {
            $product = Product::findorFail($id);
            $productCategorys = ProductCatagory::all();
            
            return view('website.backend.product.edit', compact('product','productCategorys'));   
        }


        public function update(Request $request)
        {
            request()->validate([
                'categoryId' => 'required',
                'productName' => 'required',
                'price' => 'required|integer|min:1',
                'productDesc' => 'required'
            ]);
             

                $slug = Str::slug($request->productName, '-');
                
                $Product = Product::findorFail($request->id);

                $Product->productName = request('productName');
                $Product->productDesc = request('productDesc');
                $Product->price = request('price');
                $Product->categoryId = $request->get('categoryId');
                $Product->slug = $slug;

                $Product->save();

                return redirect()->route('product.index')
                   ->with('update_Product','Product has been updated successfully');
        }


        public function destroy($id)
        {
            if(Gate::denies('delete-user'))
            {
                return redirect()->route('product.index');
            }
           
            $Product = Product::findorFail($id);

            $Product->delete();

            return back()->with('Delete','Product has been deleted successfully');
        }


}
