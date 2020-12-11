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
use App\PdfModel;
use Illuminate\Support\Facades\DB;
use PaitentRegister;
use App\Http\Controllers\PaitentDashboardController;

use function GuzzleHttp\json_decode;

class PaitentAppointmentController extends Controller
{
    public function getUpcommingAppointment(Request $request)
    {

        $today = date("m-d-Y");
        // $date= str_replace("-","/",$today);

        $doctor_id = $request->session()->get('doctorId');
        $result = (AppointmentModel::where('doc_id', '=', $doctor_id)->where('status','=', 0)->where('date', '>=', $today)->get());
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
        // return $link;
        $p_id = $data[0]->p_id;

        $paitentemail = PaitentRegisterModel::select("email")->where('paitent_id', '=', $p_id)->get();
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
            \Mail::to($paitentemail[0]->email)->send(new \App\Mail\VideoMail($link));
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


            AppointmentModel::where('id', '=', $appid)->update(['status' => 1]);
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
        $p_id = $data[0]->p_id;




        $medicine = $data[0]->prescription;
        // return $medicine;
        $med_name = $medicine[0];

        $med_time = $medicine[1];
        $procedure = $medicine[2];

        $count = (PdfModel::where('app_id', '=', $appid)->count());

        if ($count == 0) {
            $insert = (PdfModel::insert([
                'app_id' => $appid,
                'doc_id' => $doc_id,
                'paitent_id' => $p_id,
                'med_name' => serialize($med_name),
                'med_time' => serialize($med_time),
                'procedure' => serialize($procedure),
                'status' => 0
            ]));
        } else {
            $insert = PdfModel::where('app_id', '=', $appid)->update(['med_name' => serialize($med_name), 'med_time' => serialize($med_time), 'procedure' => serialize($procedure)]);
        }



        if ($insert == true) {
            return 1;
        } else {
            return 0;
        }
    }



    public function sendPrescription(Request $request, $appid)
    {
        // return $appid;
        $statuschangePdfData = PdfModel::where('app_id', '=', $appid)->update(['status' => 1]);
        $update_app = (AppointmentModel::where('id', '=', $appid)->update(['status' => 1]));
        $update_video = (VideoModel::where('appointment_id', '=', $appid)->update(['status' => 1]));
        // return $statuschange;
        // $Appostatuschange = AppointmentModel::where('id', '=', $appid)->update(['status' => 1]);
        if ($statuschangePdfData == true ) {
            return 1;
        } else {
            return 0;
        }
    }


    public function completed_appointment(Request $request )
    {

        $doctor_id = $request->session()->get('doctorId');
        $result = (AppointmentModel::where('doc_id', '=', $doctor_id)->where('status', '=', 1)->get());
        //  return $result;
        return view("Doctor/completed_appointment",[
            'data' =>$result
        ]);
    }
}
