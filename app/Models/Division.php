<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
  public function division()
  {
    return $this->hasMany(District::class);
  }
}
