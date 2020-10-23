@extends('doctor.layout.app')


@section('title', 'Your Profile')

@section('content')

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Edit Profile</h4>
            </div>
        </div>
        <form>
            <div class="card-box">
                <h3 class="card-title">Basic Informations</h3>
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-img-wrap">
                            <img id="imgPreview" class="inline-block" src="assets/img/user.jpg" alt="user">
                            <div class="fileupload btn">
                                <span class="btn-text">upload</span>
                                <input id="imgInput" class="upload" type="file">
                            </div>
                        </div>
                        <div class="profile-basic">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">Name</label>
                                        <input id="name" type="text" class="form-control floating" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">Email</label>
                                        <input id="email" type="text" class="form-control floating" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">Birth Date</label>
                                        <div class="cal-icon">
                                            <input id="birthdate" class=" form-control floating datetimepicker" type="text" value="">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group form-focus select-focus">

                                        <label class="focus-label">Specalist</label>
                                        <select id="category" class=" browser-default custom-select form-control ">

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-box">
                <h3 class="card-title">Contact Informations</h3>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-focus">
                            <label class="focus-label">Address</label>
                            <input id="address" type="text" class="form-control floating" value="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-focus">
                            <label class="focus-label">Phone</label>
                            <input id="phone" type="number" class="form-control floating" value="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-focus">
                            <label class="focus-label">Phone 2</label>
                            <input id="phone2" type="number" class="form-control floating" value="">
                        </div>
                    </div>

                </div>
            </div>
            <div class="card-box">
                <h3 class="card-title">Education Informations</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-focus">
                            <label class="focus-label">Institution</label>
                            <input id="institution" type="text" class="form-control floating" value="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-focus">
                            <label class="focus-label">Subject</label>
                            <input id="subject" type="text" class="form-control floating" value=" ">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-focus">
                            <label class="focus-label">Starting Date</label>
                            <div class="cal-icon">
                                <input id="starting_data" type="text" class="form-control floating datetimepicker" value="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-focus">
                            <label class="focus-label">Complete Date</label>
                            <div class="cal-icon">
                                <input id="complete_date" type="text" class="form-control floating datetimepicker" value="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-focus">
                            <label class="focus-label">Degree</label>
                            <input id="degree" type="text" class="form-control floating" value="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-focus">
                            <label class="focus-label">Grade</label>
                            <input id="grade" type="text" class="form-control floating" value="">
                        </div>
                    </div>
                </div>
                <div class="add-more">
                    <a href="#" class="btn btn-primary"><i class="fa fa-plus"></i> Add More Institute</a>
                </div>
            </div>
            <div class="card-box">
                <h3 class="card-title">Experience Informations</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-focus">
                            <label class="focus-label">Company Name</label>
                            <input id="company_name" type="text" class="form-control floating" value="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-focus">
                            <label class="focus-label">Location</label>
                            <input id="location" type="text" class="form-control floating" value="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-focus">
                            <label class="focus-label">Job Position</label>
                            <input id="position" type="text" class="form-control floating" value="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-focus">
                            <label class="focus-label">Period From</label>
                            <div class="cal-icon">
                                <input id="from" type="text" class="form-control floating datetimepicker" value="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-focus">
                            <label class="focus-label">Period To</label>
                            <div class="cal-icon">
                                <input id="end" type="text" class="form-control floating datetimepicker" value="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="add-more">
                    <a href="#" class="btn btn-primary"><i class="fa fa-plus"></i> Add More Experience</a>
                </div>
            </div>
            <div class=" add_text text-center m-t-20">

                <button id="updateDataBtn" class="btn btn-primary submit-btn" type="button">Save</button>
            </div>
        </form>
    </div>

</div>


@endsection


@section('script')
<script type="text/javascript">



    getdoctorData();

    getCategory();

    getdoctorAllInfo();

    checkexistupdateinfo();




    function getdoctorData() {
        axios.get('/getdoctorinfo')
            .then(function(response) {

                if (response.status = 200) {


                    var jsonData = response.data;
                    console.log(jsonData);
                    $('#name').val(jsonData[0].name);
                    $('#email').val(jsonData[0].email);
                    $('#address').val(jsonData[0].address);
                    $('#phone').val(jsonData[0].phone);

                } else {
                    toaster.error("loading failed Data");

                }
            }).catch(function(error) {
                toaster.error("loading failed Data");

            });
    }


    function getCategory() {


        axios.get('/getcategory')
            .then(function(response) {

                if (response.status = 200) {


                    var categoryData = response.data;
                    console.log(categoryData);
                    $.each(categoryData, function(i, item) {
                        $('#category').append(`<option value="${categoryData[i].category}"> 
                                       ${categoryData[i].category} 
                                  </option>`);
                    });

                    //courses click on delete icon


                } else {
                    toaster.error("loading failed Data");

                }
            }).catch(function(error) {
                toaster.error("loading failed Data");

            });
    }

    function checkexistupdateinfo() {

        axios.get('/doctorInfoUpdate')
            .then(function(response) {

                if (response.status = 200) {
                    if (response.data == 1) {

                        // alert("1");
                        $(".add_text").prepend("<p style='color:red;' >You have been updated your all Information.</p>");
                        // $("#updateDataBtn").prop('disabled', true);
                        $('#updateDataBtn').html("Upadte Again");
                    }


                } else {

                    // alert("0");
                }
            }).catch(function(error) {
                // alert("00");

            });

    }

    function getdoctorAllInfo() {

        axios.get('/getdoctorallInfo')
            .then(function(response) {

                if (response.status = 200) {


                    var doctordata = response.data;
                    console.log(doctordata);

                    // $('#name').val(doctordata[0].name);
                    // $('#email').val(doctordata[0].email);
                    // $('#address').val(doctordata[0].address);
                    // $('#phone').val(doctordata[0].phone);
                    $('#birthdate').val(doctordata[0].birth_date);
                    $('#category').val(doctordata[0].category);
                    $('#phone2').val(doctordata[0].phone2);
                    $('#institution').val(doctordata[0].institution);
                    $('#subject').val(doctordata[0].subject);
                    $('#starting_data').val(doctordata[0].starting);
                    $('#complete_date').val(doctordata[0].ending);
                    $('#degree').val(doctordata[0].address);
                    $('#grade').val(doctordata[0].grade);
                    $('#company_name').val(doctordata[0].company_name);
                    $('#location').val(doctordata[0].location);
                    $('#position').val(doctordata[0].job_position);
                    $('#from').val(doctordata[0].period_start);
                    $('#end').val(doctordata[0].period_end);
                    $('#imgPreview').attr('src', "" + doctordata[0].image + "")


                } else {
                    toaster.error("loading failed Data");

                }
            }).catch(function(error) {
                toaster.error("loading failed Data");

            });
    }



    $('#imgInput').change(function() {
        var reader = new FileReader();
        reader.readAsDataURL(this.files[0]);
        reader.onload = function(event) {
            var ImgSource = event.target.result;
            $('#imgPreview').attr('src', ImgSource)
        }
    })





    //info update of doctor
    $('#updateDataBtn').click(function() {


        var img = $('#imgInput').prop('files')[0];



        var name = $('#name').val();
        var email = $('#email').val();
        var birthdate = $('#birthdate').val();
        var category = $('#category').val();
        var address = $('#address').val();
        var phone = $('#phone').val();
        var phone2 = $('#phone2').val();

        //education
        var institution = $('#institution').val();
        var subject = $('#subject').val();
        var starting_data = $('#starting_data').val();
        var complete_date = $('#complete_date').val();
        var degree = $('#degree').val();
        var grade = $('#grade').val();

        //experience
        var company_name = $('#company_name').val();
        var location = $('#location').val();
        var position = $('#position').val();
        var from = $('#from').val();
        var end = $('#end').val();





        if (name.length == 0) {

            toastr.error('Name is empty!');

        } else if (email.length == 0) {

            toastr.error('Email is empty!');

        } else if (birthdate.length == 0) {

            toastr.error('Birthdate is empty!');

        } else if (category == 0) {

            toastr.error('Category must be select!');

        } else if (address.length == 0) {

            toastr.error('Address  is empty!');

        } else if (phone == 0) {

            toastr.error('Phone is empty!');

        } else if (phone2 == 0) {

            toastr.error('Phone2 is empty!');

        } else if (institution.length == 0) {

            toastr.error('Institution is empty!');

        } else if (subject.length == 0) {

            toastr.error('Subject status is empty!');

        } else if (starting_data.length == 0) {

            toastr.error('Starting Date is empty!');

        } else if (complete_date.length == 0) {

            toastr.error('Complete Date is empty!');

        } else if (degree.length == 0) {

            toastr.error('Degree is empty!!');

        } else if (grade.length == 0) {

            toastr.error('Grade  is empty!');

        } else if (company_name.length == 0) {

            toastr.error('Company Name is empty!');

        } else if (location.length == 0) {

            toastr.error('Location is empty!');

        } else if (position.length == 0) {

            toastr.error('Position is empty!');

        } else if (from.length == 0) {

            toastr.error('From status is empty!');

        } else if (end.length == 0) {

            toastr.error('End status is empty!');

        } else {

            $('#updateDataBtn').html(
                "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation

            update_data = [{
                    name: name,
                    email: email,
                    birthdate: birthdate,
                    category: category,
                    address: address,
                    phone: phone,
                    phone2: phone2,
                    institution: institution,
                    subject: subject,
                    starting_data: starting_data,
                    complete_date: complete_date,
                    degree: degree,
                    grade: grade,
                    company_name: company_name,
                    location: location,
                    position: position,
                    from: from,
                    end: end
                }

            ];

            var formData = new FormData();
            formData.append('doctor_update_data', JSON.stringify(update_data));
            formData.append('image', img);

            console.log(img);
            console.log(update_data);


            axios.post('/upadte_doctor_info', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(function(response) {

                    $('#updateDataBtn').html("Upadte");

                    if (response.status = 200) {
                        if (response.data == 1) {
                            console.log(response.data);
                            toastr.success('Updated Your Data .');
                            window.location.href="edit_profile";
                        

                        } else {
                            toastr.error('Add New Failed');
                        }
                    } else {
                        toastr.error('Something Went Wrong');
                    }

                }).catch(function(error) {
                    toastr.error('Something Went Wrong !!!!!!!!');
                });

        }
    })
</script>


@endsection