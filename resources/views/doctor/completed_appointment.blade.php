@extends('doctor.layout.app')


@section('title', 'Completed appointment paitent info')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <h3>Completed Appoinment list </h3>
            <div class="table-responsive">
                <table id="table_id" class="display">
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
                    @foreach ($data as $item)


                        <tbody>
                            <tr>
                                <td>{{ $item->paitent_name }}</td>
                                <td>{{ $item->slot }}</td>
                                <td>{{ $item->date }}</td>
                                <td>{{ $item->message }}</td>
                                <td style="margin-top: 20px;" class="btn btn-danger">Completed</td>

                                <td>
                                    <button target="_blank" data-id="{{$item->id}}" target="_blank" class="view_pdf_doc btn btn-default">see prescription</button>
                                </td>
                            </tr>

                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>




    <!-- pdf view -->
    <div class="modal fade right" id="pdfViewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel"
        aria-hidden="true">
        <div style="height: 100% !important; max-height: 100% !important;"
            class="modal-dialog-full-width modal-dialog momodel modal-fluid" role="document">
            <div style="height: 100% !important; max-height: 100% !important;"
                class="modal-content-full-width modal-content ">
                <div class=" modal-header-full-width   modal-header text-center">
                    <h5 id="pdf_link"></h5>
                    <h5 class="modal-title w-100" id="exampleModalPreviewLabel">Paitent Prescription</h5>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span style="font-size: 1.3em;" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="container modal-body">
                    <div class=" row">


                        <div class="col-md-6 mb-5 mt-5  ">

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
                    <button id="closemodal" type="button" class="btn btn-danger btn-md btn-rounded"
                        data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
    <!-- pdf view end -->

@endsection




@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#table_id').DataTable();
        });

        $('.view_pdf_doc').click(function() {


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
