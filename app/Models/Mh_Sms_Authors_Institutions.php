<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mh_Sms_Authors_Institutions extends Model
{
    use HasFactory;

    protected $table = 'mh_sms_authors_institutions';


    protected $fillable = [
        'id',
        'userID',
        'authSequence',
        'authTitle',
        'authFirstName',
        'authLastName',
        'authEmailAddress',
        'authAffiliation',
        'authCountry',
        'authCorresponding',
        'orderNumber',
        

        
      
    ];
}
