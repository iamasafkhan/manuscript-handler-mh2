<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mh_areas_of_interest_selected extends Model
{
    use HasFactory;

    protected $table = 'mh_areas_of_interest_selected';

    protected $fillable = [
        'id',
        'standingID',
        'classifyID',
        'parentID',
        'profileID',
    ];
}
