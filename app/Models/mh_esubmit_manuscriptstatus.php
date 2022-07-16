<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mh_esubmit_manuscriptstatus extends Model
{
    use HasFactory;

    protected $table = 'mh_esubmit_manuscriptstatus';

    protected $fillable = [
        'id',
        'title',
        
    ];
}
