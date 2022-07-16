<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mh_sms_selectedrevlist extends Model
{
    use HasFactory;


    protected $table = 'mh_sms_selectedrevlist';

    protected $fillable = [
        'id',
        'editorType',
        'editorID',
        'reviewerID',
        'reviewerType',
        'orderNumber',
        'deadline_date',
        'status',
        'invitation',
        'invitationDescription',
        'invitationDate',
        'reviewer_stutus',
        'reviewer_date',
        'want_to_review',
        'readStatus',
        'extendStatus',
        'extendDescription',
        'scoreSubmit',


    ];

}
