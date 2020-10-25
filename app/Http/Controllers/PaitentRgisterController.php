<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaitentRegisterModel;

class PaitentRgisterController extends Controller
{
    public function PaitentRegister()
    {

        $data = json_decode($_POST['data']);
        $rand_num = mt_rand(100000, 999999);


        $paitent_id = 'paitent-' . ($rand_num);
        $name = $data[0]->name;
        $email = $data[0]->email;
        $number = $data[0]->number;
        $gender = $data[0]->gender;
        $address = $data[0]->address;
        $age = $data[0]->age;
        $blood = $data[0]->blood;
        $password = password_hash($data[0]->password, PASSWORD_BCRYPT);
        $status = 0;




        if ($data) {


            $result = PaitentRegisterModel::insert([
                'paitent_id' => $paitent_id,
                'name' => $name,
                'email' => $email,
                'phone' => $number,
                'gender' => $gender,
                'address' => $address,
                'age' => $age,
                'blood_group' => $blood,
                'password' => $password,
                'status' => $status
            ]);

            if ($result == true) {
                return 1;
            } else {
                return 0;
            }
        }
    }

    public function PaitentLogin(Request $request)
    {

        $data = json_decode($_POST['login_data']);

        $email = $data[0]->email;

        $password = $data[0]->password;

        // $password = password_hash($data[0]->password, PASSWORD_BCRYPT);

        $countRow = PaitentRegisterModel::where('email', '=', $email)->where('password', '=', $password)->count();

        if ($countRow == 1) {
            $result = (PaitentRegisterModel::where('email', '=', $email)->where('password', '=', $password)->get());

            // return $result['0']->id;
            $request->session()->put('id', $result['0']->id);
            $request->session()->put('p_name', $result['0']->name);
            $request->session()->put('paitent_id', $result['0']->paitent_id);
            return 1;
        } else {
            return 0;
        }
    }
    public function PaitentLogout(Request $request)
    {

        $request->session()->flush();
        return redirect('/');
    }
}
