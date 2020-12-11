@extends('layout.app')


@section('title', 'Contact us')


@section('content')






    <section class="ftco-section contact-section">
        <div class="container">
            <div class="row d-flex contact-info mb-5">
                <div class="col-md-6 col-lg-3 d-flex ftco-animate">
                    <div class="align-self-stretch box p-4 text-center bg-light">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="flaticon-flag"></span>
                        </div>
                        <h3 class="mb-4">Address</h3>
                        <p>198 West 21th Street, Suite 721 New York NY 10016</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 d-flex ftco-animate">
                    <div class="align-self-stretch box p-4 text-center bg-light">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="flaticon-phone-call"></span>
                        </div>
                        <h3 class="mb-4">Contact Number</h3>
                        <p><a href="tel://1234567920">+ 1235 2355 98</a></p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 d-flex ftco-animate">
                    <div class="align-self-stretch box p-4 text-center bg-light">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="flaticon-paper-plane"></span>
                        </div>
                        <h3 class="mb-4">Email Address</h3>
                        <p><a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 d-flex ftco-animate">
                    <div class="align-self-stretch box p-4 text-center bg-light">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="flaticon-world-wide-web-on-grid"></span>
                        </div>
                        <h3 class="mb-4">Website</h3>
                        <p><a href="#">yoursite.com</a></p>
                    </div>
                </div>
            </div>
            <div class="row no-gutters block-9">
                <div class="col-md-6 order-md-last d-flex">
                    <div class="bg-light p-5 contact-form">
                        <div class="form-group">
                            <input id="e_name" type="text" class="form-control" placeholder="Your Name" />
                        </div>
                        <div class="form-group">
                            <input id="e_email" type="text" class="form-control" placeholder="Your Email" />
                        </div>
                        <div class="form-group">
                            <input id="phone" type="text" class="form-control" placeholder="Your Phone" />
                        </div>
                        <div class="form-group">
                            <input id="subject" type="text" class="form-control" placeholder="Subject" />
                        </div>
                        <div class="form-group">
                            <textarea name="" id="message" cols="30" rows="7" class="form-control"
                                placeholder="Message"></textarea>
                        </div>
                        <div class="form-group">
                            <input id="emergencyClick" type="submit" value="Send Message"
                                class="btn btn-secondary py-3 px-5" />
                        </div>
                    </div>
                </div>

                <div class="col-md-6 d-flex">
                    <div id="map" class="bg-white"></div>
                </div>
            </div>
        </div>
    </section>


@endsection



@section('script')


    <script type="text/javascript">
        $("#emergencyClick").click(function() {
            var name = $('#e_name').val();
            var email = $('#e_email').val();
            var phone = $('#phone').val();
            var subject = $('#subject').val();
            var message = $('#message').val();



            if (name.length == 0) {
                toastr.error(" Name is empty!");
            } else if (email.length == 0) {
                toastr.error("Email is empty!");
            } else if (phone == 0) {
                toastr.error("Phone is empty!");
            } else if (subject.length == 0) {
                toastr.error("Subject is empty!");
            } else if (message.length == 0) {
                toastr.error("Message is empty!");
            } else {
                $("#emergencyClick").html(
                    "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"
                ); //animation

                emergency_data = [{
                    name: name,
                    email: email,
                    phone: phone,
                    subject: subject,
                    message: message,
                }, ];
                var formData = new FormData();
                formData.append("emergency_data", JSON.stringify(emergency_data));

                axios
                    .post("/emergency_contact", formData, {
                        headers: {
                            "Content-Type": "multipart/form-data",
                        },
                    })
                    .then(function(response) {


                        if ((response.status = 200)) {
                            if (response.data == 1) {

                                toastr.success("Message sent. ");
                                toastr.success("You will recive instant response");
                                $('#e_name').val("");
                                $('#e_email').val("");
                                $('#phone').val("");
                                $('#subject').val("");
                                $('#message').val("");

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
