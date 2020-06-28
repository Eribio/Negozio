<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    function removefromcart($id) {


        DB::table('shopping_cart')->where('id', '=' , $id)//->where('size','=','$size')
        ->delete();

        $carts= DB::table('shopping_cart')
            ->join('product', 'product.id', '=', 'shopping_cart.product_id')
            ->join('gallery', 'product.id', '=', 'gallery.product_id')
            //->join('availability', 'product.id', '=', 'availability.product_id')
            ->select('product.name', 'gallery.path' ,'shopping_cart.id','shopping_cart.size', 'shopping_cart.subtotal',
                'product.description', 'product.price','product.brand', 'shopping_cart.quantity')

            ->get() ;

        $cartsubtotal=DB::table('shopping_cart')
            ->select('subtotal')
            ->sum('subtotal');





        return view('cart' , compact('carts', 'cartsubtotal'));

    }
}
