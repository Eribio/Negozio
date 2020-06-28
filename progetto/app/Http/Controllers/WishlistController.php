<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    function index(){

        $products= DB::table('wishlist')

            ->join('product', 'product.id','=','wishlist.product_id')
            ->join('gallery','product.id','=','gallery.product_id')
            ->select('product.name', 'gallery.path' , 'product.id', 'product.price','product.brand')
            ->where('wishlist.user_id','=',Auth::id())
            ->groupby('product.id', 'gallery.product_id')
            ->paginate(6);

        return view('/wishlist', compact('products'));

    }
// da vedere come fare la insert nel db

    function addToWishlist(Request $request){

        $product_id = $request->input('id');
        $userid = auth()->user()->id;
        $currdate = date("Y-m-d H:i:s");

        DB::table('wishlist')->insert([
            'user_id' => $userid,
            'product_id' => $product_id,
            'created_at' => $currdate,
            ]);


        $alreadyWished = DB::table('wishlist')
            ->where('product_id', '=', $product_id)
            ->where('user_id', '=', $userid)
            ->count();

        if(empty($userid))
        {
            return ('0');
        } else {
            return view('wishlist', compact('alreadyWished'));
        }
    }


    public function removeFromWish(Request $request)
    {
        $product_id = $request->input('id');
        $userid = auth()->user()->id;
        $currdate = date("Y-m-d H:i:s");

        DB::table('wishlist')
            ->where('user_id', '=', $userid)
            ->where('product_id', '=', $product_id)
            ->delete();


        return 200 ;
    }
}



