<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorRegistar extends Model
{
    public $table = 'doctor_register';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public  $timestamps = true;
}
