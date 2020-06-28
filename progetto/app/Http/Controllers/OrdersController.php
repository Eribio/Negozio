<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

     //   return view('my_orders');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        /* $orders= DB::table('order')
      ->select('order.id','order.total_price')
      ->where('order.user_id','=', Auth::user()->id)
      ->get();
        //$flag=false ;
  foreach($orders as $order){
      $flag =true;
      $ods[$order->id]= DB::table('order_composition')
          ->join('product','product.id','=','order_composition.product_id')
          ->join('order','order.id', '=', 'order_composition.order_id')
          ->join('category','category.id', '=', 'product.category_id')
          ->join('gallery','product.id','=','gallery.product_id')

          ->select('product.name', 'gallery.path' , 'product.id', 'product.price','product.brand'
          )
          ->where('order_id','=',$order->id)
          ->get();*/




        $orders= DB::table('order')
      ->select('order.id','order.total_price')
      ->where('order.user_id','=', Auth::user()->id)
      ->get();
        $flag=false;

     foreach ($orders as $order){

         $flag=true;
        $ods[$order->id]=DB::table('order_composition')
           ->join('product','product.id','=','order_composition.product_id')
           ->join('order','order.id', '=', 'order_composition.order_id')
           ->join('category','category.id', '=', 'product.category_id')
           ->join('gallery','product.id','=','gallery.product_id')
           ->select('product.name', 'gallery.path' , 'product.id', 'product.price','product.brand','order.total_price','order_id')
            ->where('order_id','=',$order->id)
           ->get();

     }

        return view('/my_orders', compact('ods','orders','flag'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
