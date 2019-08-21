<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
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
        $user = Auth::user();
        $tips_sum = [];
        foreach($user->employees as $employee) {
            $sum = DB::table('tips')
                ->select(DB::raw('sum(fAmount) as sum, AVG(fAmount) as average'))
                ->where('iToUserId', '=', $employee->iUserId)
                ->get();
            $tips_sum[$employee->iUserId] = number_format($sum[0]->sum, 2, '.', '');
            $tips_average[$employee->iUserId] = number_format($sum[0]->average, 2, '.', '');
        }
        return view('employees')->with('user', Auth::user())->with('tips_sum', $tips_sum)->with('tips_average', $tips_average);
    }

    public function removeStaff()
    {
        $userId = request()->userId;
        $result = DB::table('users')->where('iUserId', '=', $userId)->delete();
        return response($result, 200);
    }
}
