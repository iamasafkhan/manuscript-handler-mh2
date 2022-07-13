<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mh_sms_suggestedrev extends Model
{
    use HasFactory;

    protected $table = 'mh_sms_suggestedrev';


    protected $fillable = [
        'id',
        'userID',
        'recommendingName',
        'recommendingEmail',
        'recommendingExperties',
        'recommendingAffiliation',
        'recommendingCountry',
        'orderNumber',

    ];
}
