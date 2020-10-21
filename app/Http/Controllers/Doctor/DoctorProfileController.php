<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DoctorRegistar;
use App\DoctorCategory;
use App\DoctorEducationModel;
use App\DoctorExperienceModel;
use Illuminate\Support\Facades\DB;

class DoctorProfileController extends Controller
{
    //
    public function profile()
    {
        return view("doctor\profile");
    }
    public function edit_profile()
    {
        return view("doctor\update_profile");
    }
    public function getBasicInfo(Request $request)
    {

        $doctor_id = $request->session()->get('doctorId');
        $result = json_decode(DoctorRegistar::where('id', '=', $doctor_id)->orderBy('id', 'desc')->get());
        return $result;
    }
    public function getDoctorCatgory()
    {
        $result = json_decode(DoctorCategory::select('id', 'category')->orderBy('id', 'desc')->get());
        return $result;
    }



    public function updateDoctorInfo(Request $request)
    {
        $data = json_decode($_POST['doctor_update_data']);


        $name = $data[0]->name;
        $email = $data[0]->email;
        $address = $data[0]->address;
        $phone = $data[0]->phone;


        $birthdate = $data[0]->birthdate;
        $category = $data[0]->category;
        $phone2 = $data[0]->phone2;
        $institution = $data[0]->institution;
        $subject = $data[0]->subject;
        $starting_data = $data[0]->starting_data;
        $complete_date = $data[0]->complete_date;
        $degree = $data[0]->degree;
        $grade = $data[0]->grade;


        $company_name = $data[0]->company_name;
        $location_of_job = $data[0]->location;
        $position = $data[0]->position;
        $from = $data[0]->from;
        $end = $data[0]->end;




        $photoPath =  $request->file('image');
        // return $data;

        $allowedfileExtension = ['jpg', 'png'];
        $extension = $photoPath->getClientOriginalExtension();
        $check = in_array($extension, $allowedfileExtension);
        if ($check) {
            $photoPath =  $request->file('image')->store('public');
            $photoName = (explode('/', $photoPath))[1];
            $host = $_SERVER['HTTP_HOST'];
            $image_location = "http://" . $host . "/storage/" . $photoName;
            $doctor_id = $request->session()->get('doctorId');

            $result = DoctorRegistar::where('id', '=', $doctor_id)->update(['name' => $name, 'email' => $email, 'address' => $address, 'phone' => $phone]);

            $result1 = DoctorEducationModel::insert([
                'institution' => $institution,
                'subject' => $subject,
                'starting' => $starting_data,
                'ending' => $complete_date,
                'category' => $category,
                'degree' => $degree,
                'grade' => $grade,
                'birth_date' => $birthdate,
                'image' => $image_location,
                'phone2' => $phone2,
                'doctor_id' => $doctor_id,
                'doctor_status' => 0
            ]);
            $result2 = DoctorExperienceModel::insert([
                'company_name' => $institution,
                'location' => $location_of_job,
                'job_position' => $position,
                'period_start' => $from,
                'period_end' => $end,
                'doctor_id' => $doctor_id
            ]);


            if ($result2 == true) {
                return 1;
            } else {
                return 0;
            }



            // return $image_location;
        }
    }
    public function getDoctorAllInformation(Request $request)
    {



        $doctor_id = $request->session()->get('doctorId');

        $doctorInfo =  DB::table('doctor_register')
            ->select('doctor_register.name', 'doctor_register.email', 'doctor_register.phone', 'doctor_register.address', 'doctor_education.institution', 'doctor_education.subject', 'doctor_education.starting', 'doctor_education.ending', 'doctor_education.category', 'doctor_education.degree', 'doctor_education.grade', 'doctor_education.birth_date', 'doctor_education.image', 'doctor_education.phone2', 'doctor_experience.company_name', 'doctor_experience.location', 'doctor_experience.job_position', 'doctor_experience.period_start', 'doctor_experience.period_end')
            ->join('doctor_education', 'doctor_education.doctor_id', '=', 'doctor_register.id')
            ->join('doctor_experience', 'doctor_experience.doctor_id', '=', 'doctor_register.id')
            ->where('doctor_register.id', '=', $doctor_id)
            ->get();

        return $doctorInfo;
    }
    public function getdoctorExperience()
    {
    }




    public function doctorInfoUpdate(Request $request)
    {


        $doctor_id = $request->session()->get('doctorId');
        $countExperience = DoctorExperienceModel::where('doctor_id', '=', $doctor_id)->count();
        $countEducation = DoctorEducationModel::where('doctor_id', '=', $doctor_id)->count();
        if ($countExperience == 1 && $countEducation == 1) {
            return 1;
        } else {
            return 0;
        }
    }
}
