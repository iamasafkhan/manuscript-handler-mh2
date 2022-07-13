<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class mh_companies extends Authenticatable 
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'mh_companies';

    protected $fillable = [
        'id',
        'companyName',
        'companyShortName',
        'companySEOURL',
        'companyEmailAddress',
        'companyPhoneNumber',
        'companyWebsite',
        'companyAddress',
        'companyLogo',
        'companyDescription',
        'companyDisplayStatus',
        'companyStatus',

  
    ];



 

}
