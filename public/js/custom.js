//login registration

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
                        window.location.href="/"
                    } else {
                        toastr.error("Email or Password is incorrect Try again!!");
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
