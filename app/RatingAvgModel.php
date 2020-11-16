<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RatingAvgModel extends Model
{
    public $table = 'rating_avg';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public  $timestamps = false;
}
