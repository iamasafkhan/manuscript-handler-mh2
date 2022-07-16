<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class mh_journals_checklist_text extends Authenticatable 
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'mh_journals_checklist_text';
 
    protected $fillable = [
        'id',
        'journalID', 
        'description',
      


   
    ];


}
