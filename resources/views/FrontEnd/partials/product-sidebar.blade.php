<div class="list-group">


  <?php foreach (App\Models\Category::orderBy('name','asc')->where('parent_id', NULL)->get() as $parent): ?>
    <a href="#collapseExample-{{$parent->id}}"data-toggle="collapse" class="list-group-item list-group-item-action list-group-item-success" >
      <img src="{{asset('Images/categories/'.$parent->image)}}" alt="Image" width="50">
      {{ $parent->name}}
    </a>
    <div class="collapse" id="collapseExample-{{$parent->id}}">
      <div class="card card-body">
        <?php foreach (App\Models\Category::orderBy('name','asc')->where('parent_id', $parent->id)->get() as $child): ?>
          <a href="#collapseExample-{{$parent->id}}"data-toggle="collapse" class="list-group-item list-group-item-action list-group-item-success" >
            <img src="{{asset('Images/categories/'.$child->image)}}" alt="Image" width="30">
            {{ $child->name}}
          </a>
        <?php endforeach; ?>
   </div>
    </div>
  <?php endforeach; ?>
</div>
