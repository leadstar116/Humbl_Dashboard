@extends('layouts.dashboard')

@section('content')

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<div id="wrapper" class="container payment-complete">
    @include('partials.navbar')
    <div class="row clearfix">
        <div class="col-md-12 text-center mb-5 success-div">
            <img src="/img/humbl-success-mark.png" class="success-mark" alt="">
            <h4>Account Successfully Created!</h4>
            <p>Your account is ready to go, now let's add your bank.</p>
            <a href="/payment-complete" class="btn btn-primary btn-continue-link">
                Continue
            </a>
        </div>
    </div>
</div>