<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Invites;

class InvitesController extends Controller
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
        return view('invites')->with('user', Auth::user());
    }

    public function new()
    {
        return view('invite-new')->with('user', Auth::user());
    }

    // handle invite-new post
    public function inviteNew(Request $request) {

        $user = Auth::user();

        $invites = [];
        for($index = 0; $index < count($request->first_name); $index += 1) {
            $invite = new Invites;
            $invite->first_name = $request->first_name[$index];
            $invite->last_name = $request->last_name[$index];
            $invite->email = $request->email[$index];
            $invite->department_id = $request->department[$index];
            $invites[] = $invite;
        }
        $user->invites()->saveMany($invites);
        $user->save();
        return Redirect::back()
            ->withErrors(['success', 'There was a failure while sending the message!']);
        //return Redirect::back()
        //    ->withErrors(['error', 'There was a failure while sending the message!']);
    }
}
