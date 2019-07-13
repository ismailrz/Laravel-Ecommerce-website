@extends('FrontEnd.pages.users.master')

@section('sub-content')

    <div class="container">
      <h2>Welcome {{$user->first_name.' '.$user->last_name}}</h2>
      <p>You can change your Profile..</p>
        <hr>

        <div class="row">
          <div class="col-md">
            <div class="card card-body mt-2 pointer" onclick="location.href = '{{Route('user.profile')}}'">
              <h2 class="" style="color: gray">Update Profile</h2>
            </div>
          </div>
        </div>
    </div>

@endsection
