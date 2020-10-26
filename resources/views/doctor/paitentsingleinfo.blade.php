@extends('doctor.layout.app')


@section('title', 'Paitent Info')

@section('content')

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h4 class="page-title">Paitent Info</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">

                <div class="form-group">
                    <label>Name</label>
                    <input disabled class="form-control" type="text" value="{{$app_info[0]->paitent_name}}">
                </div>
                <div class="form-group">
                    <label>Meeting Date</label>
                    <input disabled class="form-control" type="text" value="{{$app_info[0]->date}}">
                </div>
                <div class="form-group">
                    <label>Meeting Time</label>
                    <input disabled class="form-control" type="text" value="{{$app_info[0]->slot}}">
                </div>
                <input id="appid" type="hidden" value="{{$app_info[0]->id}}">
                <input id="p_id" type="hidden" value="{{$app_info[0]->paitent_id}}">
                <div class="form-group">
                    <label>Google Meet Link</label>
                    <input id="link" class="form-control" type="text">
                </div>

                <div class="m-t-20 text-center">
                    <button id="sendtopaitent" class="btn btn-primary submit-btn">Send To Paitent</button>
                </div>

            </div>
        </div>
    </div>

</div>


@endsection



@section('script')
<script type="text/javascript">
    $('#sendtopaitent').click(function() {
        var app_id = $('#appid').val();
        var link = $('#link').val();
        var p_id = $('#p_id').val();


        if (link.length == 0) {

            toastr.error('Link is empty!');
        } else {


            link_data = [{
                    app_id: app_id,
                    link: link,
                    p_id:p_id
                }

            ];

            var formData = new FormData();
            formData.append('data', JSON.stringify(link_data));


            axios.post('/vidoeLink', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(function(response) {


                    if (response.status = 200) {
                        if (response.data == 1) {


                            toastr.success('Video Link has been Sent.');

                        } else {

                            toastr.error('Link send Failed');

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
@endsection