<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DoctorRatingModel;
use App\DoctorRegistar;
use App\RatingAvgModel;


class RatingController extends Controller
{
    public function RatingsingleDoctor(Request $request, $docID, $app_id)
    {


        // return $docID;
        $doc_id = $docID;
        $doctorInfo = DB::table('doctor_register')
            ->select('doctor_register.id', 'doctor_register.name', 'doctor_register.email', 'doctor_register.phone', 'doctor_register.address', 'doctor_education.institution', 'doctor_education.subject', 'doctor_education.starting', 'doctor_education.ending', 'doctor_education.category', 'doctor_education.degree', 'doctor_education.grade', 'doctor_education.birth_date', 'doctor_education.image', 'doctor_education.phone2', 'doctor_experience.company_name', 'doctor_experience.location', 'doctor_experience.job_position', 'doctor_experience.period_start', 'doctor_experience.period_end')
            ->join('doctor_education', 'doctor_education.doctor_id', '=', 'doctor_register.id')
            ->join('doctor_experience',  'doctor_experience.doctor_id', '=', 'doctor_register.id')
            ->where('doctor_register.id', '=', $doc_id)
            ->where('doctor_education.doctor_id', '=', $doc_id)
            ->where('doctor_experience.doctor_id', '=', $doc_id)
            ->where('doctor_register.status', '=', 1)
            ->get();



        if (count($doctorInfo) == 1) {
            return view('Rating', [
                'doctorAllInfo' => $doctorInfo,
                'app_id' => $app_id

            ]);
        } else {
            return 0;
        }
        return $doc_id;
    }



    public function DoctorRating(Request $request)
    {
        $doc_id = $request->input('doc_id');
        $app_id = $request->input('app_id');
        $ratingIndex = $request->input('ratedIndex');
        $count = DoctorRatingModel::where('doc_id', '=', $doc_id)->where('app_id', '=', $app_id)->count();
        if ($count == 0) {
            $result = DoctorRatingModel::insert([
                'app_id' => $app_id,
                'doc_id' => $doc_id,
                'rating' => $ratingIndex+1
            ]);
        } else {

            $result = DoctorRatingModel::where('app_id', '=', $app_id)->where('doc_id', '=', $doc_id)->update(['rating' => $ratingIndex+1]);
        }


        if ($result == true) {
            return $ratingIndex;
        } else {
            return 0;
        }
    }



    public function getRating()
    {

        $result = json_decode(DoctorRatingModel::select('app_id', 'doc_id', 'rating')->orderBy('id')->get());
        $docid = array();
        for ($j = 0; $j < count($result); $j++) {
            $docid[$j] = $result[$j]->doc_id;
        }
        $id = array_unique($docid);
        $id = array_values($id);
        for ($k = 0; $k < count($id); $k++) {
            $avgrating[$k]['id'] = $id[$k];
            $avgrating[$k]['avg'] = round(DB::table('rating')->where('doc_id', '=', $id[$k])->avg('rating'));
        }
        // return ($avgrating[0]['avg']);
        $avgdocID = (RatingAvgModel::select('doc_id')->orderBy('id')->get());

        for ($a = 0; $a < count($avgdocID); $a++) {
            $doctor_id[$a] = $avgdocID[$a]->doc_id;
        }

        if (!empty($avgrating)){
            for ($l = 0; $l < count($avgrating); $l++) {
                if (in_array($avgrating[$l]['id'], $doctor_id)) {

                    $update = RatingAvgModel::where('doc_id', '=', $avgrating[$l]['id'])->update(['avg' => $avgrating[$l]['avg']]);
                    return true;
                } else {
                    $insertavg = RatingAvgModel::insert([
                        'doc_id' => $avgrating[$l]['id'],
                        'avg' => $avgrating[$l]['avg']
                    ]);
                    return true;
                }
            }
        }

    }
}
