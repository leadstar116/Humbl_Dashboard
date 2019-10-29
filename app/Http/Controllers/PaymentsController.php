<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Payment;

class PaymentsController extends Controller
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
        return view('payments');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function complete()
    {
        $user = Auth::user();
        $payment = $user->payment;
        $account_status = 'none';
        if($payment) {
            $account_status = $payment->account_status;
        }
        return view('payment-complete')->with('user', Auth::user())->with('account_status', $account_status)->with('payment', $payment);
    }

    public function redirect() {
        if(request()->error) {
            print_r(request()->error);
            return redirect('verify_failure');
        } else {
            $code = request()->code;
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            $response = \Stripe\OAuth::token([
                'grant_type' => 'authorization_code',
                'code' => $code,
            ]);

            // Access the connected account id in the response
            $connected_account_id = $response->stripe_user_id;
            $user = Auth::user();
            $payment = $user->payment;
            if(!$payment) {
                $payment = new Payment;
            }

            $payment->account_id = $connected_account_id;
            $payment->account_status = 'created';
            $user->payment()->save($payment);

            $user->payment_completed = 1;
            $user->save();
            return redirect('verify_success');
        }
    }

    public function verifyFailure() {
        return view('verify-failure')->with('user', Auth::user());
    }

    public function verifySuccess() {
        return view('verify-success')->with('user', Auth::user());
    }
}
