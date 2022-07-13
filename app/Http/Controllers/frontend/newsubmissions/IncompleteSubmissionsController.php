<?php

namespace App\Http\Controllers\frontend\newsubmissions;

use App\Http\Controllers\Controller;
use App\Models\mh_companies;
use App\Models\mh_journals;
use App\Models\Mh_Sms_Authorchecklist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IncompleteSubmissionsController extends Controller
{
     public function index($company, $seo)
     {
        $company = mh_companies::where('companySEOURL', $company)->first();
         $seo = mh_journals::where('seo', $seo)->first();

        $incomplete = DB::table('mh_sms_authorchecklist')
            ->join('mh_journals', 'mh_sms_authorchecklist.journalID', '=', 'mh_journals.id')
            ->leftJoin('mh_sms_typetitleabstract', 'mh_sms_authorchecklist.orderNumber', '=', 'mh_sms_typetitleabstract.orderNumber')
            ->leftJoin('mh_sms_authors_institutions', 'mh_sms_authorchecklist.orderNumber', '=', 'mh_sms_authors_institutions.orderNumber')
            ->select('mh_sms_authorchecklist.*', 'mh_journals.name as journalName', 'mh_sms_typetitleabstract.manuscriptTitle as ManuscriptTitle',  DB::raw('CONCAT(authTitle, " ",  authFirstName, " ", authLastName) AS auth_FullName') )
            ->where('mh_sms_authorchecklist.submitStatus', '0')
            // ->where('mh_sms_authors_institutions.authCorresponding', '1')
            //->groupBy('mh_sms_authorchecklist.orderNumber')
            ->get();

         // dd($incomplete);
        return view('frontend.newsubmissions.incompletesubmissions.incomplete-submissions', compact('company', 'seo', 'incomplete'));
     }

     public function authors_approval($company, $seo)
     {
       $company = mh_companies::where('companySEOURL', $company)->first();
       $seo = mh_journals::where('seo', $seo)->first();

       $incomplete = DB::table('mh_sms_authorchecklist')
       ->join('mh_journals', 'mh_sms_authorchecklist.journalID', '=', 'mh_journals.id')
       ->leftJoin('mh_sms_typetitleabstract', 'mh_sms_authorchecklist.orderNumber', '=', 'mh_sms_typetitleabstract.orderNumber')
       ->leftJoin('mh_sms_authors_institutions', 'mh_sms_authorchecklist.orderNumber', '=', 'mh_sms_authors_institutions.orderNumber')
       ->select('mh_sms_authorchecklist.*', 'mh_journals.name as journalName', 'mh_sms_typetitleabstract.manuscriptTitle as ManuscriptTitle',  DB::raw('CONCAT(authTitle, " ",  authFirstName, " ", authLastName) AS auth_FullName') )
       ->where('mh_sms_authorchecklist.submitStatus', '0')
       ->where('mh_sms_authorchecklist.pdf_accept', '1')
        // ->where('mh_sms_authors_institutions.authCorresponding', '1')
       //->groupBy('mh_sms_authorchecklist.orderNumber')
       ->get();


       return view('frontend.newsubmissions.authorsapproval.submission-authors-approval', compact('company', 'seo', 'incomplete'));
     }
}
