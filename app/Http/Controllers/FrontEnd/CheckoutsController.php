<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Order;
use App\Models\Cart;
use Auth;
class CheckoutsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $payments = Payment::orderBy('priority','asc')->get();
        return view('FrontEnd.pages.checkouts',compact('payments'));
    }


    public function store(Request $request)
    {
        $this->validate($request,[
          'name' => 'required',
          'mobile_no' => 'required',
          'shipping_address' => 'required',
          'payment_method_id' => 'required'
        ]);


        $order = new Order();
        // transaction id is given or note
        if ($request->payment_method_id != "cash_in") {
          if($request->transaction_id == Null || empty($request->transaction_id)){
            Session()->flash('Sticky_error','Please give transaction id for your payment !!');
            return back();
          }
        }

        $order->name = $request->name;
        $order->email = $request->email;
        $order->mobile_no = $request->mobile_no;
        $order->shipping_address = $request->shipping_address;
        $order->message = $request->message;
        $order->transaction_id = $request->transaction_id;
        $order->ip_address = request()->ip();
        if (Auth::check()) {
          $order->user_id = Auth::id();
        }
        $order->payment_id = $payment_id  = Payment::where('short_name',$request->payment_method_id)->first()->id;
        $order->save();

        foreach (Cart::totalICarts() as $cart) {
          $cart->order_id = $order->id;
          $cart->save();
        }

        Session()->flash('success','Your order has taken successfully !! Please wait admin will soon confirm it..');
        return redirect()->route('index');

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
