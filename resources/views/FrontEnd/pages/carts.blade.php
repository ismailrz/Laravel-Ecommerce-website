@extends('FrontEnd.layouts.master')


@section('content')

    <div class="container mt-3">
    @if(App\Models\Cart::totalItems()>0)
    <h2>My Cart Items</h2>
    <table class="table table-bordered table-stripe table-Response table-hover">
      <thead>
        <tr>
          <th>No.</th>
          <th>Product Title</th>
          <th>Product Image</th>
          <th>Product Quantity</th>
          <th>Unit Price</th>
          <th>Sub Total Price</th>
          <th>Delete</th>
        </tr>
      </thead>

      <tbody>
        <?php $loop = 1; $Total_price = 0; ?>
        <?php foreach (App\Models\Cart::totalCarts() as $cart): ?>
          <tr>
            <td>{{$loop++}}</td>
            <td>
            <a href="{{Route('product.show',$cart->product->slug)}}">{{$cart->product->title}}</td></a>
            </td>
            <td>
              @if($cart->product->images->count()>0)
                <img src="{{asset('Images/Products/'.$cart->product->images->first()->image)}}" width="50">

              @endif


            </td>
            <td>
              <form class="form-inline" action="{{ Route('carts.update',$cart->id)}}" method="post">
                @csrf
                <input type="number" name="product_quantity" class="form-control" value="{{$cart->product_quantity}}">
                <button type="submit" class="btn btn-success ml-1">Update</button>
              </form>

            </td>
            <td> {{ $cart->product->price}}</td>
            <td>
              <?php   $Total_price+=$cart->product->price * $cart->product_quantity; ?>
              {{$cart->product->price * $cart->product_quantity}}
            </td>
            <td>
              <form class="form-inline" action="{{ Route('carts.delete',$cart->id)}}" method="post">
                @csrf
                <input type="hidden" name="product_quantity" class="form-control">
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>

            </td>
          </tr>
        <?php endforeach; ?>

        <tr style="background: gray">
          <td colspan="4"></td>
          <td><strong>Total amount</td></strong>
          <td colspan="2"><strong>{{$Total_price}} Taka.</td></strong>
        </tr>
      </tbody>
    </table>
    <div class="float-right">
      <a href="{{Route('products')}}" class="btn btn-info btn-lg">Continue Shopping...</a>
      <a href="{{Route('checkouts')}}" class="btn btn-warning btn-lg">Checkout</a>
    </div>
    @else
        <div class="alert alert-warning">
          <strong>There is no item in your cart !!</strong>
          <a href="{{Route('products')}}" class="btn btn-info btn-lg">Continue Shopping...</a>
        </div>
    @endif
    </div>
@endsection
