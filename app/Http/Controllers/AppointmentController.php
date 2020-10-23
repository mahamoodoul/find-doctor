<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function singleDoctorView($docID)
    {
        return view("singleDoctorAppointment");
    }
}
