<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AppointmentModel;
use App\DoctorRegistar;
use App\PrescriptionModel;

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
        $pres = (PrescriptionModel::select("doc_id", "prescriton_link", "appointment_id")->where('paitent_id', '=', $p_id)->where('status', '=', 0)->get()->toArray());

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
                $appointment_ids[$c] = $pres[$c]['appointment_id'];
            }

            for ($r = 0; $r < count($appointment_ids); $r++) {
                $pres_app_info[$r] = AppointmentModel::select("date", "slot")->where('id', '=', $appointment_ids[$r])->get()->toArray();
                if ($appointment_ids[$r] == $presinfo[$r]['appointment_id']) {
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
}
