<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Users;

class ActivityController extends Controller
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
        $result = DB::table('tips')
            ->where('tiIsActive', '=', '1')
            ->orderBy('iCreatedAt', 'desc')->get();
        $activities = [];
        foreach($result as $item) {
            $print_rate = self::print_stars(self::round_half($item->vRating));

            $employ = Users::where('iUserId', $item->iToUserId)->get();
            $guest = Users::where('iUserId', $item->iFromUserId)->get();

            if(!empty($employ) && !empty($guest)) {
                $activities[] = [
                    'activity' => $item,
                    'print_rating' => $print_rate,
                    'employee_name' => $employ[0]->vFirstName. ' ' .$employ[0]->vLastName,
                    'employee_email' => $employ[0]->vEmailId,
                    'guest_name' => $guest[0]->vFirstName. ' ' .$guest[0]->vLastName,
                    'guest_email' => $guest[0]->vEmailId,
                ];
            }
        }

        return view('activity')->with('user', Auth::user())->with('activities', $activities);
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
