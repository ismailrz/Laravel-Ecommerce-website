<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product_Image;
class Product extends Model
{

    public function images()
    {
      //return $this->hasMany('App\Models\Product_Image');
      return $this->hasMany(Product_Image::class);
    }
}
