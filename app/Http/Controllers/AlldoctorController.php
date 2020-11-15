<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\DoctorCategory;
use App\DoctorRegistar;
use App\DoctorEducationModel;
use Illuminate\Support\Facades\DB;

class AlldoctorController extends Controller
{
    public function AlldoctorHome()
    {

        $category = json_decode(DoctorCategory::select("category")->get());
        // return $category;
        return view('AllDoctor', [
            'category' => $category,

        ]);
    }
    public function getDoctorbyCat(Request $request, $cat)
    {

        // return $cat;
        $doctor = array();
        $result = json_decode(DoctorEducationModel::select('doctor_id',)->orderBy('id')->where('category', '=', $cat)->get());
        // return $result;
        for ($i = 0; $i < count($result); $i++) {
            $doctor[$i] = json_decode(DB::table('doctor_register')
                ->select('doctor_register.name', 'doctor_register.email', 'doctor_register.phone', 'doctor_register.address', 'doctor_education.institution', 'doctor_education.subject', 'doctor_education.starting', 'doctor_education.ending', 'doctor_education.category', 'doctor_education.doctor_id', 'doctor_education.degree', 'doctor_education.grade', 'doctor_education.birth_date', 'doctor_education.image', 'doctor_education.phone2', 'doctor_experience.company_name', 'doctor_experience.location', 'doctor_experience.job_position', 'doctor_experience.period_start', 'doctor_experience.period_end', 'doctor_experience.doctor_id')
                ->join('doctor_education', 'doctor_education.doctor_id', '=', 'doctor_register.id')
                ->join('doctor_experience', 'doctor_experience.doctor_id', '=', 'doctor_register.id')
                ->where('doctor_register.id', '=', $result[$i]->doctor_id)
                ->where('doctor_education.doctor_id', '=', $result[$i]->doctor_id)
                ->where('doctor_experience.doctor_id', '=', $result[$i]->doctor_id)
                ->where('doctor_register.status', '=', 1)
                ->get());
        }
        return $doctor;
    }
}
