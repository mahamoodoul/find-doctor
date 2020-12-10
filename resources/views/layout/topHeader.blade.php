@if(Session::get('id'))
<div id="videolinkDiv" class="py-1 top">
    <div class="container">
        <div class="row">
            <div class="col-sm-4  align-items-start">
                <p class="mb-0 w-100 mt-2">
                    <span class="fa fa-paper-plane"></span>
                    <span class="text">Your Upcomming Appointment Schedule</span>
                </p>
            </div>
            <div class="col-sm-4   topper align-items-center ">
                <p class="mb-0 w-100 mt-2">
                    <div class="row">
                        <div class="col-sm-4">
                            <span id="date" class="text" >Date</span>
                        </div>
                        <div class="col-sm-3">
                        <span id="time" class="text" >Time</span>
                        </div>
                        <div class="col-sm-5">
                        <span id="countdown" class="timeCountdown text" ></span>
                        </div>
                    </div>
                </p>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4   justify-content-end">
                <p class="mb-0 register-link"><a  disabled="disabled" target="_blank"  id="meetlink"  href="" class="disabled btn btn-primary">Click Here to Join</a></p>
            </div>
        </div>
    </div>
</div>
@endif




<div class="py-3">
    <div class="container">
        <div class="row d-flex align-items-start align-items-center px-3 px-md-0">
            <div class="col-md-3 d-flex mb-2 mb-md-0">
                <a class="navbar-brand d-flex align-items-center" href="{{url('/')}}"><span class="flaticon flaticon-health"></span><span>Medex</span></a>
            </div>
            <div class="col-md-3 d-flex topper mb-md-0 mb-2 align-items-center">
                <div class="icon d-flex justify-content-center align-items-center">
                    <span class="fa fa-map"></span>
                </div>
                <div class="pr-md-4 pl-md-3 pl-3 text">
                    <p class="con"><span>Free Call</span> <span>+1 234 456 78910</span></p>
                    <p class="con">Call Us Now 24/7 Customer Support</p>
                </div>
            </div>
            <div class="col-md-3 d-flex topper mb-md-0 align-items-center">
                <div class="icon d-flex justify-content-center align-items-center"><span class="fa fa-paper-plane"></span>
                </div>
                <div class="text pl-3 pl-md-3">
                    <p class="hr"><span>Our Location</span></p>
                    <p class="con">198 West 21th Street, Suite 721 New York NY 10016</p>
                </div>
            </div>
            <div class="col-md-3 d-flex mb-2 mb-md-0">
                <!-- login && registration button -->

                @if(Session::get('id'))
                <button class="btn-login" data-toggle="modal" data-target="#logoutModal"><span>(<?php echo (Session::get('p_name')); ?>) </span> Logout</button>
                @else
                <button id="loginclick" class="btn-login" data-toggle="modal" data-target="#exampleModalCenter1">Login</button>
                @endif
            </div>
        </div>
    </div>
</div>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container d-flex align-items-center">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav m-auto">
                <li class="nav-item active"><a href="{{url('/')}}" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="{{url('about')}}" class="nav-link">About</a></li>
                <li class="nav-item"><a href="services.html" class="nav-link">Services</a></li>
                <li class="nav-item"><a href="{{url('allDoctors')}}" class="nav-link">Doctors</a></li>
                <li class="nav-item"><a href="department.html" class="nav-link">Departments</a></li>
                @if(Session::get('id'))
                <li class="nav-item"><a href="{{url('paitent_dashboard')}}" class="nav-link">Dashboard</a></li>
                @endif
                <li class="nav-item"><a href="gallery.html" class="nav-link">Gallery</a></li>
                <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
                <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->



<!-- logoutModal -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure Want to log out?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <a class="btn btn-primary" href="{{ url('/paitent_logout') }}">Yes</a>

            </div>
        </div>
    </div>
</div>





<!-- registration page -->

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Registration</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter Your Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter Your email">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Phone</label>
                            <input type="number" class="form-control" id="number" placeholder="Enter Your Number">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Gender</label>
                            <select id="gender" class="form-control browser-default custom-select">
                                <option value="0" selected>Choose...</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            <!-- <input type="text" class="form-control" id="inputAddress" placeholder="Enter your Phone"> -->
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="inputAddress2">Address </label>
                        <input type="text" class="form-control" id="address" placeholder="Apartment, studio, or floor">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">Age</label>
                            <input type="number" class="form-control" id="age">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">Blood Group</label>
                            <select id="blood" class="form-control browser-default custom-select">
                                <option value="0" selected>Choose...</option>
                                <option value="O+">O+</option>
                                <option value="A+">A+</option>
                                <option value="B+">B+</option>
                                <option value="O-">O-</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">

                        <label for="inputState">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter Password">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="paitentRegister" type="button" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>




<!-- login page -->
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Login Here</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Email</label>
                        <input type="text" class="form-control" id="login_email" placeholder="Input Your Email">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Password</label>
                        <input type="password" class="form-control" id="login_pass" placeholder="Type Your Password">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="loginbtnclick" type="button" class="btn btn-primary">Login</button>
            </div>
            <div>
                <p style="margin-left: 80px; ">Do not have Account??? <a id="clickforRegistration" class="btn-login" data-toggle="modal" data-target="#exampleModalCenter" href="">Click Here</a></p>
            </div>
        </div>
    </div>
</div>


@if(!empty(Session::get('error_code')) && Session::get('error_code') == 5)
<script>
window.onload = function(){
    document.getElementById('loginclick').click();
  }
</script>
@endif
