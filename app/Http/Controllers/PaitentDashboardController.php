<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AppointmentModel;
use App\DoctorRegistar;

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
        return View('paitent_dashboard', [
            'app_info' => ($info),
        ]);
        // return $info;



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
