<?php

namespace App\Http\Controllers;

use App\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class checkOutController extends Controller
{
    function ciccio(){

        $id= Auth::user()->getAuthIdentifier();


        $users= DB::table('users')
            ->select('users.name', 'users.email', 'users.phone')
            ->where('users.id','=',$id)
            ->get();



        $addresses= DB::table('address')
            ->join('users','address.user_id','=', 'users.id')
            ->select('address.street', 'address.city', 'address.cap', 'address.province')
            ->where('users.id','=',$id)
            ->get();

        $cards=DB::table('payment_method')
            ->select('payment_method.card_number')
            ->where('user_id', "=", $id)
            ->get();

        return view('/checkout', compact('users','addresses','cards'));

    }

}
