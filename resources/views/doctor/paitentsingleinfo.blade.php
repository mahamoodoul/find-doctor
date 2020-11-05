@extends('doctor.layout.app')


@section('title', 'Paitent Info')

@section('content')

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h4 class="page-title">Paitent Info</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">

                <div class="form-group">
                    <label>Name</label>
                    <input disabled class="form-control" type="text" value="{{$app_info[0]->paitent_name}}">
                </div>
                <div class="form-group">
                    <label>Meeting Date</label>
                    <input disabled class="form-control" type="text" value="{{$app_info[0]->date}}">
                </div>
                <div class="form-group">
                    <label>Meeting Time</label>
                    <input disabled class="form-control" type="text" value="{{$app_info[0]->slot}}">
                </div>
                <input id="appid" type="hidden" value="{{$app_info[0]->id}}">
                <input id="p_id" type="hidden" value="{{$app_info[0]->paitent_id}}">
                <div class="form-group">
                    <label>Google Meet Link</label>
                    <input id="link" class="form-control" type="text" value="<?php if (isset($video_link[0]->link)) {
                                                                                    echo $video_link[0]->link;
                                                                                } else
                                                                                    echo ""; ?>">
                </div>

                <div class="m-t-20 text-center">
                    <button id="sendtopaitent" class="btn btn-primary submit-btn">Send To Paitent</button>
                </div>

                <div class="m-t-20 text-center">
                    <button id="addreport" data-toggle="modal" data-target="#prescription" class="btn btn-primary submit-btn">Make Prescription</button>

                </div>
                <div class="m-t-20 text-center">
                    <button id="addreport" data-toggle="modal" data-target="#addreportmodal" class="btn btn-primary submit-btn">Meeting Done?</button>
                </div>

            </div>
        </div>
    </div>

</div>


<!-- prescrition -->



























<!-- Central Modal Small -->
<div class="modal fade" id="prescription" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <!-- Change class .modal-sm to change the size of the modal -->
    <div style="max-width: 880px !important;" class="modal-dialog .modal-lg" role="document">


        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title w-100" id="myModalLabel">Modal title</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="add-med">
                    <button id="add_button" class="btn btn-secondary" class="add_form_field">Add Medicine &nbsp; </button>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
                <button id="getmedData" class="btn btn-primary submit-btn">Generate PDF</button>
            </div>
        </div>
    </div>
</div>
<!-- Central Modal Small -->




<!-- Modal -->
<div class="modal fade" id="addreportmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="prescription_modal modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Uplaod Prescription</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="docfile" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="addreportBtn" type="button" class="btn btn-primary">Upload</button>
            </div>

        </div>
    </div>
</div>


@endsection



@section('script')
<script type="text/javascript">
    $('#sendtopaitent').click(function() {
        var app_id = $('#appid').val();
        var link = $('#link').val();
        var p_id = $('#p_id').val();


        if (link.length == 0) {

            toastr.error('Link is empty!');
        } else {


            link_data = [{
                    app_id: app_id,
                    link: link,
                    p_id: p_id
                }

            ];

            var formData = new FormData();
            formData.append('data', JSON.stringify(link_data));


            axios.post('/vidoeLink', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(function(response) {


                    if (response.status = 200) {
                        if (response.data == 1) {


                            toastr.success('Video Link has been Sent.');

                        } else {

                            toastr.error('Link send Failed');

                        }
                    } else {

                        toastr.error('Something Went Wrong');
                    }


                }).catch(function(error) {

                    toastr.error('Something Went Wrong');

                });
        }
    })




    $('#addreportBtn').click(function() {

        var reportpdf = $('#docfile').prop('files')[0];
        var app_id = $('#appid').val();
        var p_id = $('#p_id').val();


        if (reportpdf == "") {
            toastr.error("File not selected");
        } else {

            var formData = new FormData();
            formData.append('pdf', reportpdf);
            prescrition_data = [{
                app_id: app_id,
                p_id: p_id
            }];
            formData.append('pdf_info', JSON.stringify(prescrition_data));





            axios.post("/reportdoc", formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(function(response) {

                    if (response.status == 200 && response.data == 1) {

                        toastr.success('Report Upload Success');
                    } else if (response.data == 2) {
                        toastr.error('Only pdf Format is Acceptable');
                    } else {

                        toastr.error('Report Upload Fail!');
                    }
                }).catch(function(error) {

                    toastr.error('Report Upload Fail!!!');

                })
        }

    })







    //generate pdf version of prescrition

    var max_fields = 10;
    var wrapper = $(".add-med");
    var add_button = $(".add_form_field");
    var x = 1;


    $('#add_button').click(function(e) {
        e.preventDefault();

        if (x < max_fields) {
            x++;
            var data_value = x;
            console.log(data_value);
            $(wrapper).append('<div data-value="' + data_value + '" class=" row">' +
                '<div  class="col-md-4">' +
                '<input name="medname[]"  id="" class="form-control mb-4" placeholder="Enter MEdicine Name">' +

                '</div>' +
                '<div class="col-md-3">' +
                '<input name="medtime[]" type="text" id="" class="form-control mb-4" placeholder="Enter Total Time">' +
                '</div>' +
                '<div class="col-md-3">' +
                '<input name="procedure[]" type="text" id="" class="form-control mb-4" placeholder="Enter Medicine Procedure">' +
                '</div>' +
                '<button style="margin: -1px !important;     width: 129px; margin-bottom: 35px !important;" class="btn btn-danger delete" href="#" >Delete</button>' +
                '</div>  '
            ); //add input box
        } else {
            alert('You Reached the limits')
        }

        $(wrapper).on("click", ".delete", function(e) {
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
            console.log(x);
        })

    });


    $("#getmedData").click(function() {
        var medicinename = [];
        var medicineTime = [];
        var medProcedure = [];
        var medname = document.getElementsByName('medname[]');
        var medtime = document.getElementsByName('medtime[]');
        var procedure = document.getElementsByName('procedure[]');

        console.log(medname);
        for (var i = 0; i < medname.length; i++) {
            var a = medname[i];
            var b = medtime[i];
            var c = procedure[i];
            medicinename[i] = a.value;
            medicineTime[i] = b.value;
            medProcedure[i] = c.value;


        }

        var data = [];
        data.push(medicinename);
        data.push(medicineTime)
        data.push(medProcedure)

        var app_id = $('#appid').val();
        var p_id = $('#p_id').val();

        report_data = [{
                app_id: app_id,
                p_id: p_id,
                prescription: data
            }

        ];

        var formData = new FormData();
        formData.append('data', JSON.stringify(report_data));

        axios.post('/generate-pdf', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
            .then(function(response) {

                toastr.success('Prescrition Downloaded');

            }).catch(function(error) {
                toastr.success('Prescrition Downloaded');
            });

    })
</script>
@endsection