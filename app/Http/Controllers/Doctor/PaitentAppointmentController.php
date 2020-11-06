<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use DB;
use PDF;
use App\AppointmentModel;
use App\VideoModel;
use App\DoctorRegistar;
use App\DoctorEducationModel;
use App\DoctorExperienceModel;
use App\PaitentRegisterModel;
use App\PrescriptionModel;
use Illuminate\Support\Facades\DB;
use PaitentRegister;

class PaitentAppointmentController extends Controller
{
    public function getUpcommingAppointment(Request $request)
    {

        $today = date("m-d-Y");
        // $date= str_replace("-","/",$today);

        $doctor_id = $request->session()->get('doctorId');
        $result = (AppointmentModel::where('doc_id', '=', $doctor_id)->where('date', '>', $today)->get());
        return $result;
    }



    public function getvideolinkPaitent(Request $request, $id, $date, $slot)
    {

        $p_id = $id;
        $date = $date;
        $slot = $slot;

        $doctor_id = $request->session()->get('doctorId');
        $result = (AppointmentModel::where('doc_id', '=', $doctor_id)->where('date', '=', $date)->where('slot', '=', $slot)->get());
        $app_id = $result[0]->id;
        $link = (VideoModel::select('link')->where('appointment_id', '=', $app_id)->get());


        return view('doctor/paitentsingleinfo', [
            'app_info' => ($result),
            'video_link' => $link
        ]);
    }

    public function SendVideoLink(Request $request)
    {

        $data = json_decode($_POST['data']);
        $app_id = $data[0]->app_id;
        $link = $data[0]->link;
        $p_id = $data[0]->p_id;
        $doctor_id = $request->session()->get('doctorId');
        $linkcount = (VideoModel::where('appointment_id', '=', $app_id)->count());


        if ($linkcount == 1) {

            $result = VideoModel::where('appointment_id', '=', $app_id)->update(['link' => $link]);
        } else {
            $result = VideoModel::insert([
                'appointment_id' => $app_id,
                'doc_id' => $doctor_id,
                'paitent_id' => $p_id,
                'link' => $link,
                'status' => 0
            ]);
        }

        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }





    public function getdocreport(Request $request)
    {

        $data = json_decode($_POST['pdf_info']);

        $appid = $data[0]->app_id;
        $p_id = $data[0]->p_id;
        $doctor_id = $request->session()->get('doctorId');


        $name = $request->file('pdf')->getClientOriginalName();
        $allowed =  array('pdf');
        $ext = pathinfo($name, PATHINFO_EXTENSION);
        if (!in_array($ext, $allowed)) {
            return 2;
        } else {

            // $fileName = $request->get('doc') . '.' . $request->file('doc')->extension();
            $namefile = $request->file('pdf')->storeAs('public/Report', $name);
            $pdfname = str_replace("public/", "", $namefile);


            // $host = $_SERVER['HTTP_HOST'];
            // $location = "http://" . $host . "/storage/" . $namefile;
            $countprescrition = (PrescriptionModel::where('appointment_id', '=', $appid)->count());
            // return $countprescrition;
            if ($countprescrition == 0) {
                $result = PrescriptionModel::insert([
                    'appointment_id' => $appid,
                    'doc_id' => $doctor_id,
                    'paitent_id' => $p_id,
                    'prescriton_link' => $pdfname,
                    'status' => 0
                ]);
            } else {
                $result = PrescriptionModel::where('appointment_id', '=', $appid)->update(['prescriton_link' => $pdfname]);
            }

            if ($result == true) {
                return 1;
            } else {
                return 0;
            }
        }
    }










    public function generatePDF()
    {

        $data = json_decode($_POST['data']);
        $appid = $data[0]->app_id;
        $app_info = (AppointmentModel::select("doc_id")->where('id', '=', $appid)->get());
        $doc_id = $app_info[0]->doc_id;


        $doctorInfo =  DB::table('doctor_register')
            ->select('doctor_register.name', 'doctor_education.institution', 'doctor_education.subject', 'doctor_education.category', 'doctor_education.degree', 'doctor_experience.company_name', 'doctor_experience.location', 'doctor_experience.job_position')
            ->join('doctor_education', 'doctor_education.doctor_id', '=', 'doctor_register.id')
            ->join('doctor_experience', 'doctor_experience.doctor_id', '=', 'doctor_register.id')
            ->where('doctor_register.id', '=', $doc_id)
            ->where('doctor_education.doctor_id', '=', $doc_id)
            ->where('doctor_experience.doctor_id', '=', $doc_id)
            ->get();

        // return $doctorInfo;

        $p_id = $data[0]->p_id;
        $paitent_info = PaitentRegisterModel::select("name", "age", "phone", "blood_group")->where('paitent_id', '=', $p_id)->get();


        $todaydate = date("Y-m-d h:i:sa");


        $medicine = $data[0]->prescription;
        $med_name = $medicine[0];
        $med_time = $medicine[1];
        $procedure = $medicine[2];


        $pres_info = [
            'med_name' => $med_name,
            'med_time' => $med_time,
            'procedure' => $procedure,
            'doc_info' => $doctorInfo,
            'paitent_info' => $paitent_info,
            'app_id' => $appid,
            'date' => $todaydate
        ];

        $pdf = PDF::loadView('doctor.genarate_pdf', $pres_info);

        return $pdf->download($p_id . '.pdf');
    }
}
