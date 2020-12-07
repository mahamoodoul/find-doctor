@extends('admin.layout.app')


@section('title', 'Doctor Category')

@section('content')

    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Doctor Speciallist Information</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card-box">
                        <h4 class="card-title">You have these number of available Category</h4>


                        <div id="showCategory" class=" form-group row">

                        </div>

                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="card-box">
                        <h4 class="card-title">Doctor Specalist Update</h4>


                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Add Specalist</label>
                            <div class="col-md-10">
                                <input id="catinput" class="form-control" type="text" placeholder="Enter new Category">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-10">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <button id="addslot" style="margin-left: 500px;" class="btn btn-primary"
                                            type="button">AddNow</button>
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


            var cat = $('#catinput').val();
            console.log(cat);
                $('#addslot').html("Updating");
                $('showslot').addClass('d-none');
                axios.post('/categoryAdd', {
                    cat: cat
                    })
                    .then(function(response) {

                        $('#addslot').html("Update");

                        if (response.status = 200) {

                            if (response.data == 1) {

                                // toastr.success('Added the category .');
                                callTotalSlot();
                                $('showslot').removeClass('d-none');
                                // window.location.href = "edit_profile";
                                $('#catinput').val("");

                            } else {
                                // toastr.error('Add New category Failed');
                            }
                        } else {
                            // toastr.error('Something Went Wrong');
                        }

                    }).catch(function(error) {
                        // toastr.error('Something Went Wrong !!!!!!!!');
                    });





        });


        function callTotalSlot() {
            $("#showCategory").empty();
            axios.get('/getDoctorcat')
                .then(function(response) {

                    if (response.status = 200) {


                        var slotdata = response.data;
                        console.log(slotdata);
                        var count = 1;
                        $.each(slotdata, function(i, item) {
                            $('#showCategory').append(
                                '<label class="col-form-label col-md-2">' + (count++) + '</label>' +
                                '<div class="col-md-10">' +
                                '<label style="width:100%;" class="col-form-label col-md-2">' + slotdata[i]
                                .category + '</label>' +
                                '</div>'
                            );
                        });

                        $("#showCategory").show();
                    } else {
                        toaster.error("loading failed Data");

                    }
                }).catch(function(error) {
                    toaster.error("loading failed Data");

                });

        }

    </script>
@endsection
