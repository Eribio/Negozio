<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class singleproductController extends Controller
{
    function dettagli($id)
    {
         if (Auth::user()){
        $userid= Auth::user()->id;

        $wishlist= DB::table('wishlist')
            ->where('product_id', "=", $id)
            ->where('user_id', "=", $userid)
            ->count();
         }
        $details= DB::table('product')
            ->join('gallery', 'product.id', '=', 'gallery.product_id')
            ->join('category','category.id','=','product.category_id')
            ->select('product.name', 'gallery.path' , 'product.id', 'product.description', 'product.price','product.brand','category.type')
            ->where('product.id', "=", $id)
            ->groupby('product.id', 'gallery.product_id')
            ->get() ;

        $measure=DB::table('product')
            ->join('availability', 'product.id','=', 'availability.product_id')
            ->select('availability.size')
            ->where('availability.product_id', "=", $id)
            ->get() ;

        $cat=DB::table('product')
            ->join('category', 'category.id', "=", 'product.category_id')
            ->select('category.name')
            ->where('product.id', "=", $id)
            ->value('name');

        $type=DB::table('product')
            ->join('category', 'category.id', "=", 'product.category_id')
            ->select('category.type')
            ->where('product.id', "=", $id)
            ->value('type');


        $prds= DB::table('product')
            ->join('gallery', 'product.id', '=', 'gallery.product_id')
            ->join('category','category.id','=','product.category_id')
            ->select ('product.name', 'path' , 'product.id', 'product.description',
                'product.price','brand','category.type')
            ->where('category.name', "=", $cat)
            ->where('category.type', "=", $type)
            ->groupby('product.id', 'gallery.product_id')
            ->distinct()
            ->inRandomOrder()
            ->paginate(15)
            ->take(4);


        if (Auth::user()){
            return view('/single-product-details', compact('details','measure', 'wishlist',  'prds'));
        }
else
        return view('/single-product-details', compact('details','measure', 'prds'));
    }

    function search (Request $request){
        session_start();
        if (isset($_GET['query']))
        {
        $query = $request->input('query' );
        $_SESSION['q']=$query;
        }
        else{
            $query=$_SESSION['q'];
        }
        $products = DB::table('product')
            ->join('category','category.id', '=', 'product.category_id')
            ->join('gallery','product.id','=','gallery.product_id')
            ->select('product.name', 'gallery.path' , 'product.id', 'product.price','product.brand')
        ->where('product.name','like',"%{$query}%",'OR','product.brand','like',"%{$query}%" )
        ->where('category.name','like',"%{$query}%",'OR','product.brand','like',"%{$query}%" )
        ->where('product.brand','like',"%{$query}%",'OR','product.brand','like',"%{$query}%" )->paginate(9);

        $carts= DB::table('product')
            ->join('gallery', 'product.id', '=', 'gallery.product_id')
            ->join('shopping_cart', 'product.id', '=', 'shopping_cart.product_id')
            ->select('product.name', 'gallery.path' , 'product.id', 'product.description', 'product.price','product.brand')
            ->groupby('product.id', 'gallery.product_id')
            ->get() ;


        return view ('search_results' , compact('products' ));
    }

    function addtocart($id,$size) {

      $iduser= Auth::user()->getAuthIdentifier();



       $price=DB::table('product')
            ->select('price')
            ->where('id',"=", $id)
            ->pluck('price');

        $price1= $price[0];


        DB::table('shopping_cart')->insert([
            'product_id' => $id,
            'users_id' => $iduser,
            'size' => $size,
            'quantity'=> 1,
            'subtotal' => $price1

        ]);



        $carts= DB::table('shopping_cart')
            ->join('product', 'product.id', '=', 'shopping_cart.product_id')
            ->join('gallery', 'product.id', '=', 'gallery.product_id')
            //->join('availability', 'product.id', '=', 'availability.product_id')
            ->select('product.name', 'gallery.path' ,'product.id','shopping_cart.id','shopping_cart.size', 'shopping_cart.subtotal',
                'product.description', 'product.price','product.brand','shopping_cart.quantity')
            ->get() ;



        $cartsubtotal=DB::table('shopping_cart')
            ->select('subtotal')
            ->sum('subtotal');


        return view('cart' , compact( 'carts', 'cartsubtotal'));
    }


}
