<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Employees;

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

        $employees = [];
        for($index = 0; $index < count($request->first_name); $index += 1) {
            $employee = new Employees;
            $employee->first_name = $request->first_name[$index];
            $employee->last_name = $request->last_name[$index];
            $employee->email = $request->email[$index];
            $employee->department_id = $request->department[$index];
            $employees[] = $employee;
        }
        $user->employees()->saveMany($employees);
        $user->save();
        return Redirect::back()
            ->withErrors(['success', 'There was a failure while sending the message!']);
        //return Redirect::back()
        //    ->withErrors(['error', 'There was a failure while sending the message!']);
    }
}
