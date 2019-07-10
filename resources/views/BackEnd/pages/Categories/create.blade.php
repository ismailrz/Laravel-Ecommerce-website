@extends('BackEnd.layouts.master')

@section('content')
<div class="main-panel">
  <div class="content-wrapper">

    <div class="card">
      <div class="card-header">
        <p>Add Category</p>
      </div>
      <div class="card-body">
        <form action="{{ Route('admin.category.store')}}" method="post" enctype="multipart/form-data">

          @csrf

          @include('BackEnd.partials.message')

          <div class="form-group">
            <label for="exampleOfName">Name</label>
            <input type="text" class="form-control" id="exampleOfName"name="name" aria-describedby="emailHelp" placeholder="Enter title">
          </div>
          <div class="form-group">
            <label for="exampeOfDescription">description</label>
            <textarea name="description" class="form-control" rows="8" placeholder="description" cols="80"></textarea>
          </div>
          <div class="form-group">
            <label for="exampeOfDescription">Parent Category</label>
            <select  class="form-control" name ="parent_id">
              <option value="">Please select a primary Category</option>
              <?php foreach ($main_categories as $category): ?>
                <option value="{{$category->id}}">{{$category->name}}</option>
              <?php endforeach; ?>

            </select>
            </div>

              <div class="form-group">
                <label for="exampleInputImage"> Image</label>
                <input type="file" class="form-control" id="exampleInputImage" name="image" >
              </div>
          <button type="submit" class="btn btn-primary">Add Category</button>
        </form>
      </div>

    </div>

  </div>
</div>
<!-- main-panel ends -->
@endsection
