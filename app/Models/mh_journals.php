<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class mh_journals extends Authenticatable 
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'mh_journals';

    protected $fillable = [
        'id',
        'name',
        'shortname',
        'seo',
        'journalHomePage',
        'shortDescription',
        'description',
        'ithenticatestatus',
        'journalDisplayStatus',
        'status',
        'leftimage',
        'detailimage',
        'bannerImage',
        'entryDate',
  
    ];



 

}
