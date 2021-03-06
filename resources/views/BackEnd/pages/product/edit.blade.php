@extends('BackEnd.layouts.master')

@section('content')
<div class="main-panel">
  <div class="content-wrapper">

    <div class="card">
      <div class="card-header">
        <p>Edit Product</p>
      </div>
      <div class="card-body">
        <form action="{{ Route('admin.product.update',$product->id)}}" method="post" enctype="multipart/form-data">

          {{ csrf_field() }}

          @include('BackEnd.partials.message')

          <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" class="form-control" id="exampleInputEmail1"name="title" value="{{$product->title}}" aria-describedby="emailHelp" placeholder="Enter title">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">description</label>
            <textarea name="description" class="form-control" rows="8" placeholder="description" cols="80">{{$product->description}}</textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Price</label>
            <input type="number" class="form-control" id="exampleInputEmail1"name="price" value="{{$product->price}}" aria-describedby="emailHelp" placeholder="Enter price">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Quantity</label>
            <input type="number" class="form-control" id="exampleInputEmail1"name="quantity"  value="{{$product->quantity}}" aria-describedby="emailHelp" placeholder="Enter quantity">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">select Category</label>
            <select class="form-control" name="category_id">
              <option value="">Please select category</option>
              <?php foreach (App\Models\Category::orderBy('name','asc')->where('parent_id', NULL)->get() as $parent): ?>
                <option value="{{$parent->id}}"{{$parent->id == $product->category->id ? 'selected' : ''}}>{{$parent->name}}</option>
                <?php foreach (App\Models\Category::orderBy('name','asc')->where('parent_id', $parent->id)->get() as $child): ?>
                  <option value="{{$child->id}}"{{$child->id == $product->category->id ? 'selected' : ''}}>--------->{{$child->name}}</option>
                <?php endforeach; ?>
              <?php endforeach; ?>
            </select>
            </div>
          <div class="form-group">
            <label for="exampleInputEmail1">select Brand</label>
            <select class="form-control" name="brand_id">
              <option value="">Please select brand</option>
              <?php foreach (App\Models\Brand::orderBy('name','asc')->get() as $br): ?>
                <option value="{{$br->id}}"{{$br->id == $product->brand->id ? 'selected' :''}} >{{$br->name}}</option>
              <?php endforeach; ?>
            </select>
            </div>


              <div class="form-group">
                <label for="exampleInputImage">Product Image</label>
                <div class="row">
                  <div class="col-md-4">
                <input type="file" class="form-control" id="exampleInputImage" name="image[]" >
                <input type="file" class="form-control" id="exampleInputImage" name="image[]" >
                <input type="file" class="form-control" id="exampleInputImage" name="image[]" >
                <input type="file" class="form-control" id="exampleInputImage" name="image[]" >
                <input type="file" class="form-control" id="exampleInputImage" name="image[]" >
              </div>
            </div>

          </div>
          <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
      </div>

    </div>

  </div>
</div>
<!-- main-panel ends -->
@endsection
