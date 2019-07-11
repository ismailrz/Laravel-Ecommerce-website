@extends('BackEnd.layouts.master')

@section('content')
<div class="main-panel">
  <div class="content-wrapper">

    <div class="card">
      <div class="card-header">
        <p>Add District</p>
      </div>
      <div class="card-body">
        <form action="{{ Route('admin.district.store')}}" method="post" enctype="multipart/form-data">

          @csrf

          @include('BackEnd.partials.message')

          <div class="form-group">
            <label for="exampleOfName">Name</label>
            <input type="text" class="form-control" id="exampleOfName"name="name" aria-describedby="emailHelp" placeholder="Enter District">
          </div>
          <div class="form-group">
            <label for="division_id">select a division for this district</label>
            <select class="form-control" name="division_id">
              <option value="">Please select a division for this district</option>
              <?php foreach ($divisions as $division): ?>
                <option value="{{ $division->id}}">{{$division->name}}</option>
              <?php endforeach; ?>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Add District</button>
        </form>
      </div>

    </div>

  </div>
</div>
<!-- main-panel ends -->
@endsection
