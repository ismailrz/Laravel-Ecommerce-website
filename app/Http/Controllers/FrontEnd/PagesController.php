<?php

namespace App\Http\Controllers\FrontEnd;

 use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {

       $product = Product::OrderBy('id','desc')->paginate(5);
         return view('FrontEnd.pages.index')->with('products',$product);

       //
       // $image = Image::OrderBy('id','desc')->get();
       //   return view('pages.product.index')->with('images',$image);


     }
     public function search(Request $request)
     {
       $search = $request->search;

       $products = Product::orWhere('title', 'like', '%'.$search.'%')
                          ->orWhere('description', 'like', '%'.$search.'%')
                          ->orWhere('slug', 'like', '%'.$search.'%')
                          ->orWhere('price', 'like', '%'.$search.'%')
                          ->orWhere('quantity', 'like', '%'.$search.'%')
                          ->OrderBy('id','desc')
                          ->paginate(5);
         return view('FrontEnd.pages.product.search', compact('search','products'));

     }
    public function contact()
    {
        return view('FrontEnd.pages.contact');
    }
    public function product()
    {

      $product = Product::OrderBy('id','desc')->get();
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
    public function show($id)
    {
        //
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
