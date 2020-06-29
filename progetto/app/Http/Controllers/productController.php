<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Product;
use Illuminate\Http\Request;

class productController extends Controller
{
    function index(Request $request, $sex) {
        $products= DB::table('product')

            ->join('category','category.id', '=', 'product.category_id')
            ->join('gallery','product.id','=','gallery.product_id')
            ->select('product.name', 'gallery.path' , 'product.id', 'product.price','product.brand','category.type')
            ->where('category.type','=', $sex)
            ->groupby('product.id', 'gallery.product_id')
            ->paginate(9);


        if($request->ajax())             return view('productInclude', compact('products'))->render();

        $brands= DB::table('product')
            ->select('brand')
            ->groupBy('brand')
            ->get();

        $donna ="Woman";
        $uomo = "Man";
        $acc = "Accessories";

        $prodwom = DB::table('category')
            ->select('name')
            ->where('type','=', $donna)
            ->groupBy('name')
            ->get();

        $prodman = DB::table('category')
            ->select('name')
            ->where('type','=', $uomo)
            ->groupBy('name')
            ->get();

        $accessori = DB::table('category')
            ->select('name')
            ->where('type','=', $acc)
            ->groupBy('name')
            ->get();

        return view('/shop')
            ->with(compact('products'))
            ->with(compact('brands'))
            ->with(compact('prodwom'))
            ->with(compact('prodman'))
            ->with(compact('accessori'));


    }
    function collezione(Request $request) {
        $products= DB::table('product')

            ->join('category','category.id', '=', 'product.category_id')
            ->join('gallery','product.id','=','gallery.product_id')
            ->select('product.name', 'gallery.path' , 'product.id', 'product.price','product.brand','category.type')
            ->groupby('product.id', 'gallery.product_id')
            ->paginate(9);

        if($request->ajax())             return view('productInclude', compact('products'))->render();


        $donna ="Woman";
        $uomo = "Man";
        $acc = "Accessories";

        $prodwom = DB::table('category')
            ->select('name')
            ->where('type','=', $donna)
            ->groupBy('name')
            ->get();

        $prodman = DB::table('category')
            ->select('name')
            ->where('type','=', $uomo)
            ->groupBy('name')
            ->get();

        $accessori = DB::table('category')
            ->select('name')
            ->where('type','=', $acc)
            ->groupBy('name')
            ->get();

        $brands= DB::table('product')
          ->select('brand')
            ->groupBy('brand')
          ->get();

        return view('/shopping')
            ->with(compact('products'))
            ->with(compact('brands'))
            ->with(compact('prodwom'))
            ->with(compact('prodman'))
            ->with(compact('accessori'));


    }

    function category_filter(Request $request, $sex)
    {
        $products = DB::table('product')
            ->join('category', 'category.id', '=', 'product.category_id')
            ->join('gallery', 'product.id', '=', 'gallery.product_id')
            ->select('product.name', 'gallery.path', 'product.id', 'product.price', 'product.brand')
            ->where('category.type', '=', $sex)
            ->groupby('product.id', 'gallery.product_id')
            ->paginate(9);

        if($request->ajax())             return view('productInclude', compact('products'))->render();

        return view('productInclude', compact('products'));

    }


}





