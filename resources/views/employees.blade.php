@extends('layouts.dashboard')

@section('content')

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<div id="wrapper" class="employees">
    @include('partials.sidebar')

    <div id="main-content" class="existing-selected">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-12 col-sm-12">
                        <h1>Invite New Users or Manage Existing Ones</h1>
                    </div>
                    <ul class="tab-menu">
                        <li class="tab-existing-users selected" attr-type="existing-selected">Existing Users</li>
                        <li class="tab-invite-new" attr-type="invite-new-selected">Invite New</li>
                    </ul>
                </div>
            </div>

            <div class="row clearfix div-existing-users">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example dataTable table-custom spacing5 mb-0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Created Date</th>
                                        <th>Department/Pod</th>
                                        <th>Customer Rating</th>
                                        <th>Earning Per Shift</th>
                                        <th>Lifetime Earnings</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img src="../assets/images/xs/avatar1.jpg" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="w35 h35 rounded">
                                        </td>
                                        <td>
                                            <div class="font-15">Marshall Nichols</div>
                                            <span class="text-muted">marshall-n@gmail.com</span>
                                        </td>
                                        <td><span>LA-0215</span></td>
                                        <td><span>+ 264-625-2583</span></td>
                                        <td>24 Jun, 2015</td>
                                        <td>Web Designer</td>
                                        <td>
                                            <span class="chart">5,3,-7,8,-6,1,4,9</span>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix div-invite-new invite-new">
                <form method="POST" action="{{ route('inviteNew') }}" enctype="multipart/form-data">
                    @csrf
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
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
