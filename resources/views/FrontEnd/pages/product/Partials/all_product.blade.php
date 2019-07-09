<div class="row">
  <?php foreach ($products as $product): ?>

    <div class="col-md-4">
      <div class="card" >
      <!-- <img class="card-img-top feature-img" src="{{asset('Images/Products/'.'samsung.png')}}" alt="Card image"> -->

        <?php $i =  1; ?>
        <?php foreach ($product->images as $image): ?>
          <?php if ($i>0): ?>
            <img class="card-img-top feature-img" src="{{asset('Images/Products/'.$image->image)}}" alt="Card image">

          <?php endif; ?>

          <?php $i--; ?>
        <?php endforeach; ?>


        <div class="card-body">
          <h4 class="card-title">{{$product->title}}</h4>
          <p class="card-text">{{$product->price}} Taka.</p>
          <a href="#" class="btn btn-outline-warning">Add to cart</a>
        </div>
        </div>
    </div>
  <?php endforeach; ?>
  <div class=" mt-4 pagination">
    {{ $products->links() }}
  </div>
</div>
