<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class price_controller extends Controller
{
    function case_one(Request $request,$sex)
    {
        $name = $request->input('name');
        $products = DB::table('product')
            ->join('category', 'category.id', '=', 'product.category_id')
            ->join('gallery', 'product.id', '=', 'gallery.product_id')
            ->select('product.name', 'gallery.path', 'product.id', 'product.price', 'product.brand','category.type','category.name')
            ->where('product.price', "<=", 25)
            ->where('category.type',"=",$sex)
            ->where(function($query) use($name)
            {
                if(!is_null($name)) $query->where('category.name',$name);
            })
            ->paginate(9);


        return view('productInclude', compact('products'));

    }

   function case_two(Request $request,$sex)
    {
        $name = $request->input('name');
        $products = DB::table('product')
            ->join('category', 'category.id', '=', 'product.category_id')
            ->join('gallery', 'product.id', '=', 'gallery.product_id')
            ->select('product.name', 'gallery.path', 'product.id', 'product.price', 'product.brand','category.type')
            ->where('product.price', ">", 25)
            ->where('product.price','<=',50)
            ->where('category.type',"=",$sex)
            ->where(function($query) use($name)
            {
                if(!is_null($name)) $query->where('category.name',$name);
            })
            ->paginate(9);

        if($request->ajax())             return view('productInclude', compact('products'))->render();

        return view('productInclude', compact('products'));

    }

    function case_three(Request $request,$sex)
    {
        $name = $request->input('name');
        $products = DB::table('product')
            ->join('category', 'category.id', '=', 'product.category_id')
            ->join('gallery', 'product.id', '=', 'gallery.product_id')
            ->select('product.name', 'gallery.path', 'product.id', 'product.price', 'product.brand','category.type')
            ->where('product.price', ">", 50)
            ->where('product.price','<=',100)
            ->where('category.type',"=",$sex)
            ->where(function($query) use($name)
            {
                if(!is_null($name)) $query->where('category.name',$name);
            })
            ->paginate(9);

        if($request->ajax())             return view('productInclude', compact('products'))->render();

        return view('productInclude', compact('products'));

    }

    function case_four(Request $request,$sex)
    {
        $name = $request->input('name');
        $products = DB::table('product')
            ->join('category', 'category.id', '=', 'product.category_id')
            ->join('gallery', 'product.id', '=', 'gallery.product_id')
            ->select('product.name', 'gallery.path', 'product.id', 'product.price', 'product.brand','category.type')
            ->where('product.price', ">", 100)
            ->where('category.type',"=",$sex)
            ->where(function($query) use($name)
            {
                if(!is_null($name)) $query->where('category.name',$name);
            })
            ->paginate(9);

        if($request->ajax())             return view('productInclude', compact('products'))->render();

        return view('productInclude', compact('products'));

    }
}
