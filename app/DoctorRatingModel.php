<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorRatingModel extends Model
{
    public $table = 'rating';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public  $timestamps = false;
}
