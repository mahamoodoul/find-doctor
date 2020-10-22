<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorExperienceModel extends Model
{
    public $table = 'doctor_experience';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public  $timestamps = false;
}
