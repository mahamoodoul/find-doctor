

$("#logoutBtn").click(function () {
    var id = $('#sessionid').val();
    alert(id);

    

    axios.post('/doctor_logout', formData, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    })
    .then(function(response) {

        $('#productAddConfirmBtn').html("Save");

        if (response.status = 200) {
            if (response.data == 1) {
                console.log(response.data);
                $('#addProductModal').modal('hide');
                toastr.success('Add New Success .');
                getCoursesdata();
            } else {
                $('#addProductModal').modal('hide');
                toastr.error('Add New Failed');
                getCoursesdata();
            }
        } else {
            $('#addProductModal').modal('hide');
            toastr.error('Something Went Wrong');
        }


    }).catch(function(error) {

        $('#addProductModal').modal('hide');
        toastr.error('Something Went Wrong');

    });
});
