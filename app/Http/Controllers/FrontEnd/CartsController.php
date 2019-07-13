<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\order;
use Auth;
class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $this->validate($request,[
          'product_id' =>'required'
        ],
      [
        'product_id.required' => 'Please give a product'
      ]);

      if(Auth::check()){
        $cart = Cart::Where('user_id',Auth::id())
                      ->Where('product_id',$request->product_id)
                      ->first();
      }else {
        $cart = Cart::Where('ip_address',request()->ip())
                      ->Where('product_id',$request->product_id)
                      ->first();
      }

        if(!is_null($cart)){
            $cart->increment('product_quantity');
        }else{
          $cart = new Cart;
          if(Auth::check()){
            $cart->user_id = Auth::id();
          }
          $cart->ip_address = request()->ip();
          $cart->product_id = $request->product_id;
          $cart->save();
        }


        Session()->flash('success','Product has added to cart !!');
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
        //
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
