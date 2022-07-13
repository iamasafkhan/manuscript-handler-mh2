<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class mh_demorequests extends Authenticatable 
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'mh_demorequests';

    protected $fillable = [
        'id',
        'preferredDates',
        'yourName',
        'publication',
        'emailAddress',
        'telephone',
        'meansofdemo',
        'comments',
 
    ];



 

}
