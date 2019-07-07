@extends('admin.layouts.master')

@section('content')
<div class="main-panel">
  <div class="content-wrapper">

    <div class="card">
      <div class="card-header">
        <p>Add Product</p>
      </div>
      <div class="card-body">
        <form action="{{ Route('admin.product.store')}}" method="post" enctype="multipart/form-data">

          {{ csrf_field() }}
          <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" class="form-control" id="exampleInputEmail1"name="title" aria-describedby="emailHelp" placeholder="Enter title">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">description</label>
            <textarea name="description" class="form-control" rows="8" placeholder="description" cols="80"></textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Price</label>
            <input type="number" class="form-control" id="exampleInputEmail1"name="price" aria-describedby="emailHelp" placeholder="Enter price">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Quantity</label>
            <input type="number" class="form-control" id="exampleInputEmail1"name="quantity" aria-describedby="emailHelp" placeholder="Enter quantity">
          </div>


              <div class="form-group">
                <label for="exampleInputImage">Product Image</label>
                <div class="row">
                  <div class="col-md-4">
                <input type="file" class="form-control" id="exampleInputImage" name="image" >
                <!-- <input type="file" class="form-control" id="exampleInputImage" name="image[]" >
                <input type="file" class="form-control" id="exampleInputImage" name="image[]" >
                <input type="file" class="form-control" id="exampleInputImage" name="image[]" >
                <input type="file" class="form-control" id="exampleInputImage" name="image[]" > -->
              </div>
            </div>

          </div>
          <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
      </div>

    </div>

  </div>
</div>
<!-- main-panel ends -->
@endsection
