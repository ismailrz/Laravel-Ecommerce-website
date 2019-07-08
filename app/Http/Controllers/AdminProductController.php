<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Product_Image;
use Image;
class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::OrderBy('id','desc')->get();
        return view('admin.pages.product.index')->with('products',$product);
    }


    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.pages.product.edit')->with('product',$product);
    }


    public function create()
    {
        return view('admin.pages.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|max:150',
            'description'     => 'required',
            'price'             => 'required|numeric',
            'quantity'             => 'required|numeric',
        ]);

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


        //ProductImage Model insert  single image

        // if ($request->hasFile('product_image')) {
        //   //insert that image
        //   $image = $request->file('product_image');
        //   $img = time() . '.'. $image->getClientOriginalExtension();
        //   $location = public_path('images/products/' .$img);
        //   Image::make($image)->save($location);
        //
        //   $product_image = new ProductImage;
        //   $product_image->product_id = $product->id;
        //   $product_image->image = $img;
        //   $product_image->save();
        // }

        // Multiple Image Insert into Database

        if (count($request->image) > 0) {
            foreach ($request->image as $image) {

                //insert that image
                //$image = $request->file('product_image');

                // Insert into storage
                $img = time() . '.'. $image->getClientOriginalExtension();
                $location = public_path('images/products/' .$img);
                Image::make($image)->save($location);


                  //Insert into table
                $product_image = new Product_Image;

                $product_image->product_id = $product->id;
                $product_image->image = $img;
                $product_image->save();

            }
        }

        return redirect()->route('admin.product');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'         => 'required|max:150',
            'description'     => 'required',
            'price'             => 'required|numeric',
            'quantity'             => 'required|numeric',
        ]);

        $product = Product::find($id);

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;


        $product->slug = str_slug($product->title);
        $product->category_id = 1;
        $product->brand_id = 1;
        $product->admin_id = 1;
        $product->save();


        //ProductImage Model insert  single image

        // if ($request->hasFile('product_image')) {
        //   //insert that image
        //   $image = $request->file('product_image');
        //   $img = time() . '.'. $image->getClientOriginalExtension();
        //   $location = public_path('images/products/' .$img);
        //   Image::make($image)->save($location);
        //
        //   $product_image = new ProductImage;
        //   $product_image->product_id = $product->id;
        //   $product_image->image = $img;
        //   $product_image->save();
        // }

        // Multiple Image Insert into Database

        if (count($request->image) > 0) {
            foreach ($request->image as $image) {

                //insert that image
                //$image = $request->file('product_image');

                // Insert into storage
                $img = time() . '.'. $image->getClientOriginalExtension();
                $location = public_path('images/products/' .$img);
                Image::make($image)->save($location);


                  //Insert into table
                $product_image = new Product_Image;

                $product_image->product_id = $product->id;
                $product_image->image = $img;
                $product_image->save();

            }
        }

        return redirect()->route('admin.product');
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $product = Product::find($id);

        if(!is_null($product)){
        $product->delete();
    }
    Session()->flash('success','Product has deleted successfully!!');
    return back();
  }
}
