<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mh_Sms_Filesupload extends Model
{
    use HasFactory;

    protected $table = 'mh_sms_filesupload';


    protected $fillable = [
        'id',
        'userID',
        'fileName',
        'pdfFile',
        'fileDisignation',
        'imageColor',
        'orderNumber',
        'orderNo',

    ];
}
