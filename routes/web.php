<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Frontend site route start

// Route::get('/', function () {
//     return view('website.frontend.layouts.main');
// });

Route::get('/', 'FrontendController@index')->name('website.index');
Route::get('/add-to-cart/{id}', 'FrontendController@addToCart')->name('website.addCart');
Route::get('/shopping-cart', 'FrontendController@getCart')->name('website.cart');
Route::get('/checkout-cart', 'FrontendController@getChackout')->name('website.checkout');
Route::post('/checkout-cart', 'FrontendController@storeOrder')->name('website.storeOrder');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Backend site route start

// Route::get('/dashboard', function () {
//     return view('website.backend.layouts.main');
// });


Route::get('/admin-panel', 'FrontendController@getLogin');


Route::group(['prefix' => 'dashboard', 'middleware' => ['auth'], ], function() {
		
		Route::resource('/user', UserController::class);            

		Route::get('/', 'BackendController@index')->name('backend.index');

		Route::resource('/productCategory', ProductCatagoryController::class);
		Route::resource('/product', ProductController::class);
		Route::resource('/productImage', ProductImageController::class);

		Route::resource('/customerDetali', CustomerDetailsController::class);
		Route::resource('/payment', PaymentController::class);

		Route::resource('/contact', ContactController::class);
		Route::resource('/contactForm', ContactFormController::class);	   
 });


		



