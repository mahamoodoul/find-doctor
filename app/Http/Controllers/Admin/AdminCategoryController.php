<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DoctorCategory;
class AdminCategoryController extends Controller
{
    public function DoctorCategory(){
        return view("admin.category");
    }

    public function getDoctorCategory(){
        $total_slot = (DoctorCategory::select('category')->get());
        if($total_slot){
            return $total_slot;
        }else{
            return 0;
        }
    }

    public function adddoctorCategory(Request $request){
        $cat = $request->input('cat');

        $result = DoctorCategory::insert([
            'category' => $cat
        ]);
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }
}
