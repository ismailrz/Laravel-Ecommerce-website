@extends('BackEnd.layouts.master')

@section('content')
<div class="main-panel">
  <div class="content-wrapper">

    <div class="card">
      <div class="card-header">
        <p>Edit Brand</p>
      </div>
      <div class="card-body">
        <form action="{{ Route('admin.brand.update',$brand->id)}}" method="post" enctype="multipart/form-data">

          @csrf

          @include('BackEnd.partials.message')

          <div class="form-group">
            <label for="exampleOfName">Name</label>
            <input type="text" class="form-control" id="exampleOfName"name="name" value="{{$brand->name}}" aria-describedby="emailHelp" placeholder="Enter title">
          </div>
          <div class="form-group">
            <label for="exampeOfDescription">description</label>
            <textarea name="description" class="form-control" rows="8" placeholder="description" cols="80">{{$brand->description}}</textarea>
          </div>
              <div class="form-group">
                <label for="exampleInputImage">Brand Old Image</label> <br>
                <img src="{{ asset('Images/brands/'.$brand->image)}}" alt="Image" width="100"> <br>

                <label for="exampleInputImage">Brand new Image (Optional)</label><br>
                <input type="file" class="form-control" id="exampleInputImage" name="image" >
              </div>
          <button type="submit" class="btn btn-primary">Update Brand</button>
        </form>
      </div>

    </div>

  </div>
</div>
<!-- main-panel ends -->
@endsection
