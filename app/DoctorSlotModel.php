<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorSlotModel extends Model
{
    public $table = 'doctor_slot';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public  $timestamps = false;
}
