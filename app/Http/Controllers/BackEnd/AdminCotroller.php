<?php

namespace App\Http\Controllers\BackEnd;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Product_Image;
use Image;
class AdminController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }

}
