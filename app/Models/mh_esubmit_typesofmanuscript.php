<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class mh_esubmit_typesofmanuscript extends Authenticatable 
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'mh_esubmit_typesofmanuscript';
 
    protected $fillable = [
        'id',
        'journalID', 
        'title',
        'status',


   
    ];


}
