@extends('admin.layouts.master')

@section('content')
<div class="main-panel">
  <div class="content-wrapper">

    <div class="card">
      <div class="card-header">
        <p>Manage Product</p>
      </div>
      <div class="card-body">
        @include('admin.partials.message')

      <table class="table table-response table-hover table-striped">
        <tr>
          <th>#</th>
          <th>Title</th>
          <th>Description</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Action</th>
        </tr>

        <?php foreach ($products as $product): ?>
          <tr>
            <td>#</td>
            <td>{{ $product->title}}</td>
            <td>{{ $product->description}}</td>
            <td>{{ $product->quantity}}</td>
            <td>{{ $product->price}}</td>
            <td>
              <a href="{{Route('admin.product.edit', $product->id )}}" class="btn btn-success">Edit</a>
              <a href="#deleteModal{{$product->id}}" data-toggle = "modal" class="btn btn-danger">Delete</a>



              <!-- Modal -->
              <div class="modal fade" id="deleteModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Are you sure to Delete? </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form class="form-control" action="{{Route('admin.product.delete',$product->id)}}" method="post">
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
