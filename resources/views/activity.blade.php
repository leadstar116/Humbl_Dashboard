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
                                            <span class="chart">$ <?= number_format($activity['activity']->fAmount, 2, '.', '') ?></span>
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
                                                <span class="chart">$ <?= number_format($activity['activity']->fAmount, 2, '.', '') ?></span>
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
                                                <span class="chart">$ <?= number_format($activity['activity']->fAmount, 2, '.', '') ?></span>
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
                                    <tr>
                                        <td class="w60">
                                            <label class="fancy-checkbox">
                                                <input class="checkbox-tick" type="checkbox" name="checkbox">
                                                <span></span>
                                            </label>
                                            <div class="avtar-pic w35 bg-red" data-toggle="tooltip" data-placement="top" title="Avatar Name"><span>MN</span></div>
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
                                    <tr>
                                        <td class="w60">
                                            <label class="fancy-checkbox">
                                                <input class="checkbox-tick" type="checkbox" name="checkbox">
                                                <span></span>
                                            </label>
                                            <img src="../assets/images/xs/avatar1.jpg" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="w35 h35 rounded">
                                        </td>
                                        <td>
                                            <div class="font-15">Susie Willis</div>
                                            <span class="text-muted">sussie-w@gmail.com</span>
                                        </td>
                                        <td><span>LA-0216</span></td>
                                        <td><span>+ 264-625-2583</span></td>
                                        <td>28 Jun, 2015</td>
                                        <td>Web Developer</td>
                                        <td>
                                            <span class="chart">5,3,7,8,6,1,4,9</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w60">
                                            <label class="fancy-checkbox">
                                                <input class="checkbox-tick" type="checkbox" name="checkbox">
                                                <span></span>
                                            </label>
                                            <div class="avtar-pic w35 bg-pink" data-toggle="tooltip" data-placement="top" title="Avatar Name"><span>MN</span></div>
                                        </td>
                                        <td>
                                            <div class="font-15">Debra Stewart</div>
                                            <span class="text-muted">debra@gmail.com</span>
                                        </td>
                                        <td><span>LA-0218</span></td>
                                        <td><span>+ 264-625-2583</span></td>
                                        <td>21 July, 2015</td>
                                        <td>Web Developer</td>
                                        <td>
                                            <span class="chart">-5,3,7,8,6,1,4,9</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w60">
                                            <label class="fancy-checkbox">
                                                <input class="checkbox-tick" type="checkbox" name="checkbox">
                                                <span></span>
                                            </label>
                                            <img src="../assets/images/xs/avatar2.jpg" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="w35 h35 rounded">
                                        </td>
                                        <td>
                                            <div class="font-15">Francisco Vasquez</div>
                                            <span class="text-muted">francisv@gmail.com</span>
                                        </td>
                                        <td><span>LA-0222</span></td>
                                        <td><span>+ 264-625-2583</span></td>
                                        <td>18 Jan, 2016</td>
                                        <td>Team Leader</td>
                                        <td>
                                            <span class="chart">5,3,7,8,6,1,-4,9</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w60">
                                            <label class="fancy-checkbox">
                                                <input class="checkbox-tick" type="checkbox" name="checkbox">
                                                <span></span>
                                            </label>
                                            <img src="../assets/images/xs/avatar3.jpg" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="w35 h35 rounded">
                                        </td>
                                        <td>
                                            <div class="font-15">Jane Hunt</div>
                                            <span class="text-muted">jane-hunt@gmail.com</span>
                                        </td>
                                        <td><span>LA-0232</span></td>
                                        <td><span>+ 264-625-2583</span></td>
                                        <td>08 Mar, 2016</td>
                                        <td>Android Developer</td>
                                        <td>
                                            <span class="chart">5,-3,7,8,6,-1,4,9</span>
                                        </td>
                                    </tr>
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
