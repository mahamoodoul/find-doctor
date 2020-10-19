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
                                <div class="col-md-12">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">Birth Date</label>
                                        <div class="cal-icon">
                                            <input class="form-control floating datetimepicker" type="text" value="">
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-md-6">
                                    <div class="form-group form-focus select-focus">

                                        <label class="focus-label">Gendar</label>
                                        <select id="gender" class=" browser-default custom-select form-control ">
                                            <option value="male ">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div> -->
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
                            <input type="number" class="form-control floating" value="0123">
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
                            <input type="text" class="form-control floating" value="Oxford University">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-focus">
                            <label class="focus-label">Subject</label>
                            <input type="text" class="form-control floating" value="Computer Science">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-focus">
                            <label class="focus-label">Starting Date</label>
                            <div class="cal-icon">
                                <input type="text" class="form-control floating datetimepicker" value="01/06/2002">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-focus">
                            <label class="focus-label">Complete Date</label>
                            <div class="cal-icon">
                                <input type="text" class="form-control floating datetimepicker" value="31/05/2006">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-focus">
                            <label class="focus-label">Degree</label>
                            <input type="text" class="form-control floating" value="BE Computer Science">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-focus">
                            <label class="focus-label">Grade</label>
                            <input type="text" class="form-control floating" value="Grade A">
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
                            <input type="text" class="form-control floating" value="Digital Devlopment Inc">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-focus">
                            <label class="focus-label">Location</label>
                            <input type="text" class="form-control floating" value="United States">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-focus">
                            <label class="focus-label">Job Position</label>
                            <input type="text" class="form-control floating" value="Web Developer">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-focus">
                            <label class="focus-label">Period From</label>
                            <div class="cal-icon">
                                <input type="text" class="form-control floating datetimepicker" value="01/07/2007">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-focus">
                            <label class="focus-label">Period To</label>
                            <div class="cal-icon">
                                <input type="text" class="form-control floating datetimepicker" value="08/06/2018">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="add-more">
                    <a href="#" class="btn btn-primary"><i class="fa fa-plus"></i> Add More Experience</a>
                </div>
            </div>
            <div class="text-center m-t-20">
                <button id="updateDataBtn" class="btn btn-primary submit-btn" type="button">Save</button>
            </div>
        </form>
    </div>

</div>


@endsection


@section('script')
<script type="text/javascript">


getdoctorData();

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


                    // $('#pdquantityupdate').val(jsonData[0].quantity);
                    // $('#pdslugupdate').val(jsonData[0].slug);
                    // $('#pdfeatureupdate').val(jsonData[0].feature_product);




                    // $.each(dataJSON, function(i, item) {
                    //     $('<tr>').html(

                    //         "<td>" + dataJSON[i].title + " </td>" +
                    //         "<td>" + dataJSON[i].description + " </td>" +
                    //         "<td>" + dataJSON[i].price + " </td>" +
                    //         "<td>" + dataJSON[i].offer + " </td>" +
                    //         "<td>" + dataJSON[i].quantity + " </td>" +
                    //         "<td>" + dataJSON[i].category_id + " </td>" +
                    //         "<td>" + dataJSON[i].brand_id + " </td>" +
                    //         "<td><img width='200px' height='80' class='table-img' src=" + dataJSON[i].images + "> </td>" +

                    //         "<td><a class='productEdit' data-id=" + dataJSON[i].id +
                    //         "><i class='fas fa-edit'></i></a> </td>" +
                    //         "<td><a class='productDeleteIcon' data-id=" + dataJSON[i].id +
                    //         " ><i class='fas fa-trash-alt'></i></a> </td>"
                    //     ).appendTo('#product_table');
                    // });

                    //courses click on delete icon


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

    $('#updateDataBtn').click(function(){
      
    })
</script>


@endsection