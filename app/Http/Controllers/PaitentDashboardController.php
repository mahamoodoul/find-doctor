<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AppointmentModel;
use App\DoctorRegistar;
use App\PrescriptionModel;
use App\PdfModel;
use App\PaitentRegisterModel;
use PDF;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\json_decode;

class PaitentDashboardController extends Controller
{
    public function Home(Request $request)
    {

        $p_id = $request->session()->get('paitent_id');
        $result = (AppointmentModel::where('paitent_id', '=', $p_id)->where('status', '=', 0)->get()->toArray());

        $j = 0;
        $info = array();


        if ($result) {
            for ($i = 0; $i < count($result); $i++) {
                $docID[$j] = $result[$i]['doc_id'];
                $j++;
            }

            $doc_name = array();
            for ($k = 0; $k < count($docID); $k++) {
                $doc_name[$k] = DoctorRegistar::select("name")->where('id', '=', $docID[$k])->get()->toArray();
                if ($docID[$k] == $result[$k]['doc_id']) {
                    $info[$k] = $result[$k] + $doc_name[$k][0];
                }
            }
        }





        $totalpresinfo = array();
        $pres = (PdfModel::select("doc_id", "app_id")
            ->where('paitent_id', '=', $p_id)
            ->where('status', '=', 1)->get()->toArray());
        // return $pres;

        if ($pres) {
            $presinfo = array();

            if ($pres) {
                for ($l = 0; $l < count($pres); $l++) {
                    $pres_docID[$l] = $pres[$l]['doc_id'];
                }
            }
            for ($m = 0; $m < count($pres_docID); $m++) {
                $pres_doc_name[$m] = DoctorRegistar::select("name")->where('id', '=', $pres_docID[$m])->get()->toArray();
                if ($pres_docID[$m] == $pres[$m]['doc_id']) {
                    $presinfo[$m] = $pres[$m] + $pres_doc_name[$m][0];
                }
            }

            for ($c = 0; $c < count($presinfo); $c++) {
                $appointment_ids[$c] = $pres[$c]['app_id'];
            }

            for ($r = 0; $r < count($appointment_ids); $r++) {
                $pres_app_info[$r] = AppointmentModel::select("date", "slot")->where('id', '=', $appointment_ids[$r])->get()->toArray();
                if ($appointment_ids[$r] == $presinfo[$r]['app_id']) {
                    $totalpresinfo[$r] = $presinfo[$r] + $pres_app_info[$r][0];
                }
            }
        }

        // return $totalpresinfo;






        return View('paitent_dashboard', [
            'app_info' => ($info),
            'totalpresinfo' => $totalpresinfo,
        ]);
    }






    public function delAppointment(Request $request)
    {
        $appid = $request->input("appid");
        $result = AppointmentModel::where('id', '=', $appid)->delete();
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }

    public function generatepdf(Request $request, $appid)
    {


        $pres_info = (PdfModel::where('app_id', '=', $appid)->get());
        $doc_id = $pres_info[0]->doc_id;
        $paitent_id = $pres_info[0]->paitent_id;
        $med_name = unserialize($pres_info[0]->med_name);
        $med_time = unserialize($pres_info[0]->med_time);
        $procedure = unserialize($pres_info[0]->procedure);

        $doctorInfo =  DB::table('doctor_register')
            ->select('doctor_register.name', 'doctor_education.institution', 'doctor_education.subject', 'doctor_education.category', 'doctor_education.degree', 'doctor_experience.company_name', 'doctor_experience.location', 'doctor_experience.job_position')
            ->join('doctor_education', 'doctor_education.doctor_id', '=', 'doctor_register.id')
            ->join('doctor_experience', 'doctor_experience.doctor_id', '=', 'doctor_register.id')
            ->where('doctor_register.id', '=', $doc_id)
            ->where('doctor_education.doctor_id', '=', $doc_id)
            ->where('doctor_experience.doctor_id', '=', $doc_id)
            ->get();
        $paitent_info = PaitentRegisterModel::select("name", "age", "phone", "blood_group")->where('paitent_id', '=', $paitent_id)->get();
        $todaydate = date("Y-m-d h:i:sa");

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

        return $pdf->stream($paitent_id . '.pdf');
    }

    public function ViewMedicine(Request $request, $appid)
    {

        $pres_info = (PdfModel::where('app_id', '=', $appid)->get());
        $doc_id = $pres_info[0]->doc_id;
        $paitent_id = $pres_info[0]->paitent_id;
        $med_name = unserialize($pres_info[0]->med_name);
        $med_time = unserialize($pres_info[0]->med_time);
        $procedure = unserialize($pres_info[0]->procedure);

        $doctorInfo =  DB::table('doctor_register')
            ->select('doctor_register.name', 'doctor_education.institution', 'doctor_education.subject', 'doctor_education.category', 'doctor_education.degree', 'doctor_experience.company_name', 'doctor_experience.location', 'doctor_experience.job_position')
            ->join('doctor_education', 'doctor_education.doctor_id', '=', 'doctor_register.id')
            ->join('doctor_experience', 'doctor_experience.doctor_id', '=', 'doctor_register.id')
            ->where('doctor_register.id', '=', $doc_id)
            ->where('doctor_education.doctor_id', '=', $doc_id)
            ->where('doctor_experience.doctor_id', '=', $doc_id)
            ->get();
        $paitent_info = PaitentRegisterModel::select("name", "age", "phone", "blood_group")->where('paitent_id', '=', $paitent_id)->get();
        $todaydate = date("Y-m-d h:i:sa");

        $pres_info = [
            'med_name' => $med_name,
            'med_time' => $med_time,
            'procedure' => $procedure,
            'doc_info' => $doctorInfo,
            'paitent_info' => $paitent_info,
            'app_id' => $appid,
            'date' => $todaydate
        ];
        return $pres_info;
    }
}
