@extends('layout.app')


@section('title', 'Your Dashboard')


@section('content')

@if (count($app_info)>0)
<section style="margin-top: 50px;" class="container">
    <h3>Your Upcomming Appointment List</h3>
    <table class="table">
        <thead class="black white-text">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Doctor Name</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">Cancel</th>
            </tr>
        </thead>
        <tbody id="datatable">
            {{$i=1}}
            @foreach ($app_info as $info)
            <tr>
                <th scope="row">{{$i++}}</th>
                <td>{{$info['name']}}</td>
                <td>{{$info['date']}}</td>
                <td>{{$info['slot']}}</td>
                <td> <button data-id="{{$info['id']}}" class="app_del btn btn-secondary">Yes</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>

</section>
@endif


@if (count($totalpresinfo)>0)
<section style="margin-top: 50px;" class="container">
    <h3>Your Completed Appointment List</h3>
    <table class="table">
        <thead class="black white-text">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Doctor Name</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">View Report</th>
                <th scope="col">Report</th>
            </tr>
        </thead>
        <tbody id="">
            {{$j=1}}
            @foreach ($totalpresinfo as $presinfo)

            <tr>
                <th scope="row">{{$j++}}</th>
                <td>{{$presinfo['name']}}</td>
                <td>{{$presinfo['date']}}</td>
                <td>{{$presinfo['slot']}}</td>

                <td> <button style="margin-top: 2px;" data-id="{{$presinfo['app_id']}}" class="view_pdf btn btn-secondary">Show</button></td>
                <td> <a class=" btn btn-secondary" href="{{route ('genarate.pdf', $presinfo['app_id'] ) }}">Generate</a></td>

            </tr>

            @endforeach
        </tbody>
    </table>

</section>
@endif




<!-- pdf view -->
<div class="modal fade right" id="pdfViewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
    <div style="height: 100% !important; max-height: 100% !important;" class="modal-dialog-full-width modal-dialog momodel modal-fluid" role="document">
        <div style="height: 100% !important; max-height: 100% !important;" class="modal-content-full-width modal-content ">
            <div class=" modal-header-full-width   modal-header text-center">
                <h5 id="pdf_link"></h5>
                <h5 class="modal-title w-100" id="exampleModalPreviewLabel">Your Prescription</h5>
                <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                    <span style="font-size: 1.3em;" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="container modal-body">
                <div class=" row">


                    <div  class="col-md-6 mb-5 mt-5  ">

                        <h3>Name: Dr.<span id="doc_name"></span></h3>
                        <h3>Degree: <span id="degree"></span> in <span id="subject"></span> </h3>
                        <h3>Psition : <span id="position"></span> In <span id="company_name"></span></h3>
                        <h3><span id="institution"></span></h3>
                    </div>

                    <div class="col-md-6 mt-5">
                        <h1>Find A Doctor LTD</h1>
                        <h3 class="address">Address: Shukrabad,Dhanmondi</h3>
                    </div>

                </div>



                <table id="customers" class="table">
                    <thead class="black white-text">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Medicine Name</th>
                            <th scope="col">Medicine Time</th>
                            <th scope="col">Procedure</th>
                        </tr>
                    </thead>
                    <tbody id="med_table">


                    </tbody>
                </table>

                <div style="background-color: green;" class="footer text-center">
                    <p style="font-weight: bold; color:black">Find A Doctor</p>
                </div>

            </div>
            <div class="modal-footer-full-width  modal-footer">
                <button id="closemodal" type="button" class="btn btn-danger btn-md btn-rounded" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
<!-- pdf view end -->















<!-- Modal -->
<div class="modal fade" id="appointmentDel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 hidden id="app_id"></h3>
                <h5 class="modal-title" id="exampleModalLabel">Want to Cancel your Appointment??</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="delapp" type="button" class="btn btn-primary">Sure!!</button>
            </div>
        </div>
    </div>
</div>






@endsection


@section('script')


<script type="text/javascript">
    $('.app_del').click(function() {
        var app_id = $(this).data("id");
        // alert(app_id);
        $('#app_id').html(app_id);
        $('#appointmentDel').modal('show');

    })

    $('#delapp').click(function() {
        var appid = $('#app_id').html();



        axios.post('/appointmentDel', {
                appid: appid
            })
            .then(function(response) {


                if (response.status == 200) {
                    if (response.data == 1) {
                        $('#appointmentDel').modal('hide');
                        toastr.success('Delete Success.');
                        // $('#datatable').show();
                        window.location.reload();
                    } else {
                        $('#appointmentDel').modal('hide');
                        toastr.error('Delete Failed');

                    }

                } else {
                    $('#appointmentDel').modal('hide');
                    toastr.error('Something Went Wrong');
                }

            }).catch(function(error) {

                $('#appointmentDel').modal('hide');
                toastr.error('Something Went Wrong');

            });

    })




    $('.view_pdf').click(function() {


        var appointment_id = $(this).data("id");
        console.log(appointment_id);
        axios.get(`/viewMedicine/${appointment_id}`)
            .then(function(response) {

                var data = response.data;
                var med_name = (data['med_name']);
                var med_time = (data['med_time']);
                var procedure = (data['procedure']);
                var doc_info = data['doc_info'][0];



                $('#doc_name').html(doc_info.name);
                $('#degree').html(doc_info.degree);
                $('#subject').html(doc_info.subject);
                $('#position').html(doc_info.job_position);
                $('#institution').html(doc_info.institution);
                $('#company_name').html(doc_info.company_name);
                var j = 1;
                $('#med_table').empty();
                $.each(med_name, function(i) {
                    $('<tr>').html(

                        "<td>" + j++ + " </td>" +
                        "<td>" + med_name[i] + " </td>" +
                        "<td>" + med_time[i] + " </td>" +
                        "<td>" + procedure[i] + " </td>"

                    ).appendTo('#med_table');
                });

            })
            .catch(function(error) {
                console.log(error);
            })

        $('#pdfViewModal').modal('show');
    })
</script>

@endsection
