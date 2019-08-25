<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
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
        $total_rating = 0;
        $total_payment = 0;
        $total_tips = 0;
        $customer_ratings = [];
        foreach($user->employees as $employee) {
            $result = DB::table('tips')
                ->select(DB::raw('sum(fAmount) as sum, sum(vRating) as customer_rating'))
                ->where('iToUserId', '=', $employee->iUserId)
                ->where('tiIsActive', '=', '1')
                ->get();
            $total_rating += $result[0]->customer_rating;
            $total_tips += $result[0]->sum;
        }

        $months = [];
        $reviews_count = [];
        for($i = 5; $i >= 0; $i--) {
            $date = date('Y-m-01', strtotime("-$i month"));
            $months[] = date('M', strtotime("-$i month"));
            $first_day_this_month = date('Y-m-01', strtotime("-$i month"));
            $last_day_this_month  = date('Y-m-t', strtotime("-$i month"));
            $first_time = strtotime($first_day_this_month);
            $last_time = strtotime($last_day_this_month);

            $ratings = 0;
            $count = 0;
            foreach($user->employees as $employee) {
                $result = DB::table('tips')
                    ->select(DB::raw('avg(vRating) as customer_rating'))
                    ->where('iToUserId', '=', $employee->iUserId)
                    ->where('tiIsActive', '=', '1')
                    ->where('iCreatedAt', '>=', $first_time)
                    ->where('iCreatedAt', '<=', $last_time)
                    ->get();
                $ratings += $result[0]->customer_rating;

                $result = DB::table('tips')
                    ->select(DB::raw('count(*) as count'))
                    ->where('iToUserId', '=', $employee->iUserId)
                    ->where('tiIsActive', '=', '1')
                    ->where('vRating', '=', '5')
                    ->where('iCreatedAt', '>=', $first_time)
                    ->where('iCreatedAt', '<=', $last_time)
                    ->get();
                $count += $result[0]->count;
            }
            $customer_ratings[] = number_format($ratings / 3, 2, '.', '');
            $reviews_count[] = $count;
        }

        $total_rating /= $user->employees->count();
        $total = [];
        $total['rating'] = number_format($total_rating, 2, '.', '');
        $total['tips'] = number_format($total_tips, 2, '.', '');
        $total['payment'] = number_format($total_payment, 2, '.', '');
        $total['months'] = implode(',', $months);
        return view('home')->with('user', Auth::user())->with('total', $total)->with('customer_ratings', $customer_ratings)->with('reviews_count', $reviews_count);
    }
}
