<?php
use App\Product;
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
/*
Route::get('/gg', function () {
    return view('index');
});
*/

Route::get('/checkout', 'checkOutController@ciccio');


Route::get('/contact', function () {
    return view('contact');
});

Route::get('/regular-page', function () {
    return view('regular-page');
});

Route::get('/Profile', function () {
    return view('Profile');
});

Route::get('/shop/{sex}/from_0_to_25', 'price_controller@case_one');

Route::get('/shop/{sex}/from_25_to_50', 'price_controller@case_two');

Route::get('/shop/{sex}/from_50_to_100', 'price_controller@case_three');

Route::get('/shop/{sex}/upper_to_100', 'price_controller@case_four');

Route::get('/', 'HomeController@index');

Route::get('/data' , 'UsersController@edit')->name('users.edit');

Route::patch('/data' , 'UsersController@update')->name('users.update');

Route::get('/my_orders', 'OrdersController@show');



Route::post('/adress', 'UsersController@store')->name('users.store');


Route::get('/adress', 'UsersController@addresses');

Route::post('/my_card','UsersController@cazzarola')->name('Payment_method.cazzarola');

Route::get('/my_card', 'UsersController@cards');

Route::get('/shop/{sex}', 'productController@index');

Route::get('wishlist', 'WishlistController@index');


Route::get('/shopping', 'productController@collezione');

Route::get('/shop/single-product-details/removefromwish', 'WishlistController@removeFromWish');

Route::get('/shop/single-product-details/addtowish', 'WishlistController@addToWishlist');

Route::get('/shop/single-product-details/{id}', 'singleproductController@dettagli');

Route::get('/shop/single-product-details/{id}/{size}/add', 'singleproductController@addtocart');

Route::get('/shop/single-product-details/{id}/remove', 'CartController@removefromcart');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/search', 'singleproductController@search')->name('search');

Route::get('/shop/{sex}/{name}', 'category@categoriaDonna');

Route::get('/shopping/price1', 'category@categoryPrice1');
Route::get('/shopping/price2', 'category@categoryPrice2');
Route::get('/shopping/price3', 'category@categoryPrice3');
Route::get('/shopping/price4', 'category@categoryPrice4');

Route::get('/pippo','placeOrderController@complete');


Route::get('/new-session', 'placeOrderController@final');

Route::get('/shopping/brand/{brand}', 'category@FilterBrand');

