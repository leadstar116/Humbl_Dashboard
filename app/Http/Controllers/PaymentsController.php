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

    }

    public function createAccount() {
        $user = Auth::user();
        $result = [];
        try{
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            $payment = $user->payment;
            $create_flag = false;
            if(!$payment) {
                $payment = new Payment;
                $create_flag = true;
            } else {
                if(!$payment->account_id) {
                    $create_flag = true;
                }
            }

            if($create_flag) {
                $account = \Stripe\Account::create([
                    "type" => "custom",
                    "country" => 'US',
                    "email" => $user->email,
                    "requested_capabilities" => ["card_payments", "transfers"],
                ]);
                $payment->account_id = $account['id'];
            }

            $link = \Stripe\AccountLink::create([
                "account" => $payment->account_id,
                "failure_url" => "http://localhost:8000/verify_failure",
                "success_url" => "http://localhost:8000/verify_success",
                "type" => "custom_account_verification",
            ]);
            $payment->account_link = $link['url'];
            $payment->account_status = 'created';
            $user->payment()->save($payment);

            $result['success'] = true;
            $result['link'] = $link['url'];
        } catch (\Stripe\Exception\CardException $e) {
            // Since it's a decline, \Stripe\Exception\CardException will be caught
            // echo 'Status is:' . $e->getHttpStatus() . '\n';
            // echo 'Type is:' . $e->getError()->type . '\n';
            // echo 'Code is:' . $e->getError()->code . '\n';
            // param is '' in this case
            // echo 'Param is:' . $e->getError()->param . '\n';
            // echo 'Message is:' . $e->getError()->message . '\n';
            $result['success'] = false;
            $result['error_message'] = $e->getError();
        } catch (\Stripe\Exception\RateLimitException $e) {
            // echo 'Too many requests made to the API too quickly';
            $result['success'] = false;
            $result['error_message'] = $e->getError();
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            // echo "Invalid parameters were supplied to Stripe's API";
            $result['success'] = false;
            $result['error_message'] = $e->getError();
        } catch (\Stripe\Exception\AuthenticationException $e) {
            // echo "Authentication with Stripe's API failed
            // (maybe you changed API keys recently)";
            $result['success'] = false;
            $result['error_message'] = $e->getError();
        } catch (\Stripe\Exception\ApiConnectionException $e) {
            // echo "Network communication with Stripe failed";
            $result['success'] = false;
            $result['error_message'] = $e->getError();
        } catch (\Stripe\Exception\ApiErrorException $e) {
            // echo "Display a very generic error to the user, and maybe send
            // yourself an email";
            $result['success'] = false;
            $result['error_message'] = $e->getError();
        } catch (Exception $e) {
            // echo "Something else happened, completely unrelated to Stripe";
            $result['success'] = false;
            $result['error_message'] = $e->getError();
        }
        return response($result, 200);
    }

    public function verifyAccount() {
        $user = Auth::user();
        $result = [];
        try{
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            $payment = $user->payment;

            $link = \Stripe\AccountLink::create([
                "account" => $payment->account_id,
                "failure_url" => "http://localhost:8000/verify_failure",
                "success_url" => "http://localhost:8000/verify_success",
                "type" => "custom_account_verification",
            ]);
            $payment->account_link = $link['url'];
            $payment->account_status = 'created';
            $user->payment()->save($payment);

            $result['success'] = true;
            $result['link'] = $link['url'];
        } catch (\Stripe\Exception\CardException $e) {
            // Since it's a decline, \Stripe\Exception\CardException will be caught
            // echo 'Status is:' . $e->getHttpStatus() . '\n';
            // echo 'Type is:' . $e->getError()->type . '\n';
            // echo 'Code is:' . $e->getError()->code . '\n';
            // param is '' in this case
            // echo 'Param is:' . $e->getError()->param . '\n';
            // echo 'Message is:' . $e->getError()->message . '\n';
            $result['success'] = false;
            $result['error_message'] = $e->getError();
        } catch (\Stripe\Exception\RateLimitException $e) {
            // echo 'Too many requests made to the API too quickly';
            $result['success'] = false;
            $result['error_message'] = $e->getError();
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            // echo "Invalid parameters were supplied to Stripe's API";
            $result['success'] = false;
            $result['error_message'] = $e->getError();
        } catch (\Stripe\Exception\AuthenticationException $e) {
            // echo "Authentication with Stripe's API failed
            // (maybe you changed API keys recently)";
            $result['success'] = false;
            $result['error_message'] = $e->getError();
        } catch (\Stripe\Exception\ApiConnectionException $e) {
            // echo "Network communication with Stripe failed";
            $result['success'] = false;
            $result['error_message'] = $e->getError();
        } catch (\Stripe\Exception\ApiErrorException $e) {
            // echo "Display a very generic error to the user, and maybe send
            // yourself an email";
            $result['success'] = false;
            $result['error_message'] = $e->getError();
        } catch (Exception $e) {
            // echo "Something else happened, completely unrelated to Stripe";
            $result['success'] = false;
            $result['error_message'] = $e->getError();
        }
        return response($result, 200);
    }

    public function verifyFailure() {
        return view('verify-failure')->with('user', Auth::user());
    }

    public function verifySuccess() {
        $user = Auth::user();
        $payment = $user->payment;
        $payment->account_status = 'verified';
        $user->payment()->save($payment);
        echo '<pre>';
        print_r(request()->authorization_code); exit;
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
