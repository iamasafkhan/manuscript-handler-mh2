<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mh_sms_unsuggestedrev extends Model
{
    use HasFactory;

    protected $table = 'mh_sms_unsuggestedrev';


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
