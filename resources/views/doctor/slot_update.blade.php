@extends('doctor.layout.app')


@section('title', 'Your Profile')

@section('content')

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">your slot Information</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card-box">
                    <h4 class="card-title">You have these number of available slot</h4>


                    <div id="showslot" class=" form-group row">

                    </div>

                </div>

            </div>
            <div class="col-lg-6">
                <div class="card-box">
                    <h4 class="card-title">Slot Update</h4>


                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Add Slot</label>
                        <div class="col-md-10">
                            <select id="slotSelect" multiple class="custom-select form-control  browser-default custom-select" >
                                <option value="0">-- Select --</option>
                                <option value="8:00am">8:00 am</option>
                                <option value="8:30am">8:30 am</option>
                                <option value="9:00am">9:00 am</option>
                                <option value="9:30am">9:30 am</option>
                                <option value="10:00am">10:00 am</option>
                                <option value="10:30am">10:30 am</option>
                                <option value="11:00am">11:00 am</option>
                                <option value="11:30am">11:30 am</option>
                                <option value="12:00pm">12:00 pm</option>
                                <option value="12:30pm">12:30 pm</option>
                                <option value="01:00pm">01:00 pm</option>
                                <option value="01:30pm">01:30 pm</option>
                                <option value="02:00pm">02:00 pm</option>
                                <option value="02:30pm">02:30 pm</option>
                                <option value="03:00pm">03:00 pm</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <div class="input-group">
                                <div class="input-group-append">
                                    <button id="addslot" style="margin-left: 500px;" class="btn btn-primary" type="button">Update</button>
                                </div>
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
    callTotalSlot();
    $('#addslot').click(function() {


        var slot = $('#slotSelect').val();
        console.log(slot.length);
        // var run = 1;
        for (var i = 0; i < slot.length; i++) {
            if (slot[i] == 0) {
                toastr.error('Must be select Slot!!');
                break;
            } else {
                var run = 1;
            }
        }
        if (run == 1) {
            $('#addslot').html("Updating");
            $('showslot').addClass('d-none');
            axios.post('/slotAdd', {
                    slot: slot
                })
                .then(function(response) {

                    $('#addslot').html("Update");

                    if (response.status = 200) {

                        if (response.data == 1) {

                            toastr.success('Add the slot .');
                            callTotalSlot();
                            $('showslot').removeClass('d-none');
                            // window.location.href = "edit_profile";


                        } else {
                            toastr.error('Add New slot Failed');
                        }
                    } else {
                        toastr.error('Something Went Wrong');
                    }

                }).catch(function(error) {
                    toastr.error('Something Went Wrong !!!!!!!!');
                });




        }
    });


    function callTotalSlot() {
        $("#showslot").empty();
        axios.get('/getDoctorSlot')
            .then(function(response) {

                if (response.status = 200) {


                    var slotdata = response.data;
                    console.log(slotdata);
                    var count = 1;
                    $.each(slotdata, function(i, item) {
                        $('#showslot').append(
                            '<label class="col-form-label col-md-2">Slot :' + (count++) + '</label>' +
                            '<div class="col-md-10">' +
                            '<label class="col-form-label col-md-2">' + slotdata[i] + '</label>' +
                            '</div>'
                        );
                    });
                   
                    $("#showslot").show();
                } else {
                    toaster.error("loading failed Data");

                }
            }).catch(function(error) {
                toaster.error("loading failed Data");

            });

    }
</script>
@endsection