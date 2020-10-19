<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Login</title>


    <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">



    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images-doctor/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts-doctor/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts-doctor/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css-doctor/util.css">
    <link rel="stylesheet" type="text/css" href="css-doctor/main.css">




    <style>
        .selectorDesign {
            width: 430px !important;
            height: 50px !important;
            margin-top: 5px !important;
            background-color: white !important;
            border: none;

        }
    </style>

</head>

<body>
    <div class="limiter">
        <div class="container-login100" style="background-image: url('images-doctor/bg-01.jpg');  ">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <div id="login-doctor" class="login100-form validate-form">
                    <span class="login100-form-title p-b-49">
                        Login
                    </span>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="Username is reauired">
                        <span class="label-input100">Email</span>
                        <input id="email-login" class="input100" type="text" placeholder="Type your Email">
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <span class="label-input100">Password</span>
                        <input id="password-login" class="input100" type="password" placeholder="Type your password">
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                    </div>

                    <div class="text-right p-t-8 p-b-31">
                        <a href="#">
                            Forgot password?
                        </a>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button id="loginbtndoctor" class="login100-form-btn">
                                Login
                            </button>
                        </div>
                    </div>

                    <div class="txt1 text-center p-t-54 p-b-20">
                        <span>
                            Or Sign Up Using
                        </span>
                    </div>

                    <div class="flex-c-m">
                        <a href="#" class="login100-social-item bg1">
                            <i class="fa fa-facebook"></i>
                        </a>

                        <a href="#" class="login100-social-item bg2">
                            <i class="fa fa-twitter"></i>
                        </a>

                        <a href="#" class="login100-social-item bg3">
                            <i class="fa fa-google"></i>
                        </a>
                    </div>

                    <div class="flex-col-c p-t-155">


                        <a id="register" href="#" class="txt2">
                            Sign Up
                        </a>
                    </div>
                </div>

                <div id="register-doctor" class=" d-none">
                    <span class="login100-form-title p-b-49">
                        Register
                    </span>
                    <div class="row">
                        <div class="col-6">

                            <div class="wrap-input100 validate-input m-b-23" data-validate="Username is reauired">
                                <span class="label-input100">Name</span>
                                <input id="name" class="input100" type="text" name="username" placeholder="Type your username">
                                <span class="focus-input100" data-symbol="&#xf206;"></span>
                            </div>
                            <div class="wrap-input100 validate-input m-b-23" data-validate="Email is reauired">
                                <span class="label-input100">Email</span>
                                <input id="email" class="input100" type="text" name="username" placeholder="Type your Email">
                                <span class="focus-input100" data-symbol="&#xf206;"></span>
                            </div>

                            <div class="wrap-input100 validate-input" data-validate="Gender is required">
                                <span class="label-input100">Gender</span></br>

                                <select class="browser-default custom-select selectorDesign" id="gender">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-6">

                            <div class="wrap-input100 validate-input m-b-23" data-validate="Phone is reauired">
                                <span class="label-input100">Phone</span>
                                <input id="phone" class="input100" type="text" name="username" placeholder="Type your Phone Number">
                                <span class="focus-input100" data-symbol="&#xf206;"></span>
                            </div>
                            <div class="wrap-input100 validate-input m-b-23" data-validate="Address is reauired">
                                <span class="label-input100">Address</span>
                                <input id="address" class="input100" type="text" name="username" placeholder="Type your Adress">
                                <span class="focus-input100" data-symbol="&#xf206;"></span>
                            </div>

                            <div class="wrap-input100 validate-input" data-validate="Password is required">
                                <span class="label-input100">Password</span>
                                <input id="password" class="input100" type="password" name="pass" placeholder="Type your password">
                                <span class="focus-input100" data-symbol="&#xf190;"></span>
                            </div>

                        </div>
                    </div>



                    <div class="text-right p-t-8 p-b-31">
                        <a href="#">
                            Forgot password?
                        </a>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button id="register_submit" class="login100-form-btn">
                                Submit
                            </button>
                        </div>
                    </div>

                    <div class="txt1 text-center p-t-54 p-b-20">
                        <span>
                            Or Sign Up Using
                        </span>
                    </div>

                    <div class="flex-c-m">
                        <a href="#" class="login100-social-item bg1">
                            <i class="fa fa-facebook"></i>
                        </a>

                        <a href="#" class="login100-social-item bg2">
                            <i class="fa fa-twitter"></i>
                        </a>

                        <a href="#" class="login100-social-item bg3">
                            <i class="fa fa-google"></i>
                        </a>
                    </div>

                    <div class="flex-col-c p-t-155">


                        <a id="login-page" href="#" class="txt2">
                            Sign In
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>











    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="js-doctor/main.js"></script>

    <script type="text/javascript" src="{{ asset('js/axios.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/mdb.min.js') }}"></script>

    <script type="text/javascript">
        $('#register').click(function() {

            $("#login-doctor").addClass("d-none");

            $('#register-doctor').removeClass('d-none');

        })

        $('#login-page').click(function() {


            $("#register-doctor").addClass("d-none");

            $('#login-doctor').removeClass('d-none');

        })


        //Doctor Login Button Click


        $('#loginbtndoctor').click(function() {

            // alert("hello");
            var email = $('#email-login').val();
            var pass = $('#password-login').val();


            if (email.length == 0) {

                toastr.error(' Email is empty!');

            } else if (pass == 0) {

                toastr.error(' Password is empty!');

            } else {
                $('#loginbtndoctor').html(
                    "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation

                login_data = [{
                    email: email,
                    password: pass
                }];
                var formData = new FormData();
                formData.append('loginData', JSON.stringify(login_data));

                axios.post('/doctor_login', formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                    .then(function(response) {

                        $('#loginbtndoctor').html("Login");

                        if (response.status = 200) {
                            if (response.data == 1) {
                                // console.log(response.data);

                                toastr.success('Registration Success .');
                                window.location.href = 'doctorHome';
                            } else {

                                toastr.error('Email or Password wrong Try again!!');

                            }
                        } else {

                            toastr.error('Something Went Wrong');
                        }


                    }).catch(function(error) {


                        toastr.error('Something Went Wrong');

                    });


            }





            // window.location.href = 'doctorHome';

        })




        //Doctor register button click
        $('#register_submit').click(function() {



            var name = $('#name').val();
            var email = $('#email').val();
            var gender = $('#gender').val();
            var phone = $('#phone').val();
            var address = $('#address').val();
            var password = $('#password').val();


            if (name.length == 0) {

                toastr.error(' name is empty!');

            } else if (email == 0) {

                toastr.error(' Email is empty!');

            } else if (gender == 0) {

                toastr.error(' Must Select Gender');

            } else if (phone == 0) {

                toastr.error(' Phone Number is empty!');

            } else if (address == 0) {

                toastr.error('Address is empty!');

            } else if (password == 0) {

                toastr.error('Password is empty!');

            } else {

                $('#register_submit').html(
                    "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation

                register_data = [{
                        name: name,
                        email: email,
                        gender: gender,
                        phone: phone,
                        address: address,
                        password: password

                    }

                ];

                var formData = new FormData();
                formData.append('data', JSON.stringify(register_data));

                axios.post('/doctor_register', formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                    .then(function(response) {

                        $('#register_submit').html("Submit");

                        if (response.status = 200) {
                            if (response.data == 1) {
                                console.log(response.data);

                                toastr.success('Registration Success .');

                            } else {

                                toastr.error('Try again');

                            }
                        } else {

                            toastr.error('Something Went Wrong');
                        }


                    }).catch(function(error) {


                        toastr.error('Something Went Wrong');

                    });


            }

        })
    </script>
</body>

</html>