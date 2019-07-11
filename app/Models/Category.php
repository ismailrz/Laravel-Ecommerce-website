<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

  public function parent()
  {
    // code...
    return $this->belongsTo(Category::class, 'parent_id');
  //  return $this->hasMany(Category::class);
  }
  public function products()
  {
    // code...
    return $this->hasMany(Product::class);
  //  return $this->hasMany(Category::class);
  }


  public function ParentOrNotCateogry($parent_id, $child_id)
  {
    $categories = Category::where('id',$child_id)->where('parent_id',$parent_id)->get();

    if(!is_null($categories)){
      return true;
    }else{
      return false;
    }
  }
}
