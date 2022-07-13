<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mh_Sms_Keywords extends Model
{
    use HasFactory;

    protected $table = 'mh_sms_keywords';


    protected $fillable = [
        'id',
        'userID	',
        'keywords',
        'orderNumber',
  
    ];
}
