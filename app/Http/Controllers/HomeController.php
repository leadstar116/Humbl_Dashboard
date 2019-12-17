<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Tips;
use App\Users;

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
                ->select(DB::raw('sum(vRating) as customer_rating'))
                ->where('iToUserId', '=', $employee->iUserId)
                ->where('tiIsActive', '=', '1')
                ->get();
            if(!empty($result)) {
                $total_rating += $result[0]->customer_rating;
            }

            $result = DB::table('tips')
                ->select(DB::raw('sum(fTipAmount) as sum'))
                ->where('iToUserId', '=', $employee->iUserId)
                ->where('tiIsActive', '=', '1')
                ->where('payment_type', '=', 'tips')
                ->get();
            if(!empty($result)) {
                $total_tips += $result[0]->sum;
            }

            $result = DB::table('tips')
                ->select(DB::raw('sum(fTipAmount) as sum'))
                ->where('iToUserId', '=', $employee->iUserId)
                ->where('tiIsActive', '=', '1')
                ->where('payment_type', '=', 'payment')
                ->get();
            if(!empty($result)) {
                $total_payment += $result[0]->sum;
            }
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
                if(!empty($result)) {
                    $ratings += $result[0]->customer_rating;
                }

                $result = DB::table('tips')
                    ->select(DB::raw('count(*) as count'))
                    ->where('iToUserId', '=', $employee->iUserId)
                    ->where('tiIsActive', '=', '1')
                    ->where('vRating', '=', '5')
                    ->where('iCreatedAt', '>=', $first_time)
                    ->where('iCreatedAt', '<=', $last_time)
                    ->get();
                if(!empty($result)) {
                    $count += $result[0]->count;
                }
            }
            $customer_ratings[] = number_format($ratings / 3, 2, '.', '');
            $reviews_count[] = $count;
        }

        $result = DB::table('tips')
            ->where('tiIsActive', '=', '1')
            ->limit(20)
            ->orderBy('iCreatedAt', 'desc')->get();
        $activities = [];
        foreach($result as $item) {
            $print_rate = self::print_stars(self::round_half($item->vRating));

            $employ = Users::where('iUserId', $item->iToUserId)->get()->toArray();
            $guest = Users::where('iUserId', $item->iFromUserId)->get()->toArray();

            if(!empty($employ) && !empty($guest)) {
                $activities[] = [
                    'activity' => $item,
                    'print_rating' => $print_rate,
                    'employee_name' => $employ[0]['vFirstName']. ' ' .$employ[0]['vLastName'],
                    'employee_email' => $employ[0]['vEmailId'],
                    'guest_name' => $guest[0]['vFirstName']. ' ' .$guest[0]['vLastName'],
                    'guest_email' => $guest[0]['vEmailId'],
                ];
            }
        }

        if($user->employees->count() != 0) {
            $total_rating /= $user->employees->count();
        } else {
            $total_rating = 0;
        }
        $total = [];
        $total['rating'] = number_format($total_rating, 2, '.', '');
        $total['tips'] = number_format($total_tips, 2, '.', '');
        $total['payment'] = number_format($total_payment, 2, '.', '');
        $total['months'] = implode(',', $months);

        return view('home')->with('user', Auth::user())->with('total', $total)->with('customer_ratings', $customer_ratings)->with('reviews_count', $reviews_count)->with('activities', $activities);
    }

    public function round_half($num) {
        return round($num * 2) / 2;
    }

    public function print_stars($num) {
        $stars = '<ul class="review-rating star-rating">';
        for ($n=0; $n<=4; $n++) {
            $stars .= '<li><span class="fa fa-1x fa-star';
            if ($num==$n+.5) {
                $stars .= '-half-empty';
            } elseif ($num<$n+.5) {
                $stars .= '-o';
            };
            $stars .= '"></span></li>';
        };
        $stars .= '</ul>';
        return $stars;
    }
}
