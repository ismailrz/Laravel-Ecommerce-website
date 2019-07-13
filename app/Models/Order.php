<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    public $filable = [
      'user_id','ip_address','name','mobile_no','shipping_address','email','message','is_paid','is_completed','is_seen_by_admin'

    ];

    public function user()
    {
      return $this->belongsTo(User::class);
    }
    public function cart()
    {
      return $this->belongsTo(Cart::class);
    }
}
