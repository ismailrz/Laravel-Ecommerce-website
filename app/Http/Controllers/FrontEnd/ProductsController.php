<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\controller;
use Illuminate\Http\Request;
use App\Models\Product;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     return view('FrontEnd.pages.index');
    // }
    public function contact()
    {
        return view('FrontEnd.pages.contact');
    }
    public function index()
    {

      $product = Product::OrderBy('id','desc')->paginate(5);
        return view('FrontEnd.pages.product.index')->with('products',$product);

      //
      // $image = Image::OrderBy('id','desc')->get();
      //   return view('pages.product.index')->with('images',$image);


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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
      $products = Product::Where('slug', $slug)->first();
      if(!is_null($products)){
        return view('FrontEnd.pages.product.show',compact('products'));
      }
      Session()->flash('errors', 'Sorry !! There is no Product for this URL!');
        return redirect()->Route('Products');
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
