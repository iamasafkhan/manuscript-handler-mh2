<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class mh_pagecontent extends Authenticatable 
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'mh_pagecontent';

    protected $fillable = [
        'id',
        'page_title',
        'page_heading',
        'page_subheading',
        'meta_keyword',
        'meta_phrase',
        'page_url',
        'page_image',
        'journalDisplayStatus',
        'page_thumbimage',
        'page_type',
        'status',
        'meta_description',
   
  
    ];



 

}
