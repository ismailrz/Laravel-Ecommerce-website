<div class="row">
  <?php foreach ($products as $product): ?>

    <div class="col-md-4">
      <div class="card" >
      <!-- <img class="card-img-top feature-img" src="{{asset('Images/Products/'.'samsung.png')}}" alt="Card image"> -->

    
        <?php $i =  1; ?>
        <?php foreach ($product->images as $image): ?>
          <?php if ($i>0): ?>
            <a href="{{Route('product.show',$product->slug)}}"><img class="card-img-top feature-img" src="{{asset('Images/Products/'.$image->image)}}" alt="{{$product->title}}"></a>
          <?php endif; ?>

          <?php $i--; ?>
        <?php endforeach; ?>


        <div class="card-body">
          <a href="{{Route('product.show',$product->slug)}}"><h4 class="card-title">{{$product->title}}</h4></a>
          <a href="{{Route('product.show',$product->slug)}}"><p class="card-text">{{$product->price}} Taka.</p></a>
          <a href="{{Route('product.show',$product->slug)}}"" class="btn btn-outline-warning">Add to cart</a>
        </div>
        </div>
    </div>
  <?php endforeach; ?>
  <div class=" mt-4 pagination">
    {{ $products->links() }}
  </div>
</div>
