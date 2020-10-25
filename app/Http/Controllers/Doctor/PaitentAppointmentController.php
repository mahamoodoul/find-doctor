<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AppointmentModel;
class PaitentAppointmentController extends Controller
{
    public function getUpcommingAppointment(Request $request){

        $today = date("m-d-Y");  
        $date= str_replace("-","/",$today);
        $doctor_id = $request->session()->get('doctorId');
        $result = (AppointmentModel::where('doc_id', '=', $doctor_id)->where('date', '>', $date)->get());
        return $result;
    }

}
