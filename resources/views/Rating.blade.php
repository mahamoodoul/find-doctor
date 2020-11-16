@extends('layout.app')


@section('title', 'Rating Doctor')


@section('content')

<div class="container doctorsingle">


    <div class="row">
        <div class="col-6">
            @foreach($doctorAllInfo as $info)
            <img class="imageDoc" src="{{$info->image}}" alt="">
            <input id="doc_id" type="hidden" value="{{$info->id}}">
            <input id="app_id" type="hidden" value="{{$app_id}}">
            
            <h5>Dr. {{$info->name}}</h5>
            <h5>{{$info->category}}</h5>
            <h5>{{$info->company_name}}</h5>
            <h5>{{$info->job_position}}</h5>
            <h5>{{$info->degree}}</h5>
            @endforeach

        </div>
        <div id="ratingform" class="col-6 ">
            <div   class="appointment-wrap p-4 p-lg-5 d-flex align-items-center ">
                <div action="#" class="appointment-form ftco-animate">

                    <p id="afterratting">Give your feedback</p>
                    <div align="center" style="background: #000;color:white; padding-top: 20px; height: 73px;">
                        <i class="fa fa-star fa-2x" data-index="0"></i>
                        <i class="fa fa-star fa-2x" data-index="1"></i>
                        <i class="fa fa-star fa-2x" data-index="2"></i>
                        <i class="fa fa-star fa-2x" data-index="3"></i>
                        <i class="fa fa-star fa-2x" data-index="4"></i>
                        <br><br>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>




@endsection


@section('script')


<script type="text/javascript">
    var ratedIndex = -1,
        uID = 0;

    $(document).ready(function() {
        resetStarColors();

        if (localStorage.getItem('ratedIndex') != null) {
            setStars(parseInt(localStorage.getItem('ratedIndex')));
            uID = localStorage.getItem('uID');

        }
        console.log(uID);
        $('.fa-star').on('click', function() {
            ratedIndex = parseInt($(this).data('index'));
            localStorage.setItem('ratedIndex', ratedIndex);
            saveToTheDB();
        });

        $('.fa-star').mouseover(function() {
            resetStarColors();
            var currentIndex = parseInt($(this).data('index'));
            setStars(currentIndex);
        });

        $('.fa-star').mouseleave(function() {
            resetStarColors();

            if (ratedIndex != -1)
                setStars(ratedIndex);
        });
    });

    function saveToTheDB() {
        var docid = $('#doc_id').val();
        var app_id = $('#app_id').val();
        
      
        axios.post('/ratingdoc', {
                doc_id: docid,
                app_id:app_id,
                ratedIndex: ratedIndex
            })
            .then(function(response) {
               
                var rating_score=response.data;
               
                setStars(rating_score);
                $('#afterratting').html(`You have Given ${rating_score+1} star`);
                // $('#ratingform').addClass('d-none');

            })
            .catch(function(error) {
                console.log(error);
            });
    }




    function setStars(max) {
        for (var i = 0; i <= max; i++)
            $('.fa-star:eq(' + i + ')').css('color', 'green');
    }

    function resetStarColors() {
        $('.fa-star').css('color', 'white');
    }
</script>

@endsection