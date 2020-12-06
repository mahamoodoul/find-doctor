@extends('doctor.layout.app')


@section('title', 'Doctor Homepage')

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
                        <h4 class="card-title d-inline-block">Upcoming Appointments</h4> <a href="appointments.html" class="btn btn-primary float-right">View all</a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="">
                                    <tr>
                                        <th>Patient Name</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Message</th>
                                        <th class="">Status</th>
                                        <th class="">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="appointmentTable">




                                </tbody>
                            </table>
                            <p id="paitent_id"></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
</div>


@endsection




@section('script')
<script type="text/javascript">
    getAppointmentInfo();

    function getAppointmentInfo() {

        axios.get('/getappointment')
            .then(function(response) {

                if (response.status = 200) {


                    var appointmentData = response.data;
                    console.log(appointmentData);
                    $.each(appointmentData, function(i, item) {
                        $('<tr>').html(

                            "<td>" + appointmentData[i].paitent_name + " </td>" +
                            "<td>" + appointmentData[i].date + " </td>" +
                            "<td>" + appointmentData[i].slot + " </td>" +

                            //eikhane if condition apply ki kora jabe?
                            "<td>" + appointmentData[i].message + " </td>" +
                            (appointmentData[i].status == 0 ?
                                "<td> <button class='btn btn-primary' type='button'>Pending</button> </td>" :
                                "<td><button class='btn btn-secondary' type='button'>Completed</button> </td>") +

                                "<td><a href='/paitentdescription/"+ appointmentData[i].paitent_id+"/"+ appointmentData[i].date + "/" + appointmentData[i].slot +"' class='checkpaitent btn btn-primary'>Take up </td>"
                        ).appendTo('#appointmentTable');



                        // $(".checkpaitent").click(function() {

                        //     var id = $(this).data('id');
                        //     alert(id);
                        //     $('#paitent_id').html(id);

                        //     // $('#productModalCourse').modal('show');

                        // })
                    });

                } else {
                    toaster.error("loading failed Data");

                }
            }).catch(function(error) {
                toaster.error("loading failed Data");

            });



    }
</script>

@endsection
