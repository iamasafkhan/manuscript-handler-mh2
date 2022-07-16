<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mh_Sms_Typetitleabstract extends Model
{
    use HasFactory;

    protected $table = 'mh_sms_typetitleabstract';


    protected $fillable = [
        'id',
        'userID',
        'typeOfManuScript',
        'areaOfSpecificInterest',
        'manuscriptTitle',
        'runningTitle',
        'manuscriptAbstract',
        'manuscriptAcknowledgement',
        'orderNumber',
        
      
    ];
}
