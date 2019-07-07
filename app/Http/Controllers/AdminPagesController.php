<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Image;
class AdminPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function product_create()
    {
        return view('admin.pages.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function product_store(Request $request)
    {
        $product = New Product;

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;


        $product->slug = str_slug($product->title);
        $product->category_id = 1;
        $product->brand_id = 1;
        $product->admin_id = 1;
        $product->save();


        // if($request->hasFile('image')){
        //   //insert image into location
        //
        //  $image = $request->file('image');
        //   $Location_Image = time().'.'.$image->getClientOriginalExtension();
        //   $location = public_path('Images/Products'.$Location_Image);
        //   Image::make($image)->save($location);

          if($request->hasFile('image'))
                  {
                      $image = $request->file('image');
                      $filename = time() . '.'. $image->getClientOriginalExtension();

                      $path = public_path('Images/Products');
                      $imagepath = $request->image->move($path, $filename);
                    //  $post->image = $imagepath;

                //  }
          //insert image into Database

          $product_Image = new Image;
          $product_Image->product_id = $product->id;
          $product_Image->image = $filename ;
          $product_Image->save();

        }

        // if(count($request->image)>0){
        //   foreach ($request->image as $image) {
        //
        //       //insert image into location
        //     //  $image = $request->file('image');
        //
        //       $Location_Image = time().'.'.$image->getClientOriginalExtension();
        //       $location = public_path('Images/Products'.$Location_Image);
        //       Image::make($image)->save($location);
        //       $image->image = $request->image->store('public/images');
        //
        //
        //       $product_Image = new Image;
        //       $product_Image->product_id = $product->id;
        //       $product_Image->image = $Location_Image ;
        //       $product_Image->save();
        //
        //   }
        // }

        return redirect()->Route('admin.product.create');
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
