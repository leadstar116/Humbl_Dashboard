@extends('layouts.dashboard')

@section('content')

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<div id="wrapper" class="container invite-new">
    <form method="POST" action="{{ route('inviteNew') }}" enctype="multipart/form-data">
        @csrf

        <div class="row clearfix">
            <div class="col-md-12 profile-header">
            <h3>Invite people to join {{ ($user->name)? $user->name:'your business' }}</h3>
            <p>Add coworkers & staff to your business profile</p>
            </div>
            @if ($errors->any())
                @if ($errors->first() == 'error')
                    <div class="col-md-12 error">
                        <img src="/img/humbl-error-mark.png" class="error-mark" alt="">
                        <h4>Hmm, that didn't work!</h4>
                        <p><strong>Invitation didn't send.</strong> Review the errors below</p>
                        <p style="color: #f00;">{{ $errors->all()[1] }}</p>
                        <a href="/invite-new" class="btn btn-primary btn-save">
                            Try again
                        </a>
                        <a href="/home" class="btn btn-primary btn-invite-skip">
                            Done
                        </a>
                    </div>
                @elseif ($errors->first() == 'success')
                    <div class="col-md-12 error">
                        <img src="/img/humbl-success-mark.png" class="success-mark" alt="">
                        <h4>Your invitations have been sent!</h4>
                        <p>You've invited <strong>Member(s)</strong> to {{ ($user->name)? $user->name:'your business' }}</p>
                        <a href="/invite-new" class="btn btn-primary btn-save">
                            Invite More
                        </a>
                        <a href="/home" class="btn btn-primary btn-invite-skip">
                            Done
                        </a>
                    </div>
                @endif
            @else
                <div class="col-md-12">
                    <div class="card">
                        <div class="body">
                            <div class="row">
                                <label class="text-muted col-md-6">Staff Member Name </label>
                                <label class="text-muted col-md-6">Email Address </label>
                            </div>
                            <div class="staff-body">
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <input type="text" placeholder="First Name" name="first_name[]" required>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" placeholder="Last Name" name="last_name[]" required>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" placeholder="name@example.com" name="email[]" required>
                                    </div>
                                    <div class="col-md-3">
                                        <select name="department[]" class="department-select" required>
                                            <option value="" disabled selected>Department</option>
                                            @foreach($user->departments as $department)
                                                <option value="{{ $department->id }}">{{ $department->department }}</option>
                                            @endforeach
                                        </select>
                                        <a class="btn-remove-staff"><i aria-hidden="true" class="fa fa-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <a class="btn-add-staff"><i class="fa fa-plus"></i>Add another</a>
                                </div>
                                <div class="col-md-6 text-right">
                                    <button type="submit" class="btn btn-primary btn-save">
                                        Send
                                    </button>
                                    <a href="/home" class="btn btn-primary btn-invite-skip">
                                        Skip
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </form>
</div>
@endsection
