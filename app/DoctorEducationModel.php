<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorEducationModel extends Model
{
    public $table = 'doctor_education';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public  $timestamps = true;
}
