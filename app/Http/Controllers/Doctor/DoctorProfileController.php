<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DoctorRegistar;
class DoctorProfileController extends Controller
{
    //
    public function profile(){
        return view("doctor\profile");
    }
    public function edit_profile(){
        return view("doctor\update_profile");
    }
    public function getBasicInfo(Request $request){

        $doctor_id = $request->session()->get('doctorId');
        $result = json_decode(DoctorRegistar::where('id', '=', $doctor_id)->orderBy('id', 'desc')->get());
        return $result;
    }
}
