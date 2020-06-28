<?php

namespace App\Http\Controllers;

use App\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class placeOrderController extends Controller
{
    function complete()
    {

        $user_id = Auth::user()->getAuthIdentifier();
        $date = date("Y-m-d");
        $payment_id = DB::table('payment_method')
            ->select('payment_method.id')
            ->where('user_id', '=', $user_id)
            //->limit(1)
            ->get();

        $total_price = DB::table('shopping_cart')
            ->select('shopping_cart.subtotal')
            ->sum('subtotal');

        DB::table('order')->insert([
            'data' => $date,
            'user_id' => $user_id,
            'total_price' => $total_price,
            'payment_id' => 1
        ]);


        return view('/pippo');

    }

    function final(){

        $user_id=Auth::user()->getAuthIdentifier();

        $order_id= DB::table('order')
            ->select('order.id')
            ->where('order.user_id','=',$user_id)
            ->orderBy('order.id','DESC')
            ->limit(1)
            ->pluck('id');

      $products=DB::table('shopping_cart')
          ->select('product_id')
          ->pluck('product_id');

      foreach ($products as $p){
          foreach ($order_id as $o){
          DB::table('order_composition')
              ->insert([
                  'order_id'=>$o,
                  'product_id'=>$p,
              ]);
         }
      }

      DB::table('shopping_cart')
          ->delete();

        $prodwomans= DB::table('product')
            ->join('gallery', 'product.id', '=', 'gallery.product_id')
            ->join('category','category.id','=','product.category_id')
            ->select('product.name', 'path' , 'product.id', 'product.description',
                'product.price','brand','category.type')
            ->where('category.type', "=", 'Woman')
            ->groupby('product.id', 'gallery.product_id')
            ->inRandomOrder()
            ->distinct()
            ->paginate(15)
            ->take(4);

        $prodmans= DB::table('product')
            ->join('gallery', 'product.id', '=', 'gallery.product_id')
            ->join('category','category.id','=','product.category_id')
            ->select('product.name', 'path' , 'product.id', 'product.description',
                'product.price','brand','category.type')
            ->where('category.type', "=", 'Man')
            ->groupby('product.id', 'gallery.product_id')
            ->inRandomOrder()
            ->distinct()
            ->paginate(15)
            ->take(4);

        $accessories= DB::table('product')
            ->join('gallery', 'product.id', '=', 'gallery.product_id')
            ->join('category','category.id','=','product.category_id')
            ->select('product.name', 'path' , 'product.id', 'product.description',
                'product.price','brand','category.type')
            ->where('category.type', "=", 'Accessories')
            ->groupby('product.id', 'gallery.product_id')
            ->inRandomOrder()
            ->distinct()
            ->paginate(15)
            ->take(4);

     return view('/new-session',compact('prodwomans','prodmans','accessories'));
    }

}
