<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaitentRegisterModel extends Model
{
    public $table = 'paitent_register';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public  $timestamps = false;
}
