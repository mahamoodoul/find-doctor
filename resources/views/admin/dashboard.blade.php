@extends('admin.layout.app')


@section('title', 'Admin Homepage')

@section('content')


<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="dash-widget">
                    <span class="dash-widget-bg1"><i class="fa fa-stethoscope" aria-hidden="true"></i></span>
                    <div class="dash-widget-info text-right">
                        <h3>98</h3>
                        <span class="widget-title1">Doctors <i class="fa fa-check" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="dash-widget">
                    <span class="dash-widget-bg2"><i class="fa fa-user-o"></i></span>
                    <div class="dash-widget-info text-right">
                        <h3>1072</h3>
                        <span class="widget-title2">Patients <i class="fa fa-check" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="dash-widget">
                    <span class="dash-widget-bg3"><i class="fa fa-user-md" aria-hidden="true"></i></span>
                    <div class="dash-widget-info text-right">
                        <h3>72</h3>
                        <span class="widget-title3">Attend <i class="fa fa-check" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="dash-widget">
                    <span class="dash-widget-bg4"><i class="fa fa-heartbeat" aria-hidden="true"></i></span>
                    <div class="dash-widget-info text-right">
                        <h3>618</h3>
                        <span class="widget-title4">Pending <i class="fa fa-check" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title d-inline-block">Pending Doctors</h4> <a href="appointments.html" class="btn btn-primary float-right">View all</a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="">
                                    <tr>
                                        <th>Dr. Name</th>
                                        <th>Email</th>
                                        <th>Company Name</th>
                                        <th>Position</th>
                                        <th>Institution</th>
                                        <th>Subject</th>
                                        <th class="text-right">Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php if (count($docinfo) > 0) {
                                        $j = 0;
                                        for ($i = 0; $i < count($docinfo); $i++) {
                                    ?>

                                            <tr>
                                                <td style="min-width: 200px;">
                                                    <a class="avatar" href="profile.html">B</a>
                                                    <h2><a href="profile.html">{{$docinfo[$i][$j]->name}} <span>{{$docinfo[$i][$j]->address}}</span></a></h2>
                                                </td>
                                                <td>
                                                    <h5 class="time-title p-0">{{$docinfo[$i][$j]->email}}</h5>
                                                </td>
                                                <td>
                                                    <h5 class="time-title p-0">{{$docinfo[$i][$j]->company_name}}</h5>
                                                </td>
                                                <td>
                                                    <h5 class="time-title p-0">{{$docinfo[$i][$j]->job_position}}</h5>
                                                </td>
                                                <td>
                                                    <h5 class="time-title p-0">{{$docinfo[$i][$j]->institution}}</h5>
                                                </td>
                                                <td>
                                                    <h5 class="time-title p-0">{{$docinfo[$i][$j]->subject}}</h5>
                                                </td>

                                                <td class="text-right">
                                                    <a href="appointments.html" class="btn btn-outline-primary take-btn">Take up</a>
                                                </td>
                                            </tr>
                                        <?php }  ?>
                                        <?php } else { ?>
                                            <div style="color: red;" class="mt-5 ml-5 text-center">
                                                <h3>Now there are no Doctor for approval.</h3>
                                            </div>
                                        <?php } ?>

                                </tbody>
                            </table>
                        
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-8 col-xl-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title d-inline-block">New Patients </h4> <a href="patients.html" class="btn btn-primary float-right">View all</a>
                    </div>
                    <div class="card-block">
                        <div class="table-responsive">
                            <table class="table mb-0 new-patient-table">
                                <tbody>
                                    <tr>
                                        <td>
                                            <img width="28" height="28" class="rounded-circle" src="assets/img/user.jpg" alt="">
                                            <h2>John Doe</h2>
                                        </td>
                                        <td>Johndoe21@gmail.com</td>
                                        <td>+1-202-555-0125</td>
                                        <td><button class="btn btn-primary btn-primary-one float-right">Fever</button></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img width="28" height="28" class="rounded-circle" src="assets/img/user.jpg" alt="">
                                            <h2>Richard</h2>
                                        </td>
                                        <td>Richard123@yahoo.com</td>
                                        <td>202-555-0127</td>
                                        <td><button class="btn btn-primary btn-primary-two float-right">Cancer</button></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img width="28" height="28" class="rounded-circle" src="assets/img/user.jpg" alt="">
                                            <h2>Villiam</h2>
                                        </td>
                                        <td>Richard123@yahoo.com</td>
                                        <td>+1-202-555-0106</td>
                                        <td><button class="btn btn-primary btn-primary-three float-right">Eye</button></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img width="28" height="28" class="rounded-circle" src="assets/img/user.jpg" alt="">
                                            <h2>Martin</h2>
                                        </td>
                                        <td>Richard123@yahoo.com</td>
                                        <td>776-2323 89562015</td>
                                        <td><button class="btn btn-primary btn-primary-four float-right">Fever</button></td>
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