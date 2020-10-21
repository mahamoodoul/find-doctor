@extends('doctor.layout.app')


@section('title', 'Your Profile')

@section('content')

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-7 col-6">
                <h4 class="page-title">My Profile</h4>
            </div>

            <div class="col-sm-5 col-6 text-right m-b-30">
                <a href="{{url('edit_profile')}}" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Edit Profile</a>
            </div>
        </div>
        <div class="card-box profile-header">
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-view">
                        <div class="profile-img-wrap">
                            <div class="profile-img">
                                <a href="#"><img id="imgPreview" class="avatar" src="assets/img/doctor-03.jpg" alt=""></a>
                            </div>
                        </div>
                        <div class="profile-basic">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="profile-info-left">
                                        <h3 id="name" class="user-name m-t-0 mb-0"></h3>
                                        <small id="category" class="text-muted"></small>
                                        <div class="staff-id"></div>
                                        <div class="staff-msg"><a href="chat.html" class="btn btn-primary">Send Message</a></div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <ul class="personal-info">
                                        <li>
                                            <span class="title">Phone:</span>
                                            <span id="phone" class="text"><a href="#"></a></span>
                                        </li>
                                        <li>
                                            <span class="title">Email:</span>
                                            <span id="email" class="text"><a href="#"></a></span>
                                        </li>
                                        <li>
                                            <span class="title">Birthday:</span>
                                            <span id="birthdate" class="text"></span>
                                        </li>
                                        <li>
                                            <span class="title">Address:</span>
                                            <span id="address" class="text"></span>
                                        </li>
                                        <!-- <li>
                                            <span class="title">Gender:</span>
                                            <span id="" class="text"></span>
                                        </li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="profile-tabs">
            <ul class="nav nav-tabs nav-tabs-bottom">
                <li class="nav-item"><a class="nav-link active" href="#about-cont" data-toggle="tab">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#bottom-tab2" data-toggle="tab">Profile</a></li>
                <li class="nav-item"><a class="nav-link" href="#bottom-tab3" data-toggle="tab">Messages</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane show active" id="about-cont">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-box">
                                <h3 class="card-title">Education Informations</h3>
                                <div class="experience-box">
                                    <ul class="experience-list">
                                        <li>
                                            <div class="experience-user">
                                                <div class="before-circle"></div>
                                            </div>
                                            <div class="experience-content">
                                                <div class="timeline-content">
                                                    <a href="#/" id="institution" class="name"></a>
                                                    <div id="degree"></div>
                                                    From </br>
                                                    <span id="starting_data" class="time"> </span>
                                                    To</br>
                                                    <span id="complete_date"></span>
                                                </div>
                                            </div>
                                        </li>
                                       
                                    </ul>
                                </div>
                            </div>
                            <div class="card-box mb-0">
                                <h3 class="card-title">Experience</h3>
                                <div class="experience-box">
                                    <ul class="experience-list">
                                        <li>
                                            <div class="experience-user">
                                                <div class="before-circle"></div>
                                            </div>
                                            <div class="experience-content">
                                                <div class="timeline-content">
                                                    <a href="#/" id="company_name" class="name"></a>
                                                    <div id="position"></div>
                                                    From</br>
                                                    <h5 id="from" class="time">  </h5>
                                                    To </br>
                                                    <span id="end"></span>
                                                    
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="bottom-tab2">
                    Tab content 2
                </div>
                <div class="tab-pane" id="bottom-tab3">
                    Tab content 3
                </div>
            </div>
        </div>
    </div>

</div>


@endsection


@section('script')

<script type="text/javascript">
    getdoctorAllInfo();



    function getdoctorAllInfo() {

        axios.get('/getdoctorallInfo')
            .then(function(response) {

                if (response.status = 200) {
                    var doctordata = response.data;
                    console.log(doctordata);


                    $('#name').html(doctordata[0].name);
                    $('#email').html(doctordata[0].email);
                    $('#address').html(doctordata[0].address);
                    $('#phone').html(doctordata[0].phone);
                    $('#birthdate').html(doctordata[0].birth_date);
                    $('#category').html(doctordata[0].category);
                    $('#phone2').html(doctordata[0].phone2);
                    $('#institution').html(doctordata[0].institution);
                    $('#subject').html(doctordata[0].subject);
                    $('#starting_data').html(doctordata[0].starting);
                    $('#complete_date').html(doctordata[0].ending);
                    $('#degree').html(doctordata[0].address);
                    $('#grade').html(doctordata[0].grade);
                    $('#company_name').html(doctordata[0].company_name);
                    $('#location').html(doctordata[0].location);
                    $('#position').html(doctordata[0].job_position);
                    $('#from').html(doctordata[0].period_start);
                    $('#end').html(doctordata[0].period_end);
                    $('#imgPreview').attr('src', "" + doctordata[0].image + "")




                } else {
                    toaster.error("loading failed Data");

                }
            }).catch(function(error) {
                toaster.error("loading failed Data");

            });
    }
</script>


@endsection