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






//userHome controller
Route::get('/', 'PaitentHomecontroller@getAlldata');





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
//doctor register,login and profile info update and logout.
Route::post('/doctor_register', 'Doctor\\DoctorRegistration@DoctorRegister');
Route::post('/doctor_login', 'Doctor\\DoctorRegistration@DoctorLogin');
Route::get('/doctorHome', 'Doctor\\DoctorRegistration@DoctorDashboard')->middleware('loginCheck');
Route::get('/doctor_logout', 'Doctor\\DoctorRegistration@onLogout');
Route::get('/doctor_profile', 'Doctor\\DoctorProfileController@profile');
Route::get('/edit_profile', 'Doctor\\DoctorProfileController@edit_profile');
Route::get('/getdoctorinfo', 'Doctor\\DoctorProfileController@getBasicInfo');
Route::get('/getcategory', 'Doctor\\DoctorProfileController@getDoctorCatgory');
Route::post('/upadte_doctor_info', 'Doctor\\DoctorProfileController@updateDoctorInfo');
Route::get('/getdoctorallInfo', 'Doctor\\DoctorProfileController@getDoctorAllInformation');
Route::get('/doctorInfoUpdate', 'Doctor\\DoctorProfileController@doctorInfoUpdate');
Route::get('/slot_update', 'Doctor\\DoctorProfileController@doctorslotUpdate')->middleware('loginCheck');
Route::post('/slotAdd', 'Doctor\\DoctorProfileController@doctorslotAdd');
Route::get('/getDoctorSlot', 'Doctor\\DoctorProfileController@getdoctorslot');
//get paitent appointment
Route::get('/getappointment', 'Doctor\\PaitentAppointmentController@getUpcommingAppointment');

//doctor assign video link for paitent
Route::get('/paitentdescription/{p_id}/{date}/{slot}', 'Doctor\\PaitentAppointmentController@getvideolinkPaitent');
Route::post('/vidoeLink', 'Doctor\\PaitentAppointmentController@SendVideoLink');


//doc report upload
Route::post('/reportdoc', 'Doctor\\PaitentAppointmentController@getdocreport');

Route::post('generate-pdf','Doctor\\PaitentAppointmentController@generatePDF');





//show all active doctorinfo in user home page
Route::get('/showAllDoctorinUI', 'Doctor\\DoctorProfileController@getAllDoctor');



//patient portion
//pataient register,login
Route::post('/paitentregister', 'PaitentRgisterController@PaitentRegister');
Route::post('/paitentLogin', 'PaitentRgisterController@PaitentLogin');
Route::get('/paitent_logout', 'PaitentRgisterController@PaitentLogout');
// PaitentLoginCheck



//paitent single Doctor View and take appointment
Route::get('/doctor/{docid}', 'AppointmentController@singleDoctorView')->name('appointment.doctor')->middleware('PaitentLoginCheck');
Route::post('/appointmentinfo', 'AppointmentController@TakeAppointment');


//get video link
Route::get('/getvideolink', 'AppointmentController@GetVideoLink');

//paitent dashboard
Route::get('/paitent_dashboard', 'PaitentDashboardController@Home');

//appointment delete

Route::post('/appointmentDel', 'PaitentDashboardController@delAppointment');




