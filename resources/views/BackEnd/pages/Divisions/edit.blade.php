@extends('BackEnd.layouts.master')

@section('content')
<div class="main-panel">
  <div class="content-wrapper">

    <div class="card">
      <div class="card-header">
        <p>Edit Division</p>
      </div>
      <div class="card-body">
        <form action="{{ Route('admin.division.update',$division->id)}}" method="post" enctype="multipart/form-data">

          @csrf

          @include('BackEnd.partials.message')

          <div class="form-group">
            <label for="exampleOfName">Name</label>
            <input type="text" class="form-control" id="exampleOfName"name="name" value="{{$division->name}}" aria-describedby="emailHelp" placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label for="exampeOfDescription">Priority</label>
            <input type="text" class="form-control" id="exampleOfName"name="priority" value="{{$division->priority}}" aria-describedby="emailHelp" placeholder="Enter priority">
          </div>
          <button type="submit" class="btn btn-primary">Update Division</button>
        </form>
      </div>

    </div>

  </div>
</div>
<!-- main-panel ends -->
@endsection
