@extends('layouts.dashboard')

@section('content')

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<div id="wrapper" class="home">
    @include('partials.sidebar')

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-12 col-sm-12">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-6 col-md-3 col-xl-3">
                    <div class="card">
                        <div class="body ribbon">
                            <h2>{{ $user->employees->count() }}</h2>
                            <span>Total Staff</span>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3 col-xl-3">
                    <div class="card">
                        <div class="body">
                            <h2>{{ $total['rating'] }}/5</h2>
                            <span>Customer Rating</span>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3 col-xl-3">
                    <div class="card">
                        <div class="body ribbon">
                            <h2>$ {{ $total['payment'] }}</h2>
                            <span>Total Payments</span>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3 col-xl-3">
                    <div class="card">
                        <div class="body">
                            <h2>$ {{ $total['tips'] }}</h2>
                            <span>Total Tips</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6">
                    <div class="header">
                        <h2>Overall Guest Satisfaction</h2>
                    </div>
                    <div class="card">
                        <div class="body text-center">
                            <div id="chart-guest-satisfication" style="height: 130px"></div>
                            <hr>
                            <div class="row clearfix">
                                <div class="col-6">
                                    <h6 class="mb-0">{{ $customer_ratings[4] }}</h6>
                                    <small class="text-muted">Last Month</small>
                                </div>
                                <div class="col-6">
                                    <h6 class="mb-0">{{ $customer_ratings[5] }}</h6>
                                    <small class="text-muted">This Month</small>
                                </div>
                                <input type="text" style="display:none;" id="customer_ratings" value="<?= implode(',', $customer_ratings); ?>">
                                <input type="text" style="display:none;" id="reviews_count" value="<?= implode(',', $reviews_count); ?>">
                                <input type="text" style="display:none;" id="rating_months" value="{{ $total['months'] }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header">
                        <h2>Five Star Reviews</h2>
                    </div>
                    <div class="card">
                        <div class="body text-center">
                            <div id="chart-area-spline-sracked" style="height: 130px"></div>
                            <hr>
                            <div class="row clearfix">
                                <div class="col-6">
                                    <h6 class="mb-0">{{ $reviews_count[4] }}</h6>
                                    <small class="text-muted">Last Month</small>
                                </div>
                                <div class="col-6">
                                    <h6 class="mb-0">{{ $reviews_count[5] }}</h6>
                                    <small class="text-muted">This Month</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="header">
                    <h2>Recently Activity</h2>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example table-custom spacing5 mb-0">
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
                                            <span class="chart">$ <?= ($activity['activity']->payment_type == 'tips')? number_format($activity['activity']->fTipAmount, 2, '.', '') : number_format($activity['activity']->fPaymentAmount, 2, '.', '') ?></span>
                                        </td>
                                    </tr>
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
