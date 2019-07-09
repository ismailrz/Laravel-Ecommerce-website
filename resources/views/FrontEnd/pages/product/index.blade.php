@extends('FrontEnd.layouts.master')


@section('content')
          <!-- Side bar start -->

          <div class="container margin-top-20">
            <div class="row">
              <div class="col-md-4">
              @include('FrontEnd.partials.product-sidebar')

              </div>

                <div class="col-md-8">
                  <div class="wedget">
                    <h3> All Products</h3>
                    @include('FrontEnd.pages.product.partials.all_product')
                  </div>
                  <div class="wedget">

                  </div>
                </div>



            </div>

          </div>
@endsection
