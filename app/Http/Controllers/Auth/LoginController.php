<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\BusinessUser;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $result = DB::table('business')
                ->select(DB::raw('profile_completed'))
                ->where('email', '=', request()->email)
                ->get();
            if($result[0]->profile_completed) {
                return redirect()->intended('/home');
            } else {
                return redirect()->intended('/profile-complete');
            }
        }
        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors([
                'error' => 'These credentials do not match our records.'
            ]);
    }
}
