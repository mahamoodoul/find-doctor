<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\AdminModel;
use App\DoctorRegistar;
use App\DoctorEducationModel;
use App\DoctorExperienceModel;
use App\AppointmentModel;

use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function AdminDashboard()
    {
        $doctor = array();
        $result = json_decode(DoctorRegistar::select('id',)->orderBy('id')->where('status', '=', 0)->get());
        $doc_edu = DoctorEducationModel::select('doctor_id',)->orderBy('id')->get()->toArray();
        $doc_exp = DoctorExperienceModel::select('doctor_id',)->orderBy('id')->get()->toArray();
        for ($a = 0; $a < count($doc_exp); $a++) {
            $doc_edu_id[$a] = $doc_edu[$a]['doctor_id'];
        }
        for ($a = 0; $a < count($doc_exp); $a++) {
            $doc_exp_id[$a] = $doc_exp[$a]['doctor_id'];
        }
        for ($i = 0; $i < count($result); $i++) {

            if (in_array($result[$i]->id,  $doc_edu_id) && in_array($result[$i]->id,  $doc_exp_id)) {

                $doctor[$i] = (DB::table('doctor_register')
                    ->select('doctor_register.name', 'doctor_register.email', 'doctor_register.phone', 'doctor_register.address', 'doctor_education.institution', 'doctor_education.subject', 'doctor_education.starting', 'doctor_education.ending', 'doctor_education.category', 'doctor_education.doctor_id', 'doctor_education.degree', 'doctor_education.grade', 'doctor_education.birth_date', 'doctor_education.image', 'doctor_education.phone2', 'doctor_experience.company_name', 'doctor_experience.location', 'doctor_experience.job_position', 'doctor_experience.period_start', 'doctor_experience.period_end', 'doctor_experience.doctor_id')
                    ->leftJoin('doctor_education', 'doctor_education.doctor_id', '=', 'doctor_register.id')
                    ->leftJoin('doctor_experience', 'doctor_experience.doctor_id', '=', 'doctor_register.id')
                    ->where('doctor_register.id', '=', $result[$i]->id)
                    ->where('doctor_education.doctor_id', '=', $result[$i]->id)
                    ->where('doctor_experience.doctor_id', '=', $result[$i]->id)
                    ->where('doctor_register.status', '=', 0)
                    ->get()
                    ->toArray());
            }
        }
        // $appointment=AppointmentModel::where('status','=',0)->orderByDesc('id')->get()->toArray();
        $today = date('m-d-Y');
        $appointment = DB::table('appointment')
            ->select('appointment.paitent_name', 'appointment.slot', 'appointment.date', 'doctor_register.name')
            ->leftJoin('doctor_register', 'doctor_register.id', '=', 'appointment.doc_id')
            ->where('appointment.status', '=', 0)
            ->where('appointment.date','>=',$today)
            ->get()
            ->toArray();

        // return $appointment;





        return view('/admin/dashboard', [
            'docinfo' => $doctor,
            'upcommingapp' =>$appointment
        ]);
    }

    public function AdminLoginPage()
    {
        return view('/admin/login');
    }


    public function AdminLoginCheck(Request $request)
    {

        $this->validate($request, [
            'admin_id' => 'required|max:8',
            'pass' => 'required'
        ]);
        $admin_id = $request->input('admin_id');
        $pass = $request->input('pass');
        $result = AdminModel::where('admin_id', '=', $admin_id)->where('pass', '=', $pass)->count();
        if ($result == 1) {
            $request->session()->put('admin_id', $admin_id);
            return redirect('/admin');
        } else {
            return redirect()->back()->withInput($request->only('admin_id'))->withErrors([
                'approve' => 'Wrong ID or Password or account not approved yet.',
            ]);
        }
    }

    public function AdminLogout(Request $request)
    {
        $request->session()->flush();
        return redirect('/admin/login');
    }


    public function DoctorApprove(Request $request, $docId)
    {

        $result = DoctorRegistar::where('id', '=', $docId)->update(['status' => 1]);
        if ($result == true) {
            return redirect('/admin');
        } else {
            return redirect()->back()->withInput($request->only('id'))->withErrors([
                'approve' => 'Something went Wrong.',
            ]);
        }
    }



    public function DoctorAll(){
        return view('/admin/DoctorsAll');
    }
}
