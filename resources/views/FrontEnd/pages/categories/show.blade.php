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
                    <h3> All Products in <span class="badge badge-info">{{$category->name}}</span>

                      <?php
                      $products = $category->products()->paginate(5);
                       ?>

                     </h3>
                      @if($products->count()>0)
                         @include('FrontEnd.pages.product.partials.all_product')
                       @else
                        <div class="alert alert-warning"> Product Not Found !! </div>
                         @endif


                  </div>
                  <div class="wedget">

                  </div>
                </div>



            </div>

          </div>
@endsection
