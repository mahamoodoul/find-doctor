<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrescriptionModel extends Model
{
    public $table = 'prescrition';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public  $timestamps = false;
}
