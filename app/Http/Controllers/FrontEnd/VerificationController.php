<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
class VerificationController extends Controller
{
    //

    public function verify($token)
    {
      $user = User::where('remember_token',$token)->first();
      if(!is_null($user)){
        $user->status = 1;
        $user->remember_token = NULL;
        $user->save();
        Session()->flash('success','you are registered successfully !! Login now.');
        return redirect('login');
      }else{
        Session()->flash('errors','Sorry !! Your token is not match');
        return redirect('/');
      }

    }
}
