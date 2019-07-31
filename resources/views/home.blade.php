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
                    <div class="col-md-6 col-sm-12">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-6 col-md-3 col-xl-3">
                    <div class="card">
                        <div class="body ribbon">
                            <h2>45</h2>
                            <span>Total Staff</span>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3 col-xl-3">
                    <div class="card">
                        <div class="body">
                            <h2>4.8/5</h2>
                            <span>Customer Rating</span>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3 col-xl-3">
                    <div class="card">
                        <div class="body ribbon">
                            <h2>$1.5K</h2>
                            <span>Total Payments</span>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3 col-xl-3">
                    <div class="card">
                        <div class="body">
                            <h2>$574.15</h2>
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
                            <div id="chart-bar-stacked" style="height: 130px"></div>
                            <hr>
                            <div class="row clearfix">
                                <div class="col-6">
                                    <h6 class="mb-0">50</h6>
                                    <small class="text-muted">Male</small>
                                </div>
                                <div class="col-6">
                                    <h6 class="mb-0">17</h6>
                                    <small class="text-muted">Female</small>
                                </div>
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
                                    <h6 class="mb-0">195</h6>
                                    <small class="text-muted">Last Month</small>
                                </div>
                                <div class="col-6">
                                    <h6 class="mb-0">163</h6>
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
