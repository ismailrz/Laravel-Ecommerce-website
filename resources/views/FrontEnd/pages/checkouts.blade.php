@extends('FrontEnd.layouts.master')


@section('content')

    <div class=" container mt-2">
      <div class="card card-body">
          <h2>Confirm Items</h2>
          <hr>
            <div class="row">
              <div class="col-md-7 border-right">
            <?php foreach (App\Models\Cart::totalICarts() as $cart): ?>
              <p>
                {{$cart->product->title}} --- {{$cart->product_quantity}} items--- {{$cart->product->price}} Taka
              </p>
            <?php endforeach; ?>
            <a href="{{Route('carts')}}">Change cart items</a>
          </div>
          <div class="col-md-5">
            <?php $Total_price = 0; ?>
            <?php foreach (App\Models\Cart::totalICarts() as $cart): ?>
                <?php $Total_price+= $cart->product->price *$cart->product_quantity; ?>

            <?php endforeach; ?>
            <p>Total Price <strong> {{$Total_price}}</strong> Taka</p>
            <p>Total Price with shipping cost  <strong> {{ $Total_price + App\Models\setting::first()->shipping_cost}}</strong> Taka</p>
          </div>
        </div>
      </div>
      <div class="card card-body">
        <h2>Shipping Address</h2>
        <hr>
        <form method="POST" action="{{ route('user.profile.update') }}">
            @csrf

            <div class="form-group row">
                <label for="Receiver Name" class="col-md-4 col-form-label text-md-right">{{ __(' Receiver Name') }}</label>

                <div class="col-md-6">
                    <input id="Receiver Name" type="text" class="form-control @error('Receiver Name') is-invalid @enderror" name="Receiver Name" value="{{ Auth::check() ? Auth::user()->first_name.' '.Auth::user()->last_name : '' }}" required autocomplete="Receiver Name" autofocus>

                    @error('Receiver Name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="mobile_no" class="col-md-4 col-form-label text-md-right">{{ __('Mobile No.') }}</label>

                <div class="col-md-6">
                    <input id="mobile_no" type="text" class="form-control @error('mobile_no') is-invalid @enderror" name="mobile_no" value="{{ Auth::check() ? Auth::user()->mobile_no : '' }}" required autocomplete="mobile_no">

                    @error('mobile_no')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::check() ? Auth::user()->email : '' }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>




            <div class="form-group row">
                <label for="shipping_address" class="col-md-4 col-form-label text-md-right">{{ __('Shipping  Address') }}</label>

                <div class="col-md-6">
                    <textarea id="shipping_address" class="form-control @error('shipping_address') is-invalid @enderror" name="shipping_address"  rows="4" required autocomplete="shipping_address">{{ Auth::check() ? Auth::user()->shipping_address : '' }}</textarea>

                    @error('shipping_address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="payment_method" class="col-md-4 col-form-label text-md-right">{{ __('Payment By') }}</label>

                <div class="col-md-6">
                    <select class="form-control" name="payment_method_id" required>
                      <option value="">Please select your payment method </option>
                      <?php foreach ($payments as $payment): ?>
                        <option value="{{$payment->id}}">{{$payment->name}}</option>
                      <?php endforeach; ?>
                    </select>
                    @error('payment_method')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Order Now') }}
                    </button>
                </div>
            </div>
        </form>
      </div>
    </div>

@endsection
