@extends('layout.app')


@section('title', 'Find A Doctor')

@section('content')

@include('appointment')
@include('Category')
@include('doctorList')








@include('feedback')

@endsection