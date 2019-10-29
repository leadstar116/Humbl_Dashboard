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

            return redirect('verify_success');
        }
    }

    public function verifyFailure() {
        return view('verify-failure')->with('user', Auth::user());
    }

    public function verifySuccess() {
        return view('verify-success')->with('user', Auth::user());
    }

    public function savePayment(Request $request) {
        $user = Auth::user();
        $payment = $user->payment;
        if(!$payment) {
            $payment = new Payment;
        }
        $payment->country = $request->input('country');
        $payment->biz_address_1 = $request->input('address_1');
        $payment->biz_address_2 = $request->input('address_2');
        $payment->biz_city = $request->input('city');
        $payment->biz_state = $request->input('state');
        $payment->biz_zipcode = $request->input('zipcode');
        $payment->biz_phone = $request->input('business_phone');
        $payment->biz_type = $request->input('business_type');
        $payment->ein = $request->input('ein');
        $payment->website = $request->input('website');
        $payment->industry = $request->input('industry');
        $payment->biz_description = $request->input('biz_description');
        $payment->first_name = $request->input('first_name');
        $payment->last_name = $request->input('last_name');
        $payment->email = $request->input('email');
        $payment->phone = $request->input('phone');
        $payment->birthday = $request->input('birthday');
        $payment->ssn = $request->input('ssn');
        $payment->home_address_1 = $request->input('home_address_1');
        $payment->home_address_2 = $request->input('home_address_2');
        $payment->home_city = $request->input('home_city');
        $payment->home_state = $request->input('home_state');
        $payment->home_zipcode = $request->input('home_zipcode');
        $payment->card_state_descriptor = $request->input('card_state_descriptor');
        $payment->card_shortend_descriptor = $request->input('card_shortend_descriptor');
        $payment->support_phone = $request->input('support_phone');
        $payment->customer_address_1 = $request->input('customer_address_1');
        $payment->customer_address_2 = $request->input('customer_address_2');
        $payment->customer_city = $request->input('customer_city');
        $payment->customer_state = $request->input('customer_state');
        $payment->customer_zipcode = $request->input('customer_zipcode');
        $payment->routing_number = $request->input('routing_number');
        $payment->account_number = $request->input('account_number');
        $user->payment()->save($payment);

        $user->payment_completed = 1;
        $user->save();
        return redirect()->intended('profile-complete');
    }
}
