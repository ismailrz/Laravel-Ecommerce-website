<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Division;
use App\Models\District;
use Auth;
class UsersController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }
    public function dashboard()
    {
      $user = Auth::user();
      return  view('FrontEnd.pages.users.dashboard',compact('user'));
    }
    public function profile()
    {
      $divisions = Division::OrderBy('priority','asc')->get();
      $districts = District::OrderBy('name','asc')->get();
      $user = Auth::user();
      return  view('FrontEnd.pages.users.profile',compact('user','divisions','districts'));
    }
    public function profileUpdate(Request $request)
    {
        $user = Auth::user();
      $this->validate($request,[
        'first_name' => 'required |string | max:30',
        'first_name' => 'nullable |string |max:15',
        'username' => 'required  |alpha_dash |max:255 |unique:users,username,'.$user->id,
        'email' => 'required |string |email |max:255 |unique:users,email,'.$user->id,
        'division_id' => 'required |numeric',
        'district_id' => 'required |numeric',
        'mobile_no' => 'required |max:11',
        'street_address' => 'required |max:100',
        // 'first_name' => ['required', 'string', 'max:30'],
        // 'first_name' => ['nullable', 'string', 'max:15'],
        // 'username' => ['required', 'string', 'alpha_dash', 'max:255', 'unique:users','username'.$user->id],
        // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users','email'.$user->id],
        // 'division_id' => ['required','numeric'],
        // 'district_id' => ['required','numeric'],
        // 'mobile_no' => ['required','max:11','unique:user','mobile_no'.$user->id],
        // 'street_address' => ['required','max:100'],
      ]);

      $user->first_name = $request->first_name;
      $user->last_name = $request->last_name;
      $user->username = $request->username;
      $user->email = $request->email;
    //  $user->password = $request->password;
      $user->division_id = $request->division_id;
      $user->district_id = $request->district_id;
      $user->mobile_no = $request->mobile_no;
      $user->street_address = $request->street_address;
      $user->shipping_address = $request->shipping_address;
      $user->ip_address = request()->ip();
      $user->save();
      Session()->flash('success','User profile has updated successfully!!');
      return back();
    }
}
