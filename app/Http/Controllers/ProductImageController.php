<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductImage;
use App\Product;
use Illuminate\Support\Str;

class ProductImageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    

	public function index()
        {
        	$productImages = ProductImage::latest()->get();
            //dd($productImages);
            return view('website.backend.productImage.index', compact('productImages'));
        }


    public function create()
        {
        	$products = Product::all();
            return view('website.backend.productImage.create', compact('products'));
        }   


    public function store(Request $request)
    {
    	request()->validate([
    		'imgTitle' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp'
    	]);

    	$slug = Str::slug($request->productName, '-');

    	$image = $request->file('image');

    	if ($request->hasFile('image')) {
                $fileName = $image->getClientOriginalName();                
                $img = $request->image->storeAs('product/images',$fileName,'public');

                $ProductImage = new ProductImage();

             $ProductImage->imgTitle = request('imgTitle');
             $ProductImage->productImage = $img;
             $ProductImage->productId = $request->get('productId');
             $ProductImage->slug = $slug;
             $ProductImage->save();
             
             return redirect()->route('productImage.index')
        		   ->with('add_ProductImage','Product Image has been created successfully');

            }
    } 


    public function edit($id)
        {
            $ProductImage = ProductImage::findorFail($id);
            $products = Product::all();
            
            return view('website.backend.productImage.edit', compact('ProductImage','products'));   
        }	


    public function update(Request $request)
    {

        $image = $request->file('image');

        if ($request->hasFile('image'))
         {
            request()->validate([
                'imgTitle' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp'
            ]);

            $slug = Str::slug($request->productName, '-');

            $ProductImage = ProductImage::findorFail($request->id);

                    $fileName = $image->getClientOriginalName();                
                    $img = $request->image->storeAs('product/images',$fileName,'public');

                 $ProductImage->imgTitle = request('imgTitle');
                 $ProductImage->productImage = $img;
                 $ProductImage->productId = $request->get('productId');
                 $ProductImage->slug = $slug;
                 $ProductImage->save();
                 
                 return redirect()->route('productImage.index')
                       ->with('update_ProductImage','Product Image has been updated successfully');

         }

                request()->validate([
                        'imgTitle' => 'required'
                    ]);

                $slug = Str::slug($request->productName, '-');

                $ProductImage = ProductImage::findorFail($request->id);


                 $ProductImage->imgTitle = request('imgTitle');
                 $ProductImage->productId = $request->get('productId');
                 $ProductImage->slug = $slug;
                 $ProductImage->save();
                 
                 return redirect()->route('productImage.index')
                       ->with('update_ProductImage','Product Image has been updated successfully');

    }   


    public function destroy($id)
        {
           
            $ProductImage = ProductImage::findorFail($id);

            $ProductImage->delete();

            return back()->with('Delete','Product Image has been deleted successfully');
        }      


}
