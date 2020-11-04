<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use PDF;
use App\AppointmentModel;
use App\VideoModel;

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

        // $name= $request->file('doc')->getClientOriginalName();
        // // $fileName = $request->get('doc') . '.' . $request->file('doc')->extension();
        // $namefile = $request->file('doc')->storeAs('Report', $name);
        // $host = $_SERVER['HTTP_HOST'];
        // $location = "http://" . $host . "/storage/" . $namefile;
        // return $location;




    }

    public function generatePDF()
    {

        $data = json_decode($_POST['data']);
        return $data;

        
        $data = [
            'title' => 'First PDF for Coding Driver',
            'heading' => 'Hello from Coding Driver',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry '
        ];

        $pdf = PDF::loadView('doctor.genarate_pdf', $data);

        return $pdf->stream();

        //   return $pdf->download('codingdriver1.pdf');
    }
}
