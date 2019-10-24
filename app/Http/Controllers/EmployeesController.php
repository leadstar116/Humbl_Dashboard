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
        $tips_average = [];
        $customer_rating = [];
        foreach($user->employees as $employee) {
            $result = DB::table('tips')
                ->select(DB::raw('sum(fTipAmount) as sum, AVG(fTipAmount) as average, AVG(vRating) as customer_rating'))
                ->where('iToUserId', '=', $employee->iUserId)
                ->where('tiIsActive', '=', '1')
                ->get();
            $tips_sum[$employee->iUserId] = number_format($result[0]->sum, 2, '.', '');
            $tips_average[$employee->iUserId] = number_format($result[0]->average, 2, '.', '');
            $customer_rating[$employee->iUserId] = number_format($result[0]->customer_rating, 2, '.', '');
        }
        return view('employees')->with('user', Auth::user())
            ->with('tips_sum', $tips_sum)
            ->with('tips_average', $tips_average)
            ->with('customer_rating', $customer_rating);
    }

    public function removeStaff()
    {
        $userId = request()->userId;
        $result = DB::table('users')->where('iUserId', '=', $userId)->delete();
        return response($result, 200);
    }
}
