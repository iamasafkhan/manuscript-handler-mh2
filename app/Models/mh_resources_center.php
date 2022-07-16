<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class mh_resources_center extends Authenticatable 
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'mh_resources_center';

    protected $fillable = [
        'id',
        'user_type',
        'pdffile',
        'youtubelink',
    ];



 

}
