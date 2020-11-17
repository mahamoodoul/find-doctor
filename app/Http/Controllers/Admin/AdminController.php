<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\AdminModel;

class AdminController extends Controller
{
    public function AdminDashboard()
    {
        return view('/admin/dashboard');
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
    public function AdminLogout(Request $request){
        $request->session()->flush();
        return redirect('/admin/login');
    }
}
