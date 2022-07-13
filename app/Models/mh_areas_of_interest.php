<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; 

class mh_areas_of_interest extends Authenticatable 
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'mh_areas_of_interest';

    protected $fillable = [
        'id',
        'parentID',
        'journalID',
        'title',
        'seo_url',
        'status',


  
    ];



    public function subcategory(){
        return $this->hasMany('App\Models\mh_areas_of_interest', 'parentID');
    }

 

}
