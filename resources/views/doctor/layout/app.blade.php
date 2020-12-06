<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/jquery.dataTables.min.css')}}">

    <title>@yield('title')</title>
</head>

<body>


    @include('doctor.layout.header')

    @include('doctor.layout.sidebar')

    @yield('content')

    <div class="sidebar-overlay" data-reff=""></div>
    <script src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/axios.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/mdb.min.js') }}"></script>
    <script src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('assets/js/Chart.bundle.js')}}"></script>
    <script src="{{asset('assets/js/chart.js')}}"></script>
    <script src="{{asset('assets/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/js/moment.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>
    <script src="{{asset('assets/js/mycustom.js')}}"></script>
    <script src="{{asset('assets/js/app.js')}}"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    @yield('script')





</body>

</html>
