<?php
namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product_Image;
use Image;
use File;
class BrandsController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth:admin');
  }
  
    public function index()
    {
      $brands = Brand::OrderBy('id','desc')->get();
      return view('BackEnd.Pages.Brands.index', compact('brands'));
    }
    public function create()
    {

      return view('BackEnd.Pages.Brands.create');
    }


    public function store(Request $request)
    {
       $this->validate($request,[

          'name' => 'required',
          'description' =>'required',
          'image' => 'nullable | image',
        ],
        [
          'name.required' =>'Please provide a brand name',
          'image.image' => 'Please provide a valid image with .jpg, png, jpeg, gif  extension..',

        ]);

        //brandImage Model insert  single image

        if ($request->hasFile('image')) {
          //insert that image
          $image = $request->file('image');
          $img = time() . '.'. $image->getClientOriginalExtension();
          $location = public_path('images/brands/' .$img);
          Image::make($image)->save($location);

          $brands = new Brand;
          $brands->name = $request->name;
          $brands->description = $request->description;
          $brands->image = $img;
          $brands->save();
        }
        Session()->flash('success','A new Brand has added successfullY!!');
        return redirect()->Route('admin.brands');
    }


    public function edit($id)
    {
        $brand = Brand::find($id);

        if(!is_null($brand)){
          return view('BackEnd.pages.brands.edit',compact('brand'));

        }
        return redirect()->Route('admin.brands');
    }

    public function update(Request $request, $id)
    {
       $this->validate($request,[

          'name' => 'required',
          'description' => 'required',
          'image' => 'nullable | image',
        ],
        [
          'name.required' =>'Please provide a brand name',
          'image.image' => 'Please provide a valid image with .jpg, png, jpeg, gif  extension..',

        ]);

        //brandImage Model insert  single image

        if ($request->hasFile('image')) {
          //insert that image

          $brands =Brand::find($id);
          if(file::Exists('images/brands/'.$brands->image)){
            file::delete('images/brands/'.$brands->image);
          }
          $image = $request->file('image');
          $img = time() . '.'. $image->getClientOriginalExtension();
          $location = public_path('images/brands/' .$img);
          Image::make($image)->save($location);

          $brands->name = $request->name;
          $brands->description = $request->description;
          $brands->image = $img;

          $brands->save();
        }
        Session()->flash('success','Brand has updated successfully!!');
        return redirect()->Route('admin.brands');
    }


    public function delete($id)
    {
        $brand = Brand::find($id);

        if(!is_null($brand)){

          if(file::Exists('images/brands/'.$brand->image)){
            file::delete('images/brands/'.$brand->image);
    }
    $brand->delete();

    Session()->flash('success','Brand has deleted successfully!!');
    return back();
  }
}

}
