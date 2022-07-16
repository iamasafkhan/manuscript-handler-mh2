<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mh_Sms_Authorchecklist extends Model
{
    use HasFactory;

    protected $table = 'mh_sms_authorchecklist';


    protected $fillable = [
        'id',
        'userID',
        'journalID',
        'agree',
        'conflictOfinterest',
        'clarifyStatement',
        'statusDated',
        'submitStatus',
        'manuscriptStatus',
        'reviewer_accept',
        'revision_process',
        'orderNumber',
        'figuresTables',
        'resubmit',
        'pdf_accept',
        'finalpdfgenerated',
        'financialSupport',
        'transferDate',
        'withAssociateEditor',
      
    ];



    public function count_manuscripts($journalID, $submitStatus, $manuscriptStatus)
    {
        $need_author_attentions = Mh_Sms_Authorchecklist::where('journalID', $journalID)
        ->where('submitStatus', $submitStatus)
        ->where('manuscriptStatus', $manuscriptStatus)->get();
        //dd($manuscript_submitted);
        $count = count($need_author_attentions);
        return $count;
    }
}
