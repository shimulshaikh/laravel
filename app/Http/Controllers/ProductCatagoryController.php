<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductCatagory;
use Illuminate\Support\Str;

class ProductCatagoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
	public function index()
    {
    	$productCategorys = ProductCatagory::latest()->get();
        return view('website.backend.productCategory.index', compact('productCategorys'));
    }

    public function create()
    {
        return view('website.backend.productCategory.create');
    }

    public function store(Request $request)
    {
    	//dump("helo");
    	request()->validate([
    		'brandName' => 'required'
    	]);

	        $slug = Str::slug($request->brandName, '-');
	        $ProductCatagory = new ProductCatagory();

	        $ProductCatagory->brandName = request('brandName');
	    	$ProductCatagory->slug = $slug;

	    	$ProductCatagory->save();

    		return redirect()->route('productCategory.index')
    		   ->with('add_ProductCatagory','Product Category has been created successfully');
    }


    public function edit($id)
    {
    	$productCatagory = ProductCatagory::findorFail($id);

    	return view('website.backend.productCategory.edit', compact('productCatagory'));   
    }


    public function update(Request $request)
    {
        request()->validate([
    		'brandName' => 'required'
    	]);

	        $slug = Str::slug($request->brandName, '-');
	        $ProductCatagory = ProductCatagory::findorFail($request->id);

	        $ProductCatagory->brandName = request('brandName');
	    	$ProductCatagory->slug = $slug;

	    	$ProductCatagory->save();

    		return redirect()->route('productCategory.index')
    			->with('update_ProductCatagory','Product Category has been updated successfully');
    }


    public function destroy($id)
    {
       
        $ProductCatagory = ProductCatagory::findorFail($id);

        $ProductCatagory->delete();

        return back()->with('Delete','Product Category has been deleted successfully');
    }

    

}
