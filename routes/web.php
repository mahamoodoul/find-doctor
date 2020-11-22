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

Route::post('generate-pdf', 'Doctor\\PaitentAppointmentController@generatePDF');

//doc send the prescription to paitent
Route::post('/sendprestopaitent/{appo_id}', 'Doctor\\PaitentAppointmentController@sendPrescription');





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

//paitent generate pdf

Route::get('/generate/{appo_id}', 'PaitentDashboardController@generatepdf')->name('genarate.pdf');

Route::get('/viewMedicine/{appo_id}', 'PaitentDashboardController@ViewMedicine');





// all doctors
Route::get('/allDoctors', 'AlldoctorController@AlldoctorHome');
Route::get('/getdocbycat/{cat}', 'AlldoctorController@getDoctorbyCat');
Route::get('/getalldoctors', 'AlldoctorController@getAlldoctors');


//doctor rating
Route::get('/ratingDoctor/{doc_id}/{app_id}', 'RatingController@RatingsingleDoctor')->name('ratting.doctor');

Route::post('/ratingdoc', 'RatingController@DoctorRating');

Route::get('/getratting', 'RatingController@getRating');







//admin portion


Route::get('/admin', 'Admin\\AdminController@AdminDashboard')->middleware('adminlogincheck');
Route::get('/admin/login', 'Admin\\AdminController@AdminLoginPage');
Route::post('login_verfiy', 'Admin\\AdminController@AdminLoginCheck')->name('admin.login');
Route::get('/logout', 'Admin\\AdminController@AdminLogout');
Route::get('doctorApprove/{doc_id}', 'Admin\\AdminController@DoctorApprove')->name('doctor.approve');
Route::get('doctorall', 'Admin\\AdminController@DoctorAll')->name('admin.doctors');
