<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class mh_journalpagecontent extends Authenticatable 
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'mh_journalpagecontent';

    
    protected $fillable = [
        'id',
        'journalID',
        'page_tab',
        'page_title',
        'page_heading',
        'page_subheading',
        'page_url',
        'page_image',
        'meta_keyword',
        'meta_phrase',
        'meta_description',
        'page_thumbimage',
        'page_type',
        'entry_by',
        'entry_date',
        'modified_date',
        'modified_by',
        'link_id',
        'type',


   
    ];


}
