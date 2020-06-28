<?php

namespace App\Http\Controllers;

use App\PaymentMethod;
use App\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        //return view('/adress', compact('addresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       users::create([
        'street' => $request->input('street'),
          'city' => $request->input('city'),
          'province' => $request->input('province'),
          'cap' => $request->input('cap'),
          'user_id' => Auth::user()->id
       ]);

        return back();



    }

    public function cazzarola(Request $request)
    {
        PaymentMethod::create([
            'type' => 'credit_card',
            'card_number' => $request->input('card_number'),
            'expiry_date' => $request->input('expiry_date'),
            'CVV' => $request->input('CVV'),
            'user_id' => Auth::user()->id
        ]);

        return back();



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *

     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view ('data')->with('user',auth()->user());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate( [
                'name' => ['required', 'string', 'max:255'],
                'email' => 'required| string|email| max:255| unique:users,email,'.auth()->id(),
                'phone' =>[ 'sometimes','nullable','string','max:255'],
                'password' => ['sometimes','nullable', 'string', 'min:8', 'confirmed']

            ]);

        $user = auth()->user();
        $input = $request->except('password','password_confirmation');

        if(! $request->filled('password'))
        {
            $user->fill($input)->save();
             return redirect()->back()->withSuccess('profile updated successfuly!');
        }
        $user->password= bcrypt($request->password);
        $user->fill($input)->save();
        return back()->with('message','profile (and password) updated successfuly!');

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
    function addresses(){

       $addresses=  DB::table('address')

            ->select('address.street', 'address.city', 'address.province', 'address.cap')
           ->where('address.user_id' , '=',  Auth::user()->id)
            ->get();


       return view('/adress', compact('addresses'));
    }

    function cards(){

        $cards=  DB::table('payment_method')

            ->select('payment_method.card_number', 'payment_method.expiry_date', 'payment_method.CVV')
            ->where('payment_method.user_id' , '=',  Auth::user()->id)
            ->get();


        return view('/my_card', compact('cards'));
    }

}
