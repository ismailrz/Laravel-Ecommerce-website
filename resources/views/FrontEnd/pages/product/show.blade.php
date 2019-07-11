@extends('FrontEnd.layouts.master')

@section('title')
{{ $products->title }} | Laravel Ecommerce Site!
@endsection
@section('content')
          <!-- Side bar start -->

          <div class="container margin-top-20">
            <div class="row">
              <div class="col-md-4">

              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner carousel-background">

                  <?php $i=1; ?>
                  <?php foreach ($products->images as $image): ?>
                    <div class="carousel-background carousel-item  {{$i == 1? 'active':''}} ">
                      <img class="d-block w-100" src="{{asset('Images/Products/'.$image->image)}}" alt="First slide">
                    </div>
                    <?php $i++; ?>
                  <?php endforeach; ?>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
              </div>
                <div class="mt-4">
                  <p>  Category <span class="badge badge-info"> {{$products->category->name}}</span>  </p>
                  <p>  Brand <span class="badge badge-info"> {{$products->brand->name}}</span>  </p>
                </div>
            </div>

              <div class="col-md-8">
                <div class="wedget">
                  <h3>{{$products->title}} </h3>
                  <h3>{{$products->price}} Taka.
                    <span class="badge badge-primary">
                      {{$products->quantity <1 ? ' Not available!' : $products->quantity." item in stock!"}}
                    </span>
                   </h3>
                  <hr>
                  <div class="product-description">
                    {{$products->description}}
                  </div>

                </div>

              </div>
          </div>
@endsection
