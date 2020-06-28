<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use OAuth2\Request;

class AppServiceProvider extends ServiceProvider
{


    /**
     * Register any application services.
     *
     * @return void
     */

    public function boot()
    {


        view()->composer(
            ['/index', '/shop' ,'checkout', '/shopping','contact','wishlist','/single-product-details', 'search_results', 'Profile', '/my_orders', 'data',
            '/contact', '/cart', '/checkout','/wishlist', '/adress','/my_card','/pippo','/new-session'],

            function($view) {


                $carts= DB::table('shopping_cart')
                    ->join('product','shopping_cart.product_id','=','product.id')
                    ->join('gallery', 'product.id', '=', 'gallery.product_id')
                    ->where('shopping_cart.users_id', '=', Auth::id())
                    ->select('product.name', 'gallery.path' ,'shopping_cart.quantity',
                        'product.id', 'product.description', 'shopping_cart.size', 'shopping_cart.subtotal',
                        'product.price','product.brand')
                    ->get() ;

                $cartsubtotal=DB::table('shopping_cart')
                    ->select('subtotal')
                    ->sum('subtotal');

                $view->with(compact('carts'))
                    ->with(compact('cartsubtotal'));
            });
    }


    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */

}
