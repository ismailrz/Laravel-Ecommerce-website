<?php

namespace App\Models;
use Auth;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
  public $filable = [
    'user_id','ip_address','product_id','order_id','product_quantity'

  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }
  public function order()
  {
    return $this->belongsTo(Order::class);
  }
  public function product()
  {
    return $this->belongsTo(Product::class);
  }

  /**
  * total items of a cart
  * retrun integer total items
  */
  public static function totalCarts()
  {
    if(Auth::check()){
      $carts = Cart::orWhere('user_id',Auth::id())
                    ->orWhere('ip_address',Request()->ip())
                    ->get();
    }else {
      $carts = Cart::orWhere('ip_address',Request()->ip())->get();
    }
      return $carts;
  }
  /**
  * total items of a cart
  * retrun integer total items
  */
  public static function totalItems()
  {
    if(Auth::check()){
      $carts = Cart::orWhere('user_id',Auth::id())
                    ->orWhere('ip_address',Request()->ip())
                    ->get();
    }else {
      $carts = Cart::orWhere('ip_address',Request()->ip())->get();
    }
    $total_item = 0;
    foreach ($carts as $cart) {
      $total_item += $cart->product_quantity;
    }
    return $total_item;
  }
}
