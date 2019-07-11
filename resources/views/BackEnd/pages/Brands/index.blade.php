@extends('BackEnd.layouts.master')

@section('content')
<div class="main-panel">
  <div class="content-wrapper">

    <div class="card">
      <div class="card-header">
        <p>Manage Brands</p>
      </div>
      <div class="card-body">
        @include('BackEnd.partials.message')

      <table class="table table-response table-hover table-striped">
        <tr>
          <th>#</th>
          <th>Brand Name</th>
          <th>Brand Imge</th>
          <th>Action</th>
        </tr>

        <?php foreach ($brands as $brand): ?>
          <tr>
            <td>#</td>
            <td>{{$brand->name}}</td>
            <td>
              <img src="{{ asset('Images/brands/'.$brand->image)}}" alt="Image" width="100">
            </td>
            <td>
              <a href="{{Route('admin.brand.edit', $brand->id )}}" class="btn btn-success">Edit</a>
              <a href="#deleteModal{{$brand->id}}" data-toggle = "modal" class="btn btn-danger">Delete</a>



              <!-- Modal  Delete Conformation-->
              <div class="modal fade" id="deleteModal{{$brand->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Are you sure to Delete? </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form class="form-control" action="{{Route('admin.brand.delete',$brand->id)}}" method="post">
                        {{csrf_field() }}
                        <button type="submit" class="btn btn-danger">Delete</button>

                      </form>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
      </div>

    </div>

  </div>
</div>
<!-- main-panel ends -->
@endsection
