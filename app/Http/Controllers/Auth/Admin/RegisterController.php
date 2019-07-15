<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\Division;
use App\Models\District;
use App\Notifications\VerifyRegistration;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    // function override for user form
    // cutomise by Ismail
    public function showRegistrationForm()
    {

      $divisions = Division::OrderBy('priority','asc')->get();
      $districts = District::OrderBy('name','asc')->get();

        return view('auth.register',compact('divisions','districts'));
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:30'],
            'first_name' => ['nullable', 'string', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'division_id' => ['required','numeric'],
            'district_id' => ['required','numeric'],
            'mobile_no' => ['required','max:11'],
            'street_address' => ['required','max:100'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function register(Request $request)
    {
        $user =  User::create([
            'first_name' =>  $request->first_name,
            'last_name' =>  $request->last_name,
            'username' => str_slug( $request->first_name. $request->last_name),
            'division_id' =>  $request->division_id,
            'district_id' =>  $request->district_id,
            'mobile_no' =>  $request->mobile_no,
            'street_address' =>  $request->street_address,
            'ip_address' =>request()->ip(),
            'email' =>  $request->email,
            'password' => Hash::make( $request->password),
            'remember_token' =>str_random(50),
            'status' => 0,
        ]);
        $user->notify(new VerifyRegistration($user));

        Session()->flash('success','A confirmation email has send to you. Please check and confirm your email! ');
        return redirect('/');
    }
}
