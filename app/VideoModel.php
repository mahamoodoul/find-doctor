<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoModel extends Model
{
    
    public $table = 'video_link';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public  $timestamps = false;
}
