<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
class CategoriesController extends Controller
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
    public function show($id)
    {
        $category =Category::find($id);

        if(!is_null($category)){
          return view('FrontEnd.pages.categories.show',compact('category'));
        }else{
          Session()->flash('errors','Sorry !! there are no Category for this URL!');
          return redirect('/');
        }
    }


}
