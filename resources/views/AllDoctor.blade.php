@extends('layout.app')


@section('title', 'All Doctor')


@section('content')





<section class="ftco-section bg-light">

    <div class="container">
        <div style="margin-bottom: 20px;">
            <h1>Find Doctor by category</h1>
            <div>
                <select class="browser-default custom-select" name="" id="catselect">
                    <option value="all">All Doctor</option>
                    @foreach ($category as $cat)
                    <option value="{{$cat->category}}">{{$cat->category}}</option>

                    @endforeach
                </select>
            </div>

        </div>
        <div id="docinfo" class=" form-group row">

        </div>
    </div>
</section>

@endsection


@section('script')

<script type="text/javascript">
    var activities = document.getElementById("catselect");
    activities.addEventListener("change", function() {
        var selectoption = document.getElementById("catselect").value;
        $("#docinfo").empty();
        axios.get(`/getdocbycat/${selectoption}`)
            .then(function(response) {

                if (response.status == 200) {


                    var catdocinfo = response.data;
                    console.log(catdocinfo[0][0].name);




                    $.each(catdocinfo, function(i, item) {
                        $('#docinfo').append(

                            '<div class="col-md-6 col-lg-3 ">' +
                            '<div class="staff">' +
                            '<div class="img-wrap d-flex align-items-stretch">' +
                            '<div class="img align-self-stretch" style="background-image: url(' + catdocinfo[i][0].image + ');"> </div>' +
                            '</div>' +

                            '<div class="text text-center">' +

                            '<h3 class="mb-2">' + catdocinfo[i][0].name + '</h3>' +
                            '<span class="position mb-2">' + catdocinfo[i][0].category + '</span>' +
                            '<div class="faded">' +


                            '<h3 class="mb-2">' + catdocinfo[i][0].company_name + '</h3>' +
                            '<h3 class="mb-2">' + catdocinfo[i][0].job_position + '</h3>' +

                            '<ul class="ftco-social text-center">' +
                            '<li class=""><a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a></li>' +
                            '<li class=""><a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a></li>' +
                            '<li class=""><a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-google"></span></a></li>' +
                            '<li class=""><a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"></span></a></li>' +
                            '</ul>' +
                            '<input class="doctor_id" type="hidden" value="${catdocinfo[i][0].docotr_id}">' +
                            '<a class="gointodocpage appointment takeAppointment" data-id=' + catdocinfo[i][0].doctor_id + '>Take Appointment</a>' +

                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>'
                        );
                    });


                    //courses click on delete icon

                    $(".gointodocpage").click(function() {

                        var id = $(this).data('id');
                        gointodocPage(id);

                    })

                    $("#docinfo").show();
                } else {

                }

            }).catch(function(error) {


            });
    });

    function gointodocPage(doc_id){

        window.location.href = `doctor/${doc_id}`;
    }
</script>

@endsection