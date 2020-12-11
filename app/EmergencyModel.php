<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmergencyModel extends Model
{
    public $table = 'emergency';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public  $timestamps = false;
}
