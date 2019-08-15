<?php

namespace App\Http\Controllers\Auth;

use App\BusinessUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Controllers\Auth\ResponseObject;

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
    protected $redirectTo = '/profile-complete';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:business'],
            'password' => ['required', 'string', 'min:8'],
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
        return BusinessUser::create([
            'email' => $data['email'],
            'password_hash' => Hash::make($data['password']),
            'profile_completed' => 0,
            'auth_key' => '',
            'FirstName' => '',
            'LastName' => '',
            'BusinessName' => '',
            'Latitude' => 0,
            'Longitude' => 0,
            'tiIsActive' => 1,
            'tiIsDelete' => 1,
            'address' => '',
            'city' => '',
            'country' => '',
            'state' => '',
            'zipcode' => '',
            'biz_description' => '',

        ]);
    }
}
