<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class newseventsmanagment extends Authenticatable 
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'mh_news';
 
    
    protected $fillable = [
        'id',
        'title',
        'description',
        'entry_by',
        'modified_date',
        'modified_by',
        'entry_date',
        'status',

  
    ];



 

}
