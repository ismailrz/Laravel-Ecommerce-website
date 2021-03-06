<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <div class="nav-link">
        <div class="profile-image"> <img src="/images/faces/face4.jpg" alt="image"/> <span class="online-status online"></span> </div>
        <div class="profile-name">
          <p class="name">Richard V.Welsh</p>
          <p class="designation">Manager</p>
          <div class="badge badge-teal mx-auto mt-3">Online</div>
        </div>
      </div>
    </li>
    <li class="nav-item"><a class="nav-link" href="{{Route('admin.index') }}"><img class="menu-icon" src="/images/menu_icons/01.png" ><span class="menu-title">Dashboard</span></a></li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages"> <img class="menu-icon" src="/images/menu_icons/08.png" > <span class="menu-title">Manage Product</span><i class="menu-arrow"></i></a>
      <div class="collapse" id="general-pages">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{Route('admin.product')}}">Manage Product</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{Route('admin.product.create')}}">Create Produt</a></li>
        </ul>
        </div>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#category-pages" aria-expanded="false" aria-controls="general-pages"> <img class="menu-icon" src="/images/menu_icons/08.png" > <span class="menu-title">Manage Categories</span><i class="menu-arrow"></i></a>
      <div class="collapse" id="category-pages">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{Route('admin.categories')}}">Manage Category</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{Route('admin.category.create')}}">Create Category</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#brand-pages" aria-expanded="false" aria-controls="general-pages"> <img class="menu-icon" src="/images/menu_icons/08.png" > <span class="menu-title">Manage Brands</span><i class="menu-arrow"></i></a>
      <div class="collapse" id="brand-pages">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{Route('admin.brands')}}">Manage Brand</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{Route('admin.brand.create')}}">Create Brand</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#division-pages" aria-expanded="false" aria-controls="general-pages"> <img class="menu-icon" src="/images/menu_icons/08.png" > <span class="menu-title">Manage Divisions</span><i class="menu-arrow"></i></a>
      <div class="collapse" id="division-pages">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{Route('admin.divisions')}}">Manage Division</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{Route('admin.division.create')}}">Create Division</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#district-pages" aria-expanded="false" aria-controls="general-pages"> <img class="menu-icon" src="/images/menu_icons/08.png" > <span class="menu-title">Manage Districts</span><i class="menu-arrow"></i></a>
      <div class="collapse" id="district-pages">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{Route('admin.districts')}}">Manage District</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{Route('admin.district.create')}}">Create District</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <form class="form-control ml-3" action="{{Route('admin.logout')}}" method="post">
        @csrf
        <button type="submit" class="btn btn-danger">Log Out</button>
      </form>
    </li>
        </ul>
</nav>
