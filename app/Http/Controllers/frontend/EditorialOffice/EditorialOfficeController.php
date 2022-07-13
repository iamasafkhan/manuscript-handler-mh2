<?php

namespace App\Http\Controllers\frontend\EditorialOffice;

use App\Http\Controllers\Controller;
use App\Models\mh_companies;
use App\Models\mh_esubmit_manuscriptstatus;
use App\Models\mh_journals;
use App\Models\Mh_Sms_Authorchecklist;
use App\Models\Mh_Sms_Authors_Institutions;
use App\Models\Mh_Sms_Filesupload;
use App\Models\Mh_Sms_Keywords;
use App\Models\mh_sms_suggestedrev;
use App\Models\Mh_Sms_Typetitleabstract;
use App\Models\mh_sms_unsuggestedrev;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditorialOfficeController extends Controller
{


    public function __construct(Mh_Sms_Authorchecklist $Mh_Sms_Authorchecklist)
    {
        $this->Mh_Sms_Authorchecklist = $Mh_Sms_Authorchecklist;
    }


    public function counters($journalID)
    {
        //submitted manuscripts counter
        $count_manuscript_submitted = $this->Mh_Sms_Authorchecklist->count_manuscripts($journalID, '1', '1');


        //author needs attention counter
        $count_need_author_attentions = $this->Mh_Sms_Authorchecklist->count_manuscripts($journalID, '1', '2');

        // Associate Editor
        $count_associate_editor = $this->Mh_Sms_Authorchecklist->count_manuscripts($journalID, '1', '16');


        // decision process
        $count_decision_process = $this->Mh_Sms_Authorchecklist->count_manuscripts($journalID, '1', '6');


        // Accepted
        $count_accepted = $this->Mh_Sms_Authorchecklist->count_manuscripts($journalID, '1', '7');


        //Accepted with Minor Revisions

        $count_accepted_minor_revisions = $this->Mh_Sms_Authorchecklist->count_manuscripts($journalID, '1', '9');


        //Withdrawn Manuscripts

        $count_withdrawn_manuscripts = $this->Mh_Sms_Authorchecklist->count_manuscripts($journalID, '1', '11');


        //Published
        $count_published = $this->Mh_Sms_Authorchecklist->count_manuscripts($journalID, '1', '14');

        //Total Manuscript In Process
        $count_TotalManuscriptProcess = $this->Mh_Sms_Authorchecklist->count_manuscripts($journalID, '1', '15');


        //Initial Quality Control
        $count_initialqualitycontrol = $this->Mh_Sms_Authorchecklist->count_manuscripts($journalID, '1', '15');

        //With Editor

        $count_witheditor = $this->Mh_Sms_Authorchecklist->count_manuscripts($journalID, '1', '3');


        //Under Review
        $count_underreview = $this->Mh_Sms_Authorchecklist->count_manuscripts($journalID, '1', '4');


        //Revision Required
        $count_revisionrequired = $this->Mh_Sms_Authorchecklist->count_manuscripts($journalID, '1', '10');

        //Accepted with Major Revision
        $count_acceptedMajorRevision = $this->Mh_Sms_Authorchecklist->count_manuscripts($journalID, '1', '8');


        //Rejected

        $count_rejectd = $this->Mh_Sms_Authorchecklist->count_manuscripts($journalID, '1', '12');

        //Sent to Production
        $count_sentproduction = $this->Mh_Sms_Authorchecklist->count_manuscripts($journalID, '1', '13');


        //Submissions Neding Author's Approval
        $count_submissionsapproval = $this->Mh_Sms_Authorchecklist->count_manuscripts($journalID, '1', '15');


        //Revisions needing Author's Approval
        $count_revisionsapproval = $this->Mh_Sms_Authorchecklist->count_manuscripts($journalID, '1', '15');


        return array(

            'count_manuscript_submitted' => $count_manuscript_submitted,

            'count_need_author_attentions' => $count_need_author_attentions,

            'count_associate_editor' => $count_associate_editor,

            'count_decision_process' => $count_decision_process,

            'count_accepted' => $count_accepted,

            'count_accepted_minor_revisions' => $count_accepted_minor_revisions,

            'count_withdrawn_manuscripts' => $count_withdrawn_manuscripts,

            'count_published' => $count_published,

            'count_TotalManuscriptProcess' => $count_TotalManuscriptProcess,

            'count_initialqualitycontrol' => $count_initialqualitycontrol,

            'count_witheditor' => $count_witheditor,

            'count_underreview' => $count_underreview,

            'count_revisionrequired' => $count_revisionrequired,

            'count_acceptedMajorRevision' => $count_acceptedMajorRevision,

            'count_rejectd' => $count_rejectd,

            'count_sentproduction' => $count_sentproduction,

            'count_submissionsapproval' => $count_submissionsapproval,

            'count_revisionsapproval' => $count_revisionsapproval,


        );
    }

    public function index($company, $seo)
    {


        $company = mh_companies::where('companySEOURL', $company)->first();
        $seo = mh_journals::where('seo', $seo)->first();

        $journalID = $seo->id;


        $counters = $this->counters($journalID);

        //dd($counters);

        return view('frontend.editorialoffice.home', compact('counters', 'company', 'seo'));
    }





    public function manuscripts_all($company, $seo)
    {


        $company = mh_companies::where('companySEOURL', $company)->first();
        $seo = mh_journals::where('seo', $seo)->first();
        $journalID = $seo->id;
        $counters = $this->counters($journalID);


        //->where('authCorresponding', 'on')

        $authorchecklist = DB::table('mh_sms_authorchecklist')
            ->join('mh_journals', 'mh_sms_authorchecklist.journalID', '=', 'mh_journals.id')
            ->join('mh_sms_typetitleabstract', 'mh_sms_authorchecklist.orderNumber', '=', 'mh_sms_typetitleabstract.orderNumber')
            ->join('mh_sms_authors_institutions', 'mh_sms_authorchecklist.orderNumber', '=', 'mh_sms_authors_institutions.orderNumber')
            ->select('mh_sms_authorchecklist.*', 'mh_journals.name as journalName', 'mh_sms_typetitleabstract.manuscriptTitle as ManuscriptTitle', 'mh_sms_authors_institutions.authFirstName as FirstName')
            ->where('mh_sms_authorchecklist.submitStatus', '1')
            ->where('mh_sms_authorchecklist.manuscriptStatus', '1')
            ->get();


           
        return view('frontend.editorialoffice.manuscripts', compact('counters', 'company', 'seo', 'authorchecklist'));
    }


    public function manuscript_details($company, $seo, $orderNumber)
    {
       

        $company = mh_companies::where('companySEOURL', $company)->first();
        $journal = mh_journals::where('seo', $seo)->first();
        //$uploadedFiles = Mh_Sms_Filesupload::where('orderNumber', session()->get('orderNumber'))->get();
        $uploadedFiles = Mh_Sms_Filesupload::where('orderNumber', $orderNumber)
        ->join('mh_esubmit_file_designation', 'mh_esubmit_file_designation.id' , '=', 'mh_sms_filesupload.fileDisignation')
        ->select('mh_sms_filesupload.*', 'mh_esubmit_file_designation.title as fileDesignation')
        ->get();
        $authorInstitutions = Mh_Sms_Authors_Institutions::where('orderNumber', $orderNumber)->orderBy('id', 'ASC')->get();
        $typeTitleAbstract = Mh_Sms_Typetitleabstract::where('orderNumber', $orderNumber)
        ->leftJoin('mh_esubmit_typesofmanuscript', 'mh_esubmit_typesofmanuscript.id', '=', 'mh_sms_typetitleabstract.typeOfManuScript')
        ->leftJoin('mh_areas_of_interest', 'mh_areas_of_interest.id', '=', 'mh_sms_typetitleabstract.areaOfSpecificInterest')
        ->select('mh_sms_typetitleabstract.*', 'mh_esubmit_typesofmanuscript.title as typeOfManuscript', 'mh_areas_of_interest.title as areaOfSpecificInterest')
        ->first();
        $suggestedrevs = mh_sms_suggestedrev::where('orderNumber', $orderNumber)->orderBy('id', 'ASC')->get();
        $unsuggestedrevs = mh_sms_unsuggestedrev::where('orderNumber', $orderNumber)->orderBy('id', 'ASC')->get();
        $author = Mh_Sms_Authorchecklist::where('pdf_accept', '1')->where('orderNumber', $orderNumber)->first();
        $keywords = Mh_Sms_Keywords::where('orderNumber', $orderNumber)->get();
        $manuscriptStatus = mh_esubmit_manuscriptstatus::all();

        //  dd($keywords);
        return view('frontend.editorialoffice.manuscript-details', compact('company', 'journal', 'uploadedFiles', 'authorInstitutions', 'typeTitleAbstract', 'suggestedrevs', 'unsuggestedrevs', 'orderNumber', 'author', 'keywords', 'manuscriptStatus', 'orderNumber'));

    }

  
    public function change_manuscript_status(Request $request)
    {
    
        //dd($request);
        $orderNumber = request('orderNumber');
        $journalID = request('journalID');
        $companyID = request('companyID');
        $manuscriptStatus = request('statusselector');

        $changeStatus = Mh_Sms_Authorchecklist::where('journalID',  $journalID)->where('orderNumber', $orderNumber)->first();

        $changeStatus->update([ 
            'manuscriptStatus' => $manuscriptStatus,
        ]);
        //return response()->json()->with('success', 'Status Updated Successfully!');
        //return back()->with('success', 'Status Updated Successfully!');

        return response()->json([
            'success' => 'Status Updated Successfully!'
        ]);
    }

    public function need_author_attentions_all($company, $seo)
    {


        $company = mh_companies::where('companySEOURL', $company)->first();
        $seo = mh_journals::where('seo', $seo)->first();
        $journalID = $seo->id;
        $counters = $this->counters($journalID);

        $authorchecklist = DB::table('mh_sms_authorchecklist')
            ->join('mh_journals', 'mh_sms_authorchecklist.journalID', '=', 'mh_journals.id')
            ->join('mh_sms_typetitleabstract', 'mh_sms_authorchecklist.orderNumber', '=', 'mh_sms_typetitleabstract.orderNumber')
            ->join('mh_sms_authors_institutions', 'mh_sms_authorchecklist.orderNumber', '=', 'mh_sms_authors_institutions.orderNumber')->where('authCorresponding', 'on')
            ->select('mh_sms_authorchecklist.*', 'mh_journals.name as journalName', 'mh_sms_typetitleabstract.manuscriptTitle as ManuscriptTitle', 'mh_sms_authors_institutions.authFirstName as FirstName')
            ->where('mh_sms_authorchecklist.submitStatus', '1')
            ->where('mh_sms_authorchecklist.manuscriptStatus', '2')
            ->get();


        return view('frontend.editorialoffice.needauthorattentions', compact('counters', 'company', 'seo', 'authorchecklist'));
    }



    public function with_associate_editor_all($company, $seo)
    {

        $company = mh_companies::where('companySEOURL', $company)->first();
        $seo = mh_journals::where('seo', $seo)->first();
        $journalID = $seo->id;
        $counters = $this->counters($journalID);

        $authorchecklist = DB::table('mh_sms_authorchecklist')
            ->join('mh_journals', 'mh_sms_authorchecklist.journalID', '=', 'mh_journals.id')
            ->join('mh_sms_typetitleabstract', 'mh_sms_authorchecklist.orderNumber', '=', 'mh_sms_typetitleabstract.orderNumber')
            ->join('mh_sms_authors_institutions', 'mh_sms_authorchecklist.orderNumber', '=', 'mh_sms_authors_institutions.orderNumber')->where('authCorresponding', 'on')
            ->select('mh_sms_authorchecklist.*', 'mh_journals.name as journalName', 'mh_sms_typetitleabstract.manuscriptTitle as ManuscriptTitle', 'mh_sms_authors_institutions.authFirstName as FirstName')
            ->where('mh_sms_authorchecklist.submitStatus', '1')
            ->where('mh_sms_authorchecklist.manuscriptStatus', '16')
            ->get();


        return view('frontend.editorialoffice.needauthorattentions', compact('counters', 'company', 'seo', 'authorchecklist'));
    }



    public function decision_process_all($company, $seo)
    {

        $company = mh_companies::where('companySEOURL', $company)->first();
        $seo = mh_journals::where('seo', $seo)->first();
        $journalID = $seo->id;
        $counters = $this->counters($journalID);

        $authorchecklist = DB::table('mh_sms_authorchecklist')
            ->join('mh_journals', 'mh_sms_authorchecklist.journalID', '=', 'mh_journals.id')
            ->join('mh_sms_typetitleabstract', 'mh_sms_authorchecklist.orderNumber', '=', 'mh_sms_typetitleabstract.orderNumber')
            ->join('mh_sms_authors_institutions', 'mh_sms_authorchecklist.orderNumber', '=', 'mh_sms_authors_institutions.orderNumber')->where('authCorresponding', 'on')
            ->select('mh_sms_authorchecklist.*', 'mh_journals.name as journalName', 'mh_sms_typetitleabstract.manuscriptTitle as ManuscriptTitle', 'mh_sms_authors_institutions.authFirstName as FirstName')
            ->where('mh_sms_authorchecklist.submitStatus', '1')
            ->where('mh_sms_authorchecklist.manuscriptStatus', '6')
            ->get();


        return view('frontend.editorialoffice.decisionprocess', compact('counters', 'company', 'seo', 'authorchecklist'));
    }


    public function accepted_all($company, $seo)
    {
        $company = mh_companies::where('companySEOURL', $company)->first();
        $seo = mh_journals::where('seo', $seo)->first();
        $journalID = $seo->id;
        $counters = $this->counters($journalID);

        

        $authorchecklist = DB::table('mh_sms_authorchecklist')
            ->join('mh_journals', 'mh_sms_authorchecklist.journalID', '=', 'mh_journals.id')
            ->join('mh_sms_typetitleabstract', 'mh_sms_authorchecklist.orderNumber', '=', 'mh_sms_typetitleabstract.orderNumber')
            ->join('mh_sms_authors_institutions', 'mh_sms_authorchecklist.orderNumber', '=', 'mh_sms_authors_institutions.orderNumber')->where('authCorresponding', 'on')
            ->select('mh_sms_authorchecklist.*', 'mh_journals.name as journalName', 'mh_sms_typetitleabstract.manuscriptTitle as ManuscriptTitle', 'mh_sms_authors_institutions.authFirstName as FirstName')
            ->where('mh_sms_authorchecklist.submitStatus', '1')
            ->where('mh_sms_authorchecklist.manuscriptStatus', '7')
            ->get();


        return view('frontend.editorialoffice.accepted', compact('counters', 'company', 'seo', 'authorchecklist'));
    }



    public function accepted_with_minor_revision_all($company, $seo)
    {
        $company = mh_companies::where('companySEOURL', $company)->first();
        $seo = mh_journals::where('seo', $seo)->first();
        $journalID = $seo->id;
        $counters = $this->counters($journalID);

        $authorchecklist = DB::table('mh_sms_authorchecklist')
            ->join('mh_journals', 'mh_sms_authorchecklist.journalID', '=', 'mh_journals.id')
            ->join('mh_sms_typetitleabstract', 'mh_sms_authorchecklist.orderNumber', '=', 'mh_sms_typetitleabstract.orderNumber')
            ->join('mh_sms_authors_institutions', 'mh_sms_authorchecklist.orderNumber', '=', 'mh_sms_authors_institutions.orderNumber')->where('authCorresponding', 'on')
            ->select('mh_sms_authorchecklist.*', 'mh_journals.name as journalName', 'mh_sms_typetitleabstract.manuscriptTitle as ManuscriptTitle', 'mh_sms_authors_institutions.authFirstName as FirstName')
            ->where('mh_sms_authorchecklist.submitStatus', '1')
            ->where('mh_sms_authorchecklist.manuscriptStatus', '9')
            ->get();


        return view('frontend.editorialoffice.AcceptedMinorRevisions', compact('counters', 'company', 'seo', 'authorchecklist'));
   
    }




    public function withdrawn_manuscripts_all($company, $seo)
    {
        $company = mh_companies::where('companySEOURL', $company)->first();
        $seo = mh_journals::where('seo', $seo)->first();
        $journalID = $seo->id;
        $counters = $this->counters($journalID);

        $authorchecklist = DB::table('mh_sms_authorchecklist')
            ->join('mh_journals', 'mh_sms_authorchecklist.journalID', '=', 'mh_journals.id')
            ->join('mh_sms_typetitleabstract', 'mh_sms_authorchecklist.orderNumber', '=', 'mh_sms_typetitleabstract.orderNumber')
            ->join('mh_sms_authors_institutions', 'mh_sms_authorchecklist.orderNumber', '=', 'mh_sms_authors_institutions.orderNumber')->where('authCorresponding', 'on')
            ->select('mh_sms_authorchecklist.*', 'mh_journals.name as journalName', 'mh_sms_typetitleabstract.manuscriptTitle as ManuscriptTitle', 'mh_sms_authors_institutions.authFirstName as FirstName')
            ->where('mh_sms_authorchecklist.submitStatus', '1')
            ->where('mh_sms_authorchecklist.manuscriptStatus', '11')
            ->get();


        return view('frontend.editorialoffice.withdrawnmanuscripts', compact('counters', 'company', 'seo', 'authorchecklist'));
   
    }


    public function published_manuscripts_all($company, $seo)
    {
        $company = mh_companies::where('companySEOURL', $company)->first();
        $seo = mh_journals::where('seo', $seo)->first();
        $journalID = $seo->id;
        $counters = $this->counters($journalID);

        $authorchecklist = DB::table('mh_sms_authorchecklist')
            ->join('mh_journals', 'mh_sms_authorchecklist.journalID', '=', 'mh_journals.id')
            ->join('mh_sms_typetitleabstract', 'mh_sms_authorchecklist.orderNumber', '=', 'mh_sms_typetitleabstract.orderNumber')
            ->join('mh_sms_authors_institutions', 'mh_sms_authorchecklist.orderNumber', '=', 'mh_sms_authors_institutions.orderNumber')->where('authCorresponding', 'on')
            ->select('mh_sms_authorchecklist.*', 'mh_journals.name as journalName', 'mh_sms_typetitleabstract.manuscriptTitle as ManuscriptTitle', 'mh_sms_authors_institutions.authFirstName as FirstName')
            ->where('mh_sms_authorchecklist.submitStatus', '1')
            ->where('mh_sms_authorchecklist.manuscriptStatus', '14')
            ->get();


        return view('frontend.editorialoffice.published', compact('counters', 'company', 'seo', 'authorchecklist'));
   
    }


    public function total_manuscripts_progress_all($company, $seo)
    {
        $company = mh_companies::where('companySEOURL', $company)->first();
        $seo = mh_journals::where('seo', $seo)->first();
        $journalID = $seo->id;
        $counters = $this->counters($journalID);

        $authorchecklist = DB::table('mh_sms_authorchecklist')
            ->join('mh_journals', 'mh_sms_authorchecklist.journalID', '=', 'mh_journals.id')
            ->join('mh_sms_typetitleabstract', 'mh_sms_authorchecklist.orderNumber', '=', 'mh_sms_typetitleabstract.orderNumber')
            ->join('mh_sms_authors_institutions', 'mh_sms_authorchecklist.orderNumber', '=', 'mh_sms_authors_institutions.orderNumber')->where('authCorresponding', 'on')
            ->select('mh_sms_authorchecklist.*', 'mh_journals.name as journalName', 'mh_sms_typetitleabstract.manuscriptTitle as ManuscriptTitle', 'mh_sms_authors_institutions.authFirstName as FirstName')
            ->where('mh_sms_authorchecklist.submitStatus', '1')
            ->where('mh_sms_authorchecklist.manuscriptStatus', '15')
            ->get();


        return view('frontend.editorialoffice.TotalManuscriptProcess', compact('counters', 'company', 'seo', 'authorchecklist'));
   
    }


    public function initial_quality_control_all($company, $seo)
    {
        $company = mh_companies::where('companySEOURL', $company)->first();
        $seo = mh_journals::where('seo', $seo)->first();
        $journalID = $seo->id;
        $counters = $this->counters($journalID);

        $authorchecklist = DB::table('mh_sms_authorchecklist')
            ->join('mh_journals', 'mh_sms_authorchecklist.journalID', '=', 'mh_journals.id')
            ->join('mh_sms_typetitleabstract', 'mh_sms_authorchecklist.orderNumber', '=', 'mh_sms_typetitleabstract.orderNumber')
            ->join('mh_sms_authors_institutions', 'mh_sms_authorchecklist.orderNumber', '=', 'mh_sms_authors_institutions.orderNumber')->where('authCorresponding', 'on')
            ->select('mh_sms_authorchecklist.*', 'mh_journals.name as journalName', 'mh_sms_typetitleabstract.manuscriptTitle as ManuscriptTitle', 'mh_sms_authors_institutions.authFirstName as FirstName')
            ->where('mh_sms_authorchecklist.submitStatus', '1')
            ->where('mh_sms_authorchecklist.manuscriptStatus', '15')
            ->get();


        return view('frontend.editorialoffice.initialqualitycontrol', compact('counters', 'company', 'seo', 'authorchecklist'));
   
    }



    public function with_editor_all($company, $seo)
    {
        $company = mh_companies::where('companySEOURL', $company)->first();
        $seo = mh_journals::where('seo', $seo)->first();
        $journalID = $seo->id;
        $counters = $this->counters($journalID);

        $authorchecklist = DB::table('mh_sms_authorchecklist')
            ->join('mh_journals', 'mh_sms_authorchecklist.journalID', '=', 'mh_journals.id')
            ->join('mh_sms_typetitleabstract', 'mh_sms_authorchecklist.orderNumber', '=', 'mh_sms_typetitleabstract.orderNumber')
            ->join('mh_sms_authors_institutions', 'mh_sms_authorchecklist.orderNumber', '=', 'mh_sms_authors_institutions.orderNumber')->where('authCorresponding', 'on')
            ->select('mh_sms_authorchecklist.*', 'mh_journals.name as journalName', 'mh_sms_typetitleabstract.manuscriptTitle as ManuscriptTitle', 'mh_sms_authors_institutions.authFirstName as FirstName')
            ->where('mh_sms_authorchecklist.submitStatus', '1')
            ->where('mh_sms_authorchecklist.manuscriptStatus', '3')
            ->get();


        return view('frontend.editorialoffice.witheditor', compact('counters', 'company', 'seo', 'authorchecklist'));
   
    }


    public function under_review_all($company, $seo)
    {
        $company = mh_companies::where('companySEOURL', $company)->first();
        $seo = mh_journals::where('seo', $seo)->first();
        $journalID = $seo->id;
        $counters = $this->counters($journalID);

        $authorchecklist = DB::table('mh_sms_authorchecklist')
            ->join('mh_journals', 'mh_sms_authorchecklist.journalID', '=', 'mh_journals.id')
            ->join('mh_sms_typetitleabstract', 'mh_sms_authorchecklist.orderNumber', '=', 'mh_sms_typetitleabstract.orderNumber')
            ->join('mh_sms_authors_institutions', 'mh_sms_authorchecklist.orderNumber', '=', 'mh_sms_authors_institutions.orderNumber')->where('authCorresponding', 'on')
            ->select('mh_sms_authorchecklist.*', 'mh_journals.name as journalName', 'mh_sms_typetitleabstract.manuscriptTitle as ManuscriptTitle', 'mh_sms_authors_institutions.authFirstName as FirstName')
            ->where('mh_sms_authorchecklist.submitStatus', '1')
            ->where('mh_sms_authorchecklist.manuscriptStatus', '4')
            ->get();


        return view('frontend.editorialoffice.underreview', compact('counters', 'company', 'seo', 'authorchecklist'));
   
    }


    public function revision_required_all($company, $seo)
    {
        $company = mh_companies::where('companySEOURL', $company)->first();
        $seo = mh_journals::where('seo', $seo)->first();
        $journalID = $seo->id;
        $counters = $this->counters($journalID);

        $authorchecklist = DB::table('mh_sms_authorchecklist')
            ->join('mh_journals', 'mh_sms_authorchecklist.journalID', '=', 'mh_journals.id')
            ->join('mh_sms_typetitleabstract', 'mh_sms_authorchecklist.orderNumber', '=', 'mh_sms_typetitleabstract.orderNumber')
            ->join('mh_sms_authors_institutions', 'mh_sms_authorchecklist.orderNumber', '=', 'mh_sms_authors_institutions.orderNumber')->where('authCorresponding', 'on')
            ->select('mh_sms_authorchecklist.*', 'mh_journals.name as journalName', 'mh_sms_typetitleabstract.manuscriptTitle as ManuscriptTitle', 'mh_sms_authors_institutions.authFirstName as FirstName')
            ->where('mh_sms_authorchecklist.submitStatus', '1')
            ->where('mh_sms_authorchecklist.manuscriptStatus', '10')
            ->get();


        return view('frontend.editorialoffice.revisionrequired', compact('counters', 'company', 'seo', 'authorchecklist'));
   
    }



    public function accepted_with_major_revision_all($company, $seo)
    {
        $company = mh_companies::where('companySEOURL', $company)->first();
        $seo = mh_journals::where('seo', $seo)->first();
        $journalID = $seo->id;
        $counters = $this->counters($journalID);

        $authorchecklist = DB::table('mh_sms_authorchecklist')
            ->join('mh_journals', 'mh_sms_authorchecklist.journalID', '=', 'mh_journals.id')
            ->join('mh_sms_typetitleabstract', 'mh_sms_authorchecklist.orderNumber', '=', 'mh_sms_typetitleabstract.orderNumber')
            ->join('mh_sms_authors_institutions', 'mh_sms_authorchecklist.orderNumber', '=', 'mh_sms_authors_institutions.orderNumber')->where('authCorresponding', 'on')
            ->select('mh_sms_authorchecklist.*', 'mh_journals.name as journalName', 'mh_sms_typetitleabstract.manuscriptTitle as ManuscriptTitle', 'mh_sms_authors_institutions.authFirstName as FirstName')
            ->where('mh_sms_authorchecklist.submitStatus', '1')
            ->where('mh_sms_authorchecklist.manuscriptStatus', '8')
            ->get();


        return view('frontend.editorialoffice.AcceptedMajorRevision', compact('counters', 'company', 'seo', 'authorchecklist'));
   
    }



    public function rejected_all($company, $seo)
    {
        $company = mh_companies::where('companySEOURL', $company)->first();
        $seo = mh_journals::where('seo', $seo)->first();
        $journalID = $seo->id;
        $counters = $this->counters($journalID);

        $authorchecklist = DB::table('mh_sms_authorchecklist')
            ->join('mh_journals', 'mh_sms_authorchecklist.journalID', '=', 'mh_journals.id')
            ->join('mh_sms_typetitleabstract', 'mh_sms_authorchecklist.orderNumber', '=', 'mh_sms_typetitleabstract.orderNumber')
            ->join('mh_sms_authors_institutions', 'mh_sms_authorchecklist.orderNumber', '=', 'mh_sms_authors_institutions.orderNumber')->where('authCorresponding', 'on')
            ->select('mh_sms_authorchecklist.*', 'mh_journals.name as journalName', 'mh_sms_typetitleabstract.manuscriptTitle as ManuscriptTitle', 'mh_sms_authors_institutions.authFirstName as FirstName')
            ->where('mh_sms_authorchecklist.submitStatus', '1')
            ->where('mh_sms_authorchecklist.manuscriptStatus', '12')
            ->get();


        return view('frontend.editorialoffice.rejected', compact('counters', 'company', 'seo', 'authorchecklist'));
   
    }


    public function sent_to_production_all($company, $seo)
    {   
             $company = mh_companies::where('companySEOURL', $company)->first();
        $seo = mh_journals::where('seo', $seo)->first();
        $journalID = $seo->id;
        $counters = $this->counters($journalID);

        $authorchecklist = DB::table('mh_sms_authorchecklist')
            ->join('mh_journals', 'mh_sms_authorchecklist.journalID', '=', 'mh_journals.id')
            ->join('mh_sms_typetitleabstract', 'mh_sms_authorchecklist.orderNumber', '=', 'mh_sms_typetitleabstract.orderNumber')
            ->join('mh_sms_authors_institutions', 'mh_sms_authorchecklist.orderNumber', '=', 'mh_sms_authors_institutions.orderNumber')->where('authCorresponding', 'on')
            ->select('mh_sms_authorchecklist.*', 'mh_journals.name as journalName', 'mh_sms_typetitleabstract.manuscriptTitle as ManuscriptTitle', 'mh_sms_authors_institutions.authFirstName as FirstName')
            ->where('mh_sms_authorchecklist.submitStatus', '1')
            ->where('mh_sms_authorchecklist.manuscriptStatus', '13')
            ->get();


        return view('frontend.editorialoffice.sentproduction', compact('counters', 'company', 'seo', 'authorchecklist'));
   
    }



    public function submissions_needing_authors_approval_all($company, $seo)
    {
        $company = mh_companies::where('companySEOURL', $company)->first();
        $seo = mh_journals::where('seo', $seo)->first();
        $journalID = $seo->id;
        $counters = $this->counters($journalID);

        $authorchecklist = DB::table('mh_sms_authorchecklist')
            ->join('mh_journals', 'mh_sms_authorchecklist.journalID', '=', 'mh_journals.id')
            ->join('mh_sms_typetitleabstract', 'mh_sms_authorchecklist.orderNumber', '=', 'mh_sms_typetitleabstract.orderNumber')
            ->join('mh_sms_authors_institutions', 'mh_sms_authorchecklist.orderNumber', '=', 'mh_sms_authors_institutions.orderNumber')->where('authCorresponding', 'on')
            ->select('mh_sms_authorchecklist.*', 'mh_journals.name as journalName', 'mh_sms_typetitleabstract.manuscriptTitle as ManuscriptTitle', 'mh_sms_authors_institutions.authFirstName as FirstName')
            ->where('mh_sms_authorchecklist.submitStatus', '1')
            ->where('mh_sms_authorchecklist.manuscriptStatus', '15')
            ->get();


        return view('frontend.editorialoffice.submissionsapproval', compact('counters', 'company', 'seo', 'authorchecklist'));
   
    }


    public function revisions_needing_authors_approval_all($company, $seo)
    {
        $company = mh_companies::where('companySEOURL', $company)->first();
        $seo = mh_journals::where('seo', $seo)->first();
        $journalID = $seo->id;
        $counters = $this->counters($journalID);

        $authorchecklist = DB::table('mh_sms_authorchecklist')
            ->join('mh_journals', 'mh_sms_authorchecklist.journalID', '=', 'mh_journals.id')
            ->join('mh_sms_typetitleabstract', 'mh_sms_authorchecklist.orderNumber', '=', 'mh_sms_typetitleabstract.orderNumber')
            ->join('mh_sms_authors_institutions', 'mh_sms_authorchecklist.orderNumber', '=', 'mh_sms_authors_institutions.orderNumber')->where('authCorresponding', 'on')
            ->select('mh_sms_authorchecklist.*', 'mh_journals.name as journalName', 'mh_sms_typetitleabstract.manuscriptTitle as ManuscriptTitle', 'mh_sms_authors_institutions.authFirstName as FirstName')
            ->where('mh_sms_authorchecklist.submitStatus', '1')
            ->where('mh_sms_authorchecklist.manuscriptStatus', '15')
            ->get();


        return view('frontend.editorialoffice.revisionsapproval', compact('counters', 'company', 'seo', 'authorchecklist'));
   
    }
}
