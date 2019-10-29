@extends('layouts.dashboard')

@section('content')

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<div id="wrapper" class="container payment-complete">
    @include('partials.navbar')
    <div class="row clearfix">
        <div class="col-md-12 text-center mb-5 failure-div">
            <img src="/img/humbl-error-mark.png" class="error-mark" alt="">
            <h4>Hmm, let's try that again!</h4>
            <p>There was an error setting up your account. If the error persis, please contact us.</p>
            <div>
                <a class="btn btn-primary btn-verify-stripe-account">
                    Try Again
                </a>
                <a href="/payment-complete" class="btn btn-primary" data-dismiss="modal">
                    Back
                </a>
            </div>
        </div>
    </div>
</div>