<?php

namespace App\Http\Controllers\Frontend\Editor;

use App\Http\Controllers\Controller;
use App\Models\mh_companies;
use App\Models\mh_esubmit_manuscriptstatus;
use App\Models\mh_journals;
use App\Models\Mh_Sms_Authorchecklist;
use App\Models\Mh_Sms_Authors_Institutions;
use App\Models\Mh_Sms_Filesupload;
use App\Models\Mh_Sms_Keywords;
use App\Models\mh_sms_selectedrevlist;
use App\Models\mh_sms_suggestedrev;
use App\Models\Mh_Sms_Typetitleabstract;
use App\Models\mh_sms_unsuggestedrev;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditorController extends Controller
{
    

    public function index($company, $seo)
    {

        $company = mh_companies::where('companySEOURL', $company)->first();
        $journal = mh_journals::where('seo', $seo)->first();
      

        return view('frontend.editor.home', compact('company', 'journal'));
    }

public function awaiting_reviewer_selection($company, $journal)
{

    $company = mh_companies::where('companySEOURL', $company)->first();
    $journal = mh_journals::where('seo', $journal)->first();
    
    $waitingReviewers = DB::table('mh_sms_authorchecklist')
    ->join('mh_journals', 'mh_sms_authorchecklist.journalID', '=', 'mh_journals.id')
    ->join('mh_sms_typetitleabstract', 'mh_sms_authorchecklist.orderNumber', '=', 'mh_sms_typetitleabstract.orderNumber')
    ->join('mh_sms_authors_institutions', 'mh_sms_authorchecklist.orderNumber', '=', 'mh_sms_authors_institutions.orderNumber')
    ->select('mh_sms_authorchecklist.*', 'mh_journals.name as journalName', 'mh_sms_typetitleabstract.manuscriptTitle as ManuscriptTitle', 'mh_sms_authors_institutions.authFirstName as FirstName')
    ->where('mh_sms_authorchecklist.submitStatus', '1')
    ->where('mh_sms_authorchecklist.manuscriptStatus', '6')
    ->get();

    return view('frontend.editor.awaitingReviewerSelection', compact('company', 'journal', 'waitingReviewers'));
}

public function awaiting_reviewer_selection_details($company, $journal, $orderNumber)
{

    $company = mh_companies::where('companySEOURL', $company)->first();
    $journal = mh_journals::where('seo', $journal)->first();
    $file = Mh_Sms_Filesupload::where('orderNumber', $orderNumber)->first();
    $preferreds = mh_sms_suggestedrev::where('orderNumber', $orderNumber)->get();
    $nonpreferreds = mh_sms_unsuggestedrev::where('orderNumber', $orderNumber)->get();



    return view('frontend.editor.awaitingReviewerSelection-details', compact('company', 'journal', 'orderNumber', 'file', 'preferreds', 'nonpreferreds'));

}

public function add_reviewers_selected_list(Request $request, $orderNumber)
{

    $journalID = request('journalID');
    $companyID = request('companyID');
    //$sugg = request('sugg');
    //$nonSugg = request('nonSugg');

    $company = mh_companies::where('id', $companyID)->first();
    $journal = mh_journals::where('id', $journalID)->first();

    $reviewers = $request->addReviewers;
    //dd($reviewers);
    
    $editorType = auth()->user()->userType;
    $editorID = auth()->user()->id;

    foreach ($reviewers as $key => $reviewer) {

        $rev_arr = explode(",",$reviewer);
        $reviewerID = $rev_arr[0];
        $reviewerType = $rev_arr[1];

        mh_sms_selectedrevlist::create([
            'editorType'	=> $editorType,
            'editorID'		=> $editorID,
            'reviewerID'	=> $reviewerID,
            'reviewerType'	=> $reviewerType,
            'orderNumber' => $orderNumber
        ]);
   
    }

    return redirect()->route('awaiting-reviewer-selection-details', [$company->companySEOURL, $journal->seo, $orderNumber])->with('message', 'yes');
}

}
