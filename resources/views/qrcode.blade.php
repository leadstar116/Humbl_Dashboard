@extends('layouts.dashboard')

@section('content')

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<div id="wrapper" class="qrcode">
    @include('partials.sidebar')

    <div style="display: none;">
        <div id="printer" style="">

        </div>
    </div>
    <div id="main-content" class="all-selected">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-12 col-sm-12">
                        <h1>QR Codes</h1>
                    </div>
                </div>
            </div>
            @csrf

            <div class="row clearfix">
                <div class="business col-md-5">
                    <div class="card">
                        <div class="header">
                            <div class="form-group">
                                <h2>Business Profile QR </h2>
                                <p class="text-muted">Links to your business profile on HUMBL for users to rate, review and find out more about your company</p>
                            </div>
                        </div>
                        <div class="body" style="background: black;">
                            <div class="qrcode-box-logo">
                                <div class="qrcode-upload">
                                    <label for="qrcodeFile">
                                        <div class="qrcode-image">
                                            <img src="/storage/avatars/{{ $user->ProfilePic }}" class="img_profile" alt="">
                                        </div>
                                        <div class="qrcode-label">
                                            <i class="icon-picture"></i>UPLOAD LOGO
                                        </div>
                                    </label>
                                    <input type="file" class="form-control-file" id="qrcodeFile" aria-describedby="fileHelp">
                                </div>
                            </div>
                            <div class="qrcode-box-header">
                                Uneditable
                                <span>
                                    No Cash? No Problem.
                                </span>
                                Uneditable
                            </div>
                            <div class="qrcode-box-body">
                                {!! QrCode::size(300)->generate($user->BusinessName); !!}
                            </div>
                            <div class="qrcode-box-logos">
                                <span class="text-muted">
                                    Uneditable
                                    <img src="/images/partner.jpg" class="qrcode-logos" alt="">
                                    Uneditable
                                </span>
                            </div>
                        </div>
                        <p class="imgPreview">Image Preview</p>
                        <div class="qrcode-customize">
                            <div class="row">
                                <div class="col-md-4 title">
                                    <h2>Customize</h2>
                                </div>
                                <div class="col-md-8 text">
                                    <p>Color Theme: <a class="selected dark-theme">Dark</a><a class="light-theme">Light</a></p>
                                    <p>Select Print Size: <a class="print-size-1">4 X 6</a><a class="selected print-size-2">5 X 7</a><a class="print-size-3">8.5 X 11</a></p>
                                    <p>Background Color: <input type="color" id="business-qr-back-color" name="business-qr-back-color"
                                        value="#22ADE4"> &nbsp; QR Color:<input type="color" id="business-qr-color" name="business-qr-color"
                                        value="#22ADE4"></p>
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <button class="btn btn-primary clear-btn">
                                Clear
                            </button>
                            <button class="btn btn-primary submit-btn">
                                Save + Print
                            </button>
                        </div>
                    </div>
                </div>
                <div class="profileqr col-md-5">
                    <div class="card">
                        <div class="header">
                            <div class="form-group">
                                <h2>Payment QR </h2>
                                <p class="text-muted">Use at the point of sale to give customers an easy way to pay your business</p>
                            </div>
                        </div>
                        <div class="body">
                            <div class="qrcode-box-logo">
                                <div class="qrcode-upload">
                                    <label for="qrcodeProfileFile">
                                        <div class="qrcode-image">
                                            <img src="/storage/avatars/{{ $user->ProfilePic }}" class="img_profile_qr" alt="">
                                        </div>
                                        <div class="qrcode-label">
                                            <i class="icon-picture"></i>UPLOAD LOGO
                                        </div>
                                    </label>
                                    <input type="file" class="form-control-file" id="qrcodeProfileFile" aria-describedby="fileHelp">
                                </div>
                            </div>
                            <div class="qrcode-box-header">
                                Uneditable
                                <span>
                                    No Cash? No Problem.
                                </span>
                                Uneditable
                            </div>
                            <div class="qrcode-box-body">
                                {!! QrCode::size(300)->generate($user->BusinessName); !!}
                            </div>
                            <div class="qrcode-box-logos">
                                <span class="text-muted">
                                    Uneditable
                                    <img src="/images/partner.jpg" class="qrcode-logos" alt="">
                                    Uneditable
                                </span>
                            </div>
                        </div>
                        <p class="imgPreview">Image Preview</p>
                        <div class="qrcode-customize">
                            <div class="row">
                                <div class="col-md-4 title">
                                    <h2>Customize</h2>
                                </div>
                                <div class="col-md-8 text">
                                    <p>Color Theme: <a class="selected dark-theme">Dark</a><a class="light-theme">Light</a></p>
                                    <p>Select Print Size: <a class="print-size-1">4 X 6</a><a class="selected print-size-2">5 X 7</a><a class="print-size-3">8.5 X 11</a></p>
                                    <p>Background Color: <input type="color" id="profile-qr-back-color" name="business-qr-back-color"
                                        value="#22ADE4"> &nbsp; QR Color:<input type="color" id="profile-qr-color" name="business-qr-color"
                                        value="#22ADE4"></p>
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <button class="btn btn-primary clear-btn">
                                Clear
                            </button>
                            <button class="btn btn-primary submit-btn">
                                Save + Print
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
