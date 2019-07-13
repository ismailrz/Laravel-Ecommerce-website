@extends('FrontEnd.layouts.master')

@section('content')

    <div class="container mt-2 ">
      <div class="row">
        <div class="col-md-4">
          <div class="list-group">
            <a href="#" class="list-group-item {{Route::is('') ? 'active' : ''}}">
              <img src="{{asset('Images\Defaults\ismail.jpg')}}" class="img rounded-circle" width="100">

            </a>
            <a href="{{Route('user.dashboard')}}"class="list-group-item {{Route::is('user.dashboard') ? 'active' : ''}}" >dashboard</a>
            <a href="{{Route('user.profile')}}"class="list-group-item {{Route::is('user.profile') ? 'active' : ''}}">Update Profile</a>
            <a href=""class="list-group-item {{Route::is('') ? 'active' : ''}}">Log Out</a>
          </div>

        </div>
        <div class="col-md-8">
          <div class="card card-body">
            @yield('sub-content')

          </div>
        </div>
      </div>
    </div>

@endsection
