<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //

    public function products()
    {
      // code...
      return $this->hasMany(Product::class);
    //  return $this->hasMany(Category::class);
    }
}
