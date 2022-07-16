<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class mh_socialpages extends Authenticatable 
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'mh_socialpages';

    protected $fillable = [
        'id',
        'facebook',
        'twitter',
        'linkedin',
        'googleplus',
        'wikipedia',
        'youtube',
        'podcast',
        'rss',
    
    ];



 

}
