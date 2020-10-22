<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DoctorRegistar;
use Illuminate\Support\Facades\DB;

class PaitentHomecontroller extends Controller
{
    public function getAlldata()
    {
        $doctor = array();
        $result = json_decode(DoctorRegistar::select('id',)->orderBy('id')->where('status', '=', 1)->get());
        // return $result;
        for ($i = 0; $i < count($result); $i++) {
            $doctor[$i] = json_decode(DB::table('doctor_register')
                ->select('doctor_register.name', 'doctor_register.email', 'doctor_register.phone', 'doctor_register.address', 'doctor_education.institution', 'doctor_education.subject', 'doctor_education.starting', 'doctor_education.ending', 'doctor_education.category', 'doctor_education.doctor_id', 'doctor_education.degree', 'doctor_education.grade', 'doctor_education.birth_date', 'doctor_education.image', 'doctor_education.phone2', 'doctor_experience.company_name', 'doctor_experience.location', 'doctor_experience.job_position', 'doctor_experience.period_start', 'doctor_experience.period_end', 'doctor_experience.doctor_id')
                ->join('doctor_education', 'doctor_education.doctor_id', '=', 'doctor_register.id')
                ->join('doctor_experience', 'doctor_experience.doctor_id', '=', 'doctor_register.id')
                ->where('doctor_register.id', '=', $result[$i]->id)
                ->where('doctor_education.doctor_id', '=', $result[$i]->id)
                ->where('doctor_experience.doctor_id', '=', $result[$i]->id)
                ->where('doctor_register.status', '=', 1)
                // ->where('doctor_education.doctor_status', '=', 1)
                ->get());
        }
        // return ($doctor);

        return View('main', [
            'doctorAllInfo' =>($doctor),
        ]);
    }
}
