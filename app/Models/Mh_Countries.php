<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mh_Countries extends Model
{
    use HasFactory;

    protected $table = 'mh_countries';


    protected $fillable = [
        'id',
        'iso1_code',
        'name_caps',
        'name',
        'iso3_cod',
        'num_code',
        'shipping_rate',
        'shiping_rate_otherkg',
        'ccode',
        'status',
    
    ];
}
