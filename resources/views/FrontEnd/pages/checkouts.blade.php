@extends('FrontEnd.layouts.master')


@section('content')

    <div class=" container mt-2">
      <div class="card card-body">
          <h2>Confirm Items</h2>
          <hr>
            <div class="row">
              <div class="col-md-7 border-right">
            <?php foreach (App\Models\Cart::totalCarts() as $cart): ?>
              <p>
                {{$cart->product->title}} --- {{$cart->product_quantity}} items--- {{$cart->product->price}} Taka
              </p>
            <?php endforeach; ?>
            <a href="{{Route('carts')}}">Change cart items</a>
          </div>
          <div class="col-md-5">
            <?php $Total_price = 0; ?>
            <?php foreach (App\Models\Cart::totalCarts() as $cart): ?>
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
        <form method="POST" action="{{ route('checkouts.store') }}">
            @csrf

            <div class="form-group row">
                <label for="Receiver Name" class="col-md-4 col-form-label text-md-right">{{ __(' Receiver Name') }}</label>

                <div class="col-md-6">
                    <input id="Receiver Name" type="text" class="form-control @error('Receiver Name') is-invalid @enderror" name="name" value="{{ Auth::check() ? Auth::user()->first_name.' '.Auth::user()->last_name : '' }}" required autocomplete="Receiver Name" autofocus>

                    @error('name')
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
                <label for="message" class="col-md-4 col-form-label text-md-right">{{ __('Additional Message (Optional)') }}</label>

                <div class="col-md-6">
                    <textarea id="message" class="form-control @error('message') is-invalid @enderror" name="message"    autocomplete="message"></textarea>

                    @error('message')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="payment_method" class="col-md-4 col-form-label text-md-right">{{ __('Payment By') }}</label>

                <div class="col-md-6">
                    <select class="form-control" name="payment_method_id" required id="payments">
                      <option value="">Please select your payment method </option>
                      <?php foreach ($payments as $payment): ?>
                        <option value="{{$payment->short_name}}">{{$payment->name}}</option>
                      <?php endforeach; ?>
                    </select>

                    @foreach($payments as $payment)

                        @if ($payment->short_name == "cash_in")
                          <div id="payments_{{$payment->short_name}}" class=" alert alert-success mt-2 text-center hidden">
                            <h3>
                              For cash in there is nothing necessary. just click finish order.
                              <br>
                              <small> you will get your Product in two or three bussiness days.</small>
                            </h3>
                          </div>
                          @else
                                <div id="payments_{{$payment->short_name}}" class="alert alert-success text-center mt-2 hidden">
                                  <h3>{{ $payment->name}} Payment  </h3>
                                  <p>
                                    <strong>{{$payment->name}} No : {{$payment->no}}</strong>
                                    <br>
                                    <strong>Account Type : {{$payment->type}}</strong>
                                  </p>
                                  <div class="alert alert-success">
                                    Please send the above money to this {{$payment->name}} No : {{$payment->no}} and write your transaction code below there..
                                  </div>
                                </div>
                        @endif

                    @endforeach
                    <input type="text" name="transaction_id" id="transaction_id"  class="form-control hidden" placeholder="Enter transaction code">

                      </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Order Now') }}
                        </button>
                    </div>
                </div>
            </div>

        </form>
      </div>

@endsection


@section('scripts')
<script type="text/javascript">
  $("#payments").change(function(){

     $payment_method = $("#payments").val();

    if ($payment_method == "") {
      $("#payments_cash_in").addClass('hidden');
      $("#payments_Bkash").addClass('hidden');
      $("#payments_Rocket").addClass('hidden');
      $("#transaction_id").addClass('hidden');
    }
    if ($payment_method == "cash_in") {
      $("#payments_cash_in").removeClass('hidden');
      $("#payments_Bkash").addClass('hidden');
      $("#payments_Rocket").addClass('hidden');
      $("#transaction_id").addClass('hidden');
    }
    else if ($payment_method == "Bkash") {
      $("#payments_Bkash").removeClass('hidden');
      $("#payments_Rocket").addClass('hidden');
      $("#payments_cash_in").addClass('hidden');
      $("#transaction_id").removeClass('hidden');

    }
    else if ($payment_method == "Rocket") {
      $("#payments_Rocket").removeClass('hidden');
      $("#payments_Bkash").addClass('hidden');
      $("#payments_cash_in").addClass('hidden');
      $("#transaction_id").removeClass('hidden');
    }

  })
</script>

@endsection
