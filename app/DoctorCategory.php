<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorCategory extends Model
{
    public $table = 'doctor_category';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public  $timestamps = true;
}
