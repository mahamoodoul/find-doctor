<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PdfModel extends Model
{
    public $table = 'pdf_data';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public  $timestamps = false;
}
