<?php


namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product_Image;
use Image;
use File;
class CategoriesController extends Controller
{

    public function index()
    {
      $categories = Category::OrderBy('id','desc')->get();
      return view('BackEnd.Pages.Categories.index', compact('categories'));
    }
    public function create()
    {
      $main_categories = Category::OrderBy('id','desc')->where('parent_id', NULL)->get();
      return view('BackEnd.Pages.Categories.create', compact('main_categories'));
    }


    public function store(Request $request)
    {
       $this->validate($request,[

          'name' => 'required',
          'description' =>'required',
          'image' => 'nullable | image',
        ],
        [
          'name.required' =>'Please provide a category name',
          'image.image' => 'Please provide a valid image with .jpg, png, jpeg, gif  extension..',

        ]);

        //categoryImage Model insert  single image

        if ($request->hasFile('image')) {
          //insert that image
          $image = $request->file('image');
          $img = time() . '.'. $image->getClientOriginalExtension();
          $location = public_path('images/categories/' .$img);
          Image::make($image)->save($location);

          $categories = new Category;
          $categories->name = $request->name;
          $categories->description = $request->description;
          $categories->parent_id = $request->parent_id;
          $categories->image = $img;
          $categories->save();
        }
        Session()->flash('success','A new Category has added successfullY!!');
        return redirect()->Route('admin.categories');
    }


    public function edit($id)
    {
      $main_categories = Category::OrderBy('id','desc')->where('parent_id', NULL)->get();

        $category = Category::find($id);

        if(!is_null($category)){
          return view('BackEnd.pages.categories.edit',compact('main_categories','category'));

        }
        return redirect()->Route('admin.categories');
    }

    public function update(Request $request, $id)
    {
       $this->validate($request,[

          'name' => 'required',
          'description' =>'required',
          'image' => 'nullable | image',
        ],
        [
          'name.required' =>'Please provide a category name',
          'image.image' => 'Please provide a valid image with .jpg, png, jpeg, gif  extension..',

        ]);

        //categoryImage Model insert  single image

        if ($request->hasFile('image')) {
          //insert that image

          $categories =Category::find($id);
          if(file::Exists('images/categories/'.$categories->image)){
            file::delete('images/categories/'.$categories->image);
          }
          $image = $request->file('image');
          $img = time() . '.'. $image->getClientOriginalExtension();
          $location = public_path('images/categories/' .$img);
          Image::make($image)->save($location);

          $categories->name = $request->name;
          $categories->description = $request->description;
          $categories->parent_id = $request->parent_id;
          $categories->image = $img;

          $categories->save();
        }
        Session()->flash('success','Category has updated successfully!!');
        return redirect()->Route('admin.categories');
    }


    public function delete($id)
    {
        $category = Category::find($id);

        if(!is_null($category)){

          if($category->parent_id == NULL){
            $sub_categories = Category::OrderBy('id','desc')->where('parent_id', $category->parent_id)->get();

            foreach ($sub_categories as $sub) {
              if(file::Exists('images/categories/'.$sub->image)){
                file::delete('images/categories/'.$sub->image);
              }
              $sub->delete();
            }

          }
          if(file::Exists('images/categories/'.$category->image)){
            file::delete('images/categories/'.$category->image);
    }
    $category->delete();

    Session()->flash('success','Category has deleted successfully!!');
    return back();
  }
}

}
