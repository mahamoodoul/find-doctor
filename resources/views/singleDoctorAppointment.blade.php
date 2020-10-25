@extends('layout.app')


@section('title', 'Doctor Appointment')


@section('content')

<div class="container doctorsingle">
    <h4 class="text-center">Appointment Form</h4>

    <div class="row">
        <div class="col-6">
            @foreach($doctorAllInfo as $info)
            <img class="imageDoc" src="{{$info->image}}" alt="">
            <input id="doc_id" type="hidden" value="{{$info->id}}">
            <h5>Dr. {{$info->name}}</h5>
            <h5>{{$info->category}}</h5>
            <h5>{{$info->company_name}}</h5>
            <h5>{{$info->job_position}}</h5>
            <h5>{{$info->degree}}</h5>
            @endforeach

        </div>
        <div class="col-6">
            <div class="appointment-wrap p-4 p-lg-5 d-flex align-items-center">
                <div action="#" class="appointment-form ftco-animate">


                    <div class="form-group">
                        <div class="input-wrap">
                            <div class="icon"><span class="fa fa-calendar"></span></div>
                            <input id="date" type="text" class="form-control appointment_date" placeholder="Date">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-field">
                            <div class="select-wrap">
                                <div class="icon"><span class="fa fa-chevron-down"></span></div>
                                <select id="slot" class="browser-default custom-select" class="form-control">
                                    <option value="0">Select Time Slot</option>
                                    @for ($i = 0 ;$i < count($slotall); $i++) <option value="{{$slotall[$i]}}">{{$slotall[$i]}}</option>
                                        @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="form-group">
                            <textarea id="message" placeholder="Any message for doctor?" name="" id="" cols="30" rows="2" class="form-control" placeholder="Message"></textarea>
                        </div>
                        <div class="form-group">
                            <input id="takeAppointment" type="submit" value="Appointment" class="btn btn-secondary py-3 px-4">
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
    $('#takeAppointment').click(function() {

        var doc_id = $('#doc_id').val();

        var date = $('#date').val();
        var slot = $('#slot').val();

        var message = $('#message').val();



        if (date.length == 0) {
            toastr.error(" Date is empty!");
        } else if (slot == 0) {
            toastr.error("Slot is empty!");
        } else {
            $("#takeAppointment").html(
                "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"
            ); //animation

            appointment_data = [{
                doc_id: doc_id,
                date: date,
                slot: slot,
                message: message,
            }, ];
            var formData = new FormData();
            formData.append("appointment_data", JSON.stringify(appointment_data));

            axios
                .post("/appointmentinfo", formData, {
                    headers: {
                        "Content-Type": "multipart/form-data",
                    },
                })
                .then(function(response) {


                    if ((response.status = 200)) {
                        if (response.data == 1) {
                            console.log(response.data);

                            toastr.success("Appointment Done successfully");
                            $('#date').val("");
                            $('#slot').val("Select Time Slot");
                            $('#message').val("");
                            // window.location.href = "/";
                        } else if (response.data == 2) {

                            toastr.error("Slot is not available.Select another one");

                        } else {
                            toastr.error("Something went wrong!!!");
                        }
                    } else {
                        toastr.error("Something went wrong!!!");
                    }
                })
                .catch(function(error) {
                    toastr.error("Something Went Wrong");
                });
        }
    })
</script>

@endsection