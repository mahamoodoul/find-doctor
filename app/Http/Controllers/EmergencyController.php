<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmergencyModel;

class EmergencyController extends Controller
{
    public function contact_emergency(Request $request){

        $data = json_decode($_POST['emergency_data']);

        $name = $data[0]->name;
        $email = $data[0]->email;
        $phone = $data[0]->phone;
        $slot = $data[0]->subject;
        $message = $data[0]->message;
        
        return $data;
    }
}
