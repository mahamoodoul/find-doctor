<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('main');
});



Route::get('/about', function () {
    return view('about');
});

Route::get('/doctor', function () {
    return view('/doctor/register');
});



Route::get('/admin', function () {
    return view('/admin/dashboard');
});

Route::get('/admin/login', function () {
    return view('/admin/login');
});




//doctor portion
//doctor register
Route::post('/doctor_register', 'Doctor\\DoctorRegistration@DoctorRegister');
Route::post('/doctor_login', 'Doctor\\DoctorRegistration@DoctorLogin');
Route::get('/doctorHome', 'Doctor\\DoctorRegistration@DoctorDashboard')->middleware('loginCheck');
Route::get('/doctor_logout', 'Doctor\\DoctorRegistration@onLogout');

