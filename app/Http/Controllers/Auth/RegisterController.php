<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\Division;
use App\Models\District;
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
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'username' => str_slug($data['first_name'].$data['last_name']),
            'division_id' => $data['division_id'],
            'district_id' => $data['district_id'],
            'mobile_no' => $data['mobile_no'],
            'street_address' => $data['street_address'],
            'ip_address' =>request()->ip(),
            'email' => $data['email'],

            'password' => Hash::make($data['password']),
        ]);
    }
}
