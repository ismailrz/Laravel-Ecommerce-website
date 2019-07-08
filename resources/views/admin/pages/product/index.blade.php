@extends('admin.layouts.master')

@section('content')
<div class="main-panel">
  <div class="content-wrapper">

    <div class="card">
      <div class="card-header">
        <p>Manage Product</p>
      </div>
      <div class="card-body">
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
            </td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        <?php endforeach; ?>
      </table>
      </div>

    </div>

  </div>
</div>
<!-- main-panel ends -->
@endsection
