@extends('BackEnd.layouts.master')

@section('content')
<div class="main-panel">
  <div class="content-wrapper">

    <div class="card">
      <div class="card-header">
        <p>Edit Category</p>
      </div>
      <div class="card-body">
        <form action="{{ Route('admin.category.update',$category->id)}}" method="post" enctype="multipart/form-data">

          @csrf

          @include('BackEnd.partials.message')

          <div class="form-group">
            <label for="exampleOfName">Name</label>
            <input type="text" class="form-control" id="exampleOfName"name="name" value="{{$category->name}}" aria-describedby="emailHelp" placeholder="Enter title">
          </div>
          <div class="form-group">
            <label for="exampeOfDescription">description</label>
            <textarea name="description" class="form-control" rows="8" placeholder="description" cols="80">{{$category->description}}</textarea>
          </div>
          <div class="form-group">
            <label for="exampeOfDescription">Parent Category (Optional)</label>

            <select  class="form-control" name ="parent_id">
              <option value="">Please select a primary Category</option>
              <?php foreach ($main_categories as $main_category): ?>
                <option value="{{$main_category->id}}" {{ $main_category->id  ==  $category->parent_id ? 'selected': ''}}>{{$main_category->name}}</option>
              <?php endforeach; ?>
            </select>
            </div>

              <div class="form-group">
                <label for="exampleInputImage">Category Old Image</label> <br>
                <img src="{{ asset('Images/categories/'.$category->image)}}" alt="Image" width="100"> <br>

                <label for="exampleInputImage">Category new Image (Optional)</label><br>
                <input type="file" class="form-control" id="exampleInputImage" name="image" >
              </div>
          <button type="submit" class="btn btn-primary">Update Category</button>
        </form>
      </div>

    </div>

  </div>
</div>
<!-- main-panel ends -->
@endsection
