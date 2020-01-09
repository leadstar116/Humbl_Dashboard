@extends('layouts.dashboard')

@section('content')

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<div id="wrapper" class="activity">
    @include('partials.sidebar')

    <div id="main-content" class="all-selected">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-12 col-sm-12">
                        <h1>Your Businesses Most Recent Activity</h1>
                    </div>
                    <ul class="tab-menu">
                        <li class="tab-all-activity selected" attr-type="all-selected">All Activity</li>
                        <li class="tab-payments" attr-type="payments-selected">Payments</li>
                        <li class="tab-tips" attr-type="tips-selected">Tips</li>
                        <li class="tab-feedback" attr-type="feedback-selected">Feedback</li>
                    </ul>
                </div>
            </div>

            <div class="row clearfix div-all-activity">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example dataTable table-custom spacing5 mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Employee</th>
                                        <th>Guest Name</th>
                                        <th>Date</th>
                                        <th>Feedback</th>
                                        <th>Type</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($activities as $activity)
                                    <tr>
                                        <td>{{ $activity['activity']->iTipId }}</td>
                                        <td>
                                            <div class="avatar-container">
                                                <img src="../assets/images/xs/avatar1.jpg" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="w35 h35 rounded">
                                            </div>
                                            <div class="name-container">
                                                <span class="font-15">{{ $activity['employee_name'] }}</span><br/>
                                                <span class="text-muted">{{ $activity['employee_email'] }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="avatar-container">
                                                <img src="../assets/images/xs/avatar1.jpg" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="w35 h35 rounded">
                                            </div>
                                            <div class="name-container">
                                                <span class="font-15">{{ $activity['guest_name'] }}</span><br/>
                                                <span class="text-muted">{{ $activity['guest_email'] }}</span>
                                            </div>
                                        </td>
                                        <td><span><?= date('d M, Y', $activity['activity']->iCreatedAt) ?></span></td>
                                        <td><?= $activity['print_rating'] ?></td>
                                        <td><?= ucwords($activity['activity']->payment_type) ?></td>
                                        <td>
                                            <span class="chart">$ <?= ($activity['activity']->payment_type == 'tips')? number_format($activity['activity']->fTipAmount, 2, '.', '') : number_format($activity['activity']->fPaymentAmount, 2, '.', ''); ?></span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix div-payments">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example dataTable table-custom spacing5 mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Employee</th>
                                        <th>Guest Name</th>
                                        <th>Date</th>
                                        <th>Feedback</th>
                                        <th>Type</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($activities as $activity)
                                        @if($activity['activity']->payment_type == 'payment')
                                        <tr>
                                            <td>{{ $activity['activity']->iTipId }}</td>
                                            <td>
                                                <div class="avatar-container">
                                                    <img src="../assets/images/xs/avatar1.jpg" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="w35 h35 rounded">
                                                </div>
                                                <div class="name-container">
                                                    <span class="font-15">{{ $activity['employee_name'] }}</span><br/>
                                                    <span class="text-muted">{{ $activity['employee_email'] }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="avatar-container">
                                                    <img src="../assets/images/xs/avatar1.jpg" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="w35 h35 rounded">
                                                </div>
                                                <div class="name-container">
                                                    <span class="font-15">{{ $activity['guest_name'] }}</span><br/>
                                                    <span class="text-muted">{{ $activity['guest_email'] }}</span>
                                                </div>
                                            </td>
                                            <td><span><?= date('d M, Y', $activity['activity']->iCreatedAt) ?></span></td>
                                            <td><?= $activity['print_rating'] ?></td>
                                            <td><?= ucwords($activity['activity']->payment_type) ?></td>
                                            <td>
                                                <span class="chart">$ <?= number_format($activity['activity']->fPaymentAmount, 2, '.', '') ?></span>
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix div-tips">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example dataTable table-custom spacing5 mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Employee</th>
                                        <th>Guest Name</th>
                                        <th>Date</th>
                                        <th>Feedback</th>
                                        <th>Type</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($activities as $activity)
                                        @if($activity['activity']->payment_type == 'tips')
                                        <tr>
                                            <td>{{ $activity['activity']->iTipId }}</td>
                                            <td>
                                                <div class="avatar-container">
                                                    <img src="../assets/images/xs/avatar1.jpg" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="w35 h35 rounded">
                                                </div>
                                                <div class="name-container">
                                                    <span class="font-15">{{ $activity['employee_name'] }}</span><br/>
                                                    <span class="text-muted">{{ $activity['employee_email'] }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="avatar-container">
                                                    <img src="../assets/images/xs/avatar1.jpg" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="w35 h35 rounded">
                                                </div>
                                                <div class="name-container">
                                                    <span class="font-15">{{ $activity['guest_name'] }}</span><br/>
                                                    <span class="text-muted">{{ $activity['guest_email'] }}</span>
                                                </div>
                                            </td>
                                            <td><span><?= date('d M, Y', $activity['activity']->iCreatedAt) ?></span></td>
                                            <td><?= $activity['print_rating'] ?></td>
                                            <td><?= ucwords($activity['activity']->payment_type) ?></td>
                                            <td>
                                                <span class="chart">$ <?= number_format($activity['activity']->fTipAmount, 2, '.', '') ?></span>
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix div-feedback">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example dataTable table-custom spacing5 mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Employee</th>
                                        <th>Guest Name</th>
                                        <th>Date</th>
                                        <th>Feedback</th>
                                        <th>Type</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($activities as $activity)
                                        @if(!empty($activity['activity']->vMessage) || $activity['activity']->vRating != 0)
                                        <tr>
                                            <td>{{ $activity['activity']->iTipId }}</td>
                                            <td>
                                                <div class="avatar-container">
                                                    <img src="../assets/images/xs/avatar1.jpg" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="w35 h35 rounded">
                                                </div>
                                                <div class="name-container">
                                                    <span class="font-15">{{ $activity['employee_name'] }}</span><br/>
                                                    <span class="text-muted">{{ $activity['employee_email'] }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="avatar-container">
                                                    <img src="../assets/images/xs/avatar1.jpg" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="w35 h35 rounded">
                                                </div>
                                                <div class="name-container">
                                                    <span class="font-15">{{ $activity['guest_name'] }}</span><br/>
                                                    <span class="text-muted">{{ $activity['guest_email'] }}</span>
                                                </div>
                                            </td>
                                            <td><span><?= date('d M, Y', $activity['activity']->iCreatedAt) ?></span></td>
                                            <td><?= $activity['print_rating'] ?></td>
                                            <td><?= ucwords($activity['activity']->payment_type) ?></td>
                                            <td>
                                                <span class="chart">$ <?= ($activity['activity']->payment_type == 'tips')? number_format($activity['activity']->fTipAmount, 2, '.', '') : number_format($activity['activity']->fPaymentAmount, 2, '.', ''); ?></span>
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
