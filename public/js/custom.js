//login registration button

// const { indexOf } = require("lodash");

$("#clickforRegistration").click(function () {
    $("#exampleModalCenter1").modal("hide");
});

//paitent register
$("#paitentRegister").click(function () {
    var name = $("#name").val();
    var email = $("#email").val();
    var number = $("#number").val();
    var gender = $("#gender").val();
    var address = $("#address").val();
    var age = $("#age").val();
    var blood = $("#blood").val();
    var password = $("#password").val();

    if (name.length == 0) {
        toastr.error(" Name is empty!");
    } else if (email.length == 0) {
        toastr.error("Email is empty!");
    } else if (number == 0) {
        toastr.error("Number is empty!");
    } else if (gender == 0) {
        toastr.error("Gender must be Selected!");
    } else if (address.length == 0) {
        toastr.error("Address is empty!");
    } else if (age == 0) {
        toastr.error("Age is empty!");
    } else if (blood == 0) {
        toastr.error("Blood Group must be selected!");
    } else if (password == 0) {
        toastr.error("Password is empty!");
    } else {
        $("#paitentRegister").html(
            "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"
        ); //animation

        paitent_regster_data = [
            {
                name: name,
                email: email,
                number: number,
                gender: gender,
                address: address,
                age: age,
                blood: blood,
                password: password,
            },
        ];

        var formData = new FormData();
        formData.append("data", JSON.stringify(paitent_regster_data));

        axios
            .post("/paitentregister", formData, {
                headers: {
                    "Content-Type": "multipart/form-data",
                },
            })
            .then(function (response) {
                $("#paitentRegister").html("Submit");

                if ((response.status = 200)) {
                    if (response.data == 1) {
                        console.log(response.data);
                        $("#exampleModalCenter").modal("hide");
                        toastr.success("Registration Successful... .");
                    } else {
                        toastr.error("Registration Failed Try again!!!");
                    }
                } else {
                    toastr.error("Something Went Wrong");
                }
            })
            .catch(function (error) {
                toastr.error("Something Went Wrong");
            });
    }
});

//paitent login

$("#loginbtnclick").click(function () {
    var email = $("#login_email").val();
    var pass = $("#login_pass").val();

    if (email.length == 0) {
        toastr.error(" Email is empty!");
    } else if (pass == 0) {
        toastr.error("Password is empty!");
    } else {
        $("#loginbtnclick").html(
            "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"
        ); //animation

        paitent_login_data = [
            {
                email: email,
                password: pass,
            },
        ];
        var formData = new FormData();
        formData.append("login_data", JSON.stringify(paitent_login_data));

        axios
            .post("/paitentLogin", formData, {
                headers: {
                    "Content-Type": "multipart/form-data",
                },
            })
            .then(function (response) {
                $("#loginbtnclick").html("Login");

                if ((response.status = 200)) {
                    if (response.data == 1) {
                        console.log(response.data);
                        $("#exampleModalCenter1").modal("hide");
                        toastr.success("Login Successfull Successful.");
                        window.location.href = "/";
                    } else {
                        toastr.error(
                            "Email or Password is incorrect Try again!!"
                        );
                    }
                } else {
                    toastr.error("Login Failed Try again!!!");
                }
            })
            .catch(function (error) {
                toastr.error("Something Went Wrong");
            });
    }
});

//video link show in header
setInterval(showlink,1000);
// showlink();
function showlink() {
    axios
        .get("/getvideolink")
        .then(function (response) {
            var dataJSON = response.data;
            console.log(dataJSON);
            var appointment_id = dataJSON.app_id;
            var date = dataJSON.date;
            var time = dataJSON.slot;
            var space = " ";
            var position = 5;
            var timeformat = [time.slice(0, position),space,time.slice(position),].join("");
            $("#date").html(date);
            $("#time").html(timeformat);
          


            if(time.includes('pm')){
                var getfisrttwo=(time.charAt(0)+""+time.charAt(1));
                var valuetf=parseInt(getfisrttwo);
                if (valuetf == 12){
                    valuetf=12;
                }else{
                    valuetf=valuetf+12;
                }
            }

            if(time.includes('am')){
                var getfisrttwo=(time.charAt(0)+""+time.charAt(1));
                var valuetf=parseInt(getfisrttwo);
                if(valuetf== 12){
                    valuetf="00";
                }
            }
            var getmin=(time.charAt(3)+""+time.charAt(4));
            var newTime=String(valuetf+":"+getmin+":00");
            console.log(newTime);






            var today_date = TodaysDate();
            dt2 = new Date(date);
            dt1 = new Date(today_date);  
            var diff = diff_hours(dt1, dt2);
            var day =Math.round(diff / 24) ;



            var myFutureDate = getfutureDate(day);
            var adddateTime=myFutureDate+" "+newTime;

            console.log(adddateTime);
           

            var stamp_date=Math.abs((new Date(adddateTime).getTime()/1000).toFixed(0));
            var stamp_current=Math.abs((new Date().getTime()/1000).toFixed(0));
            diffs=stamp_date-stamp_current;
            var daystamp=Math.floor(diffs/86400);
            var hourstamp=Math.floor(diffs/3600)%24;
            var minstamp=Math.floor(diffs/60)%60;
            var secstamp=diffs % 60;
            var timeStamps=daystamp+" Days:"+hourstamp+":"+minstamp+":"+secstamp;
            $("#countdown").html(timeStamps);
            if(hourstamp <='00' && minstamp <='00' && secstamp <='00'){
                $("#meetlink").attr("href", dataJSON.link);    
                $('#meetlink').removeClass('disabled');
                    $("#countdown").html("");
            }
           


        })
        .catch(function (error) {
            $("#videolinkDiv").addClass("d-none");
        });
}

function diff_hours(dt1, dt2) {
    var diff = (dt2.getTime() - dt1.getTime()) / 1000;
    diff /= 60 * 60;
    return Math.abs(Math.round(diff));
}

function formatAMPM(date) {
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var ampm = hours >= 12 ? "pm" : "am";
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour '0' should be '12'
    minutes = minutes < 10 ? "0" + minutes : minutes;
    var strTime = hours + ":" + minutes + " " + ampm;
    return strTime;
}
console.log(formatAMPM(new Date()));

function TodaysDate() {
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, "0");
    var mm = String(today.getMonth() + 1).padStart(2, "0"); //January is 0!
    var yyyy = today.getFullYear();
    // today = mm + "-" + dd + "-" + yyyy;
    today = yyyy + "-" + mm + "-" + dd;
    return today;
}

//for future Date
function getfutureDate(day) {
    // var today = new Date();
    var today = new Date(new Date().getTime() + day * 24 * 60 * 60 * 1000);
    var dd = String(today.getDate()).padStart(2, "0");
    var mm = String(today.getMonth() + 1).padStart(2, "0"); //January is 0!
    var yyyy = today.getFullYear();
    // today = mm + "-" + dd + "-" + yyyy;
    today = yyyy + "-" + mm + "-" + dd;
    return today;
}

function setCharAt(str, index, chr) {
    if (index > str.length - 1) return str;
    return str.substring(0, index) + chr + str.substring(index + 1);
}
