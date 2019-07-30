<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Profile;
use App\Departments;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('profile');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function complete()
    {
        return view('profile-complete')->with('user', Auth::user());
    }

    public function saveComplete(Request $request) {
        $user = Auth::user();

        if ($request->hasFile('avatar')) {
            $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();
            $request->avatar->storeAs('avatars', $avatarName);
            $user->avatar = $avatarName;
        }
        if ($request->hasFile('avatar_back')) {
            $avatarBackName = $user->id.'_avatar_back'.time().'.'.request()->avatar_back->getClientOriginalExtension();
            $request->avatar_back->storeAs('avatars', $avatarBackName);
            $user->avatar_back = $avatarBackName;
        }

        $profile = $user->profile;
        if(!$profile) {
            $profile = new Profile;
        }
        $profile->name = $request->input('name');
        $profile->tagline = $request->input('tagline');
        $profile->email = $request->input('email');
        $profile->phone = $request->input('phone');
        $profile->address = $request->input('address');
        $profile->city = $request->input('city');
        $profile->country = $request->input('country');
        $profile->state = $request->input('state');
        $profile->zipcode = $request->input('zipcode');
        $profile->biz_description = $request->input('business');
        $user->profile()->save($profile);

        $departments = [];
        foreach($request->department as $depart) {
            $department = new Departments;
            $department->department = $depart;
            $departments[] = $department;
        }
        $user->departments()->saveMany($departments);

        $user->profile_completed = 1;
        $user->save();

        return view('home')->with('user', Auth::user());
    }
}
