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

                <!-- <td> <a class=" btn btn-secondary" href="{{$presinfo['prescriton_link']}}">View</a></td> -->
                <td> <button data-id="{{$presinfo['prescriton_link']}}" class="view_pdf btn btn-secondary">Show</button></td>

                <td><a class=" btn btn-secondary" href="storage/{{$presinfo['prescriton_link']}}">Download</a></td>
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
            <div class="modal-body">
                <embed id="pdf_src" src="" frameborder="0" type="application/pdf" height="100%" width="100%">

            </div>
            <div class="modal-footer-full-width  modal-footer">
                <button type="button" class="btn btn-danger btn-md btn-rounded" data-dismiss="modal">Close</button>

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

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3 ftco-animate">
                <div class="pricing-entry pb-5 text-center">
                    <div>
                        <h3 class="mb-4">Basic</h3>
                        <p><span class="price">$24.50</span> <span class="per">/ session</span></p>
                    </div>
                    <ul>
                        <li>Diagnostic Services</li>
                        <li>Professional Consultation</li>
                        <li>Tooth Implants</li>
                        <li>Surgical Extractions</li>
                        <li>Teeth Whitening</li>
                    </ul>
                    <p class="button text-center"><a href="#" class="btn btn-primary px-4 py-3">Get Offer</a></p>
                </div>
            </div>
            <div class="col-md-3 ftco-animate">
                <div class="pricing-entry pb-5 text-center">
                    <div>
                        <h3 class="mb-4">Standard</h3>
                        <p><span class="price">$34.50</span> <span class="per">/ session</span></p>
                    </div>
                    <ul>
                        <li>Diagnostic Services</li>
                        <li>Professional Consultation</li>
                        <li>Tooth Implants</li>
                        <li>Surgical Extractions</li>
                        <li>Teeth Whitening</li>
                    </ul>
                    <p class="button text-center"><a href="#" class="btn btn-primary px-4 py-3">Get Offer</a></p>
                </div>
            </div>
            <div class="col-md-3 ftco-animate">
                <div class="pricing-entry active pb-5 text-center">
                    <div>
                        <h3 class="mb-4">Premium</h3>
                        <p><span class="price">$54.50</span> <span class="per">/ session</span></p>
                    </div>
                    <ul>
                        <li>Diagnostic Services</li>
                        <li>Professional Consultation</li>
                        <li>Tooth Implants</li>
                        <li>Surgical Extractions</li>
                        <li>Teeth Whitening</li>
                    </ul>
                    <p class="button text-center"><a href="#" class="btn btn-primary px-4 py-3">Get Offer</a></p>
                </div>
            </div>
            <div class="col-md-3 ftco-animate">
                <div class="pricing-entry pb-5 text-center">
                    <div>
                        <h3 class="mb-4">Platinum</h3>
                        <p><span class="price">$89.50</span> <span class="per">/ session</span></p>
                    </div>
                    <ul>
                        <li>Diagnostic Services</li>
                        <li>Professional Consultation</li>
                        <li>Tooth Implants</li>
                        <li>Surgical Extractions</li>
                        <li>Teeth Whitening</li>
                    </ul>
                    <p class="button text-center"><a href="#" class="btn btn-primary px-4 py-3">Get Offer</a></p>
                </div>
            </div>
        </div>
    </div>
</section>




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


        // $('#datatable').empty();
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
       
        var pdf_file = $(this).data("id");
        var full_link = "storage/" + pdf_file;
        console.log(full_link);
        var pdf_src = document.getElementById("pdf_src");
        pdf_src.src = full_link;
        $('#pdf_link').html(app_id);
        $('#pdfViewModal').modal('show');

    })


   
</script>

@endsection
<h3 hidden id=""></h3>