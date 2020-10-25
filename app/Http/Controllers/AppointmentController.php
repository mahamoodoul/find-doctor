<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DoctorSlotModel;
use App\AppointmentModel;

class AppointmentController extends Controller
{
    public function singleDoctorView($docID)
    {

        // return $docID;
        $doc_id = $docID;


        $doctorInfo = DB::table('doctor_register')
            ->select('doctor_register.id', 'doctor_register.name', 'doctor_register.email', 'doctor_register.phone', 'doctor_register.address', 'doctor_education.institution', 'doctor_education.subject', 'doctor_education.starting', 'doctor_education.ending', 'doctor_education.category', 'doctor_education.degree', 'doctor_education.grade', 'doctor_education.birth_date', 'doctor_education.image', 'doctor_education.phone2', 'doctor_experience.company_name', 'doctor_experience.location', 'doctor_experience.job_position', 'doctor_experience.period_start', 'doctor_experience.period_end')
            ->join('doctor_education', 'doctor_education.doctor_id', '=', 'doctor_register.id')
            ->join('doctor_experience',  'doctor_experience.doctor_id', '=', 'doctor_register.id')
            ->where('doctor_register.id', '=', $doc_id)
            ->where('doctor_education.doctor_id', '=', $doc_id)
            ->where('doctor_experience.doctor_id', '=', $doc_id)
            ->get();
        // return $doctorInfo;
        $result = (DoctorSlotModel::select('slot',)->where('doctor_id', '=', $doc_id)->get());
        $res = preg_replace('/[^a-zA-Z0-9:,]/', "", $result[0]->slot);
        $slot = array();
        $slot = explode(",", $res);
        // dd($slot);

        // return $slot[0];



        // $slot=array();
        // $i=0;
        // while(true){
        //     $slot[$i] = explode(",", $res);
        // }
        // return $slot;


        // return ($slot);
        // for ($i = 10; $i < count($slot); $i++) {
        //     $slot[$i] = $slot[$i];
        // }







        if (count($doctorInfo) == 1) {
            return view('singleDoctorAppointment', [
                'doctorAllInfo' => $doctorInfo,
                'slotall' => $slot,
            ]);
        } else {
            return 0;
        }
    }

    public function TakeAppointment(Request $request)
    {

        $paitent_id = $request->session()->get('paitent_id');
        // $paitent_id_primary = $request->session()->get('id');
        $paitent_name = $request->session()->get('p_name');


        $data = json_decode($_POST['appointment_data']);
        $doc_id = $data[0]->doc_id;
        $date = $data[0]->date;
        $slot = $data[0]->slot;
        $message = $data[0]->message;
        // return  $data;

        if ($data) {
            $countappointment = AppointmentModel::where('slot', '=', $slot)->where('date', '=', $date)->where('doc_id', '=', $doc_id)->count();
            // return $countappointment;
            if ($countappointment == 0) {
                $result = AppointmentModel::insert([
                    'paitent_id' => $paitent_id,
                    'paitent_name' => $paitent_name,
                    'doc_id' => $doc_id,
                    'slot' => $slot,
                    'date' => $date,
                    'message' => $message,
                    'status' => 0
                ]);
                if ($result == true) {
                    return 1;
                } else {
                    return 0;
                }
            } else {
                return 2;
            }
        }
    }
}
