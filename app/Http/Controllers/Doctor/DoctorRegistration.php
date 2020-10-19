<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\DoctorRegistar;

class DoctorRegistration extends Controller
{

    public function DoctorDashboard()
    {
        return view('/doctor/dashboard');
    }



    public function DoctorRegister(Request $request)
    {

        $data = json_decode($_POST['data']);
        $name = $data[0]->name;
        $email = $data[0]->email;
        $gender = $data[0]->gender;
        $phone = $data[0]->phone;
        $address = $data[0]->address;
        $password = password_hash($data[0]->password, PASSWORD_BCRYPT);




        if ($data) {


            $result = DoctorRegistar::insert([
                'name' => $name,
                'email' => $email,
                'gender' => $gender,
                'phone' => $phone,
                'address' => $address,
                'password' => $password
            ]);

            if ($result == true) {
                return 1;
            } else {
                return 0;
            }
        }
    }

    public function DoctorLogin(Request $request)
    {
        $data = json_decode($_POST['loginData']);
        $email = $data[0]->email;
        $password = $data[0]->password;
        $countRow =DoctorRegistar::where('email', '=', $email)->where('password', '=', $password)->count();
      
        if ($countRow==1) {
            $result = (DoctorRegistar::where('email', '=', $email)->where('password', '=', $password)->get());
         
            // return $result['0']->id;
            $request->session()->put('doctorId', $result['0']->id);
            $request->session()->put('doctorName', $result['0']->name);
            $request->session()->put('doctorEmail', $result['0']->email);
            return 1;
        } else {
            return 0;
        }
    }

    function onLogout(Request $request){
        $request->session()->flush();
        return redirect('/doctor');
    }

}
