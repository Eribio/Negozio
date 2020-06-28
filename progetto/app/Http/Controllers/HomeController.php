<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
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

        return view('/index', compact('prodmans', 'prodwomans', 'accessories'));
    }

}
