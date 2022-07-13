<?php

namespace App\Http\Controllers\frontend\newsubmissions;

use App\Http\Controllers\Controller;
use App\Models\mh_companies;
use App\Models\Mh_Countries;
use App\Models\mh_esubmit_profiles;
use App\Models\mh_journals;
use App\Models\Mh_Sms_Authorchecklist;
use App\Models\Mh_Sms_Authors_Institutions;
use App\Models\Mh_Sms_Typetitleabstract;
use App\Models\MhCompanies;
use App\Models\MhJournals;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class AuthorsInstitutionsController extends Controller
{
    public function index($company, $seo)
    {

        // dd(auth()->user());

        $company = mh_companies::where('companySEOURL', $company)->first();
        $journal = mh_journals::where('seo', $seo)->first();
        $countries = Mh_Countries::all();
        $authorinstitution = Mh_Sms_Authors_Institutions::where('orderNumber', session()->get('orderNumber'))->get();
        // dd($authorinstitution);
        //$authors = Mh_Sms_Authors_Institutions::all();

        return view('frontend.newsubmissions.authors-institutions', compact('company', 'journal', 'countries', 'authorinstitution'));
    }


    public function submit_author_institution(Request $request)
    {
        //dd(auth()->user()->id);

        $journalID = request('journalID');
        $companyID = request('companyID');

        $orderNumber = session()->get('orderNumber');




        // Mh_Sms_Authors_Institutions::where('orderNumber', $orderNumber)->delete();


        Mh_Sms_Authors_Institutions::create([
            'userID' =>  auth()->user()->id,
            'authSequence' => $request->authSequence,
            'authTitle' => $request->authTitle,
            'authFirstName' =>  $request->authFirstName,
            'authLastName' => $request->authLastName,
            'authEmailAddress' => $request->authEmailAddress,
            'authAffiliation' => $request->authAffiliation,
            'authCountry' => $request->authCountry,
            'authCorresponding' => $request->authCorresponding,
            'orderNumber'  => $orderNumber,
        ]);


        $company = mh_companies::where('id', $companyID)->first();
        $journal = mh_journals::where('id', $journalID)->first();


        return redirect()->route('author-institution', [$company->companySEOURL, $journal->seo])->with('message', 'Authors created successfully');
    }


    public function search_author_email(Request $request)
    {

        $authEmailAddress = request('authEmailAddress');
        //dd($authEmailAddress);

        $array = array();

        $details = mh_esubmit_profiles::where('primaryEmailAddress', $authEmailAddress)->where('userType', 'Author')->get();
        $counter = count($details);

        if ($counter > 0) {

            $array = array('exist' => true, 'message' => 'author exists', 'data' => $details);
        } else {

            $sreviewer = Mh_Sms_Authors_Institutions::where('recommendingEmail', $authEmailAddress)->get();

            $counter = count($sreviewer);

            if ($counter > 0) {
                $array = array('exist' => true, 'message' => 'author exists', 'data' => $sreviewer);
            } else {
                $array = array('exist' => false,  'message' => 'author available', 'data' => $authEmailAddress);
            }
        }

        return $array;
    }



    public function edit_author_institution($company, $seo, $ordernumber)
    {

        $orderNumber = $ordernumber;
        $company = mh_companies::where('companySEOURL', $company)->first();
        $journal = mh_journals::where('seo', $seo)->first();
        $countries = Mh_Countries::all();
        $authorinstitution = Mh_Sms_Authors_Institutions::where('orderNumber', $ordernumber)->get();



        return view('frontend.newsubmissions.incompletesubmissions.update-authors-institutions', compact('company', 'journal', 'countries', 'authorinstitution', 'orderNumber'));
    }


    public function update_search_email()
    {
        $authEmailAddress = request('authEmailAddress');
        //dd($authEmailAddress);

        $array = array();

        $details = mh_esubmit_profiles::where('primaryEmailAddress', $authEmailAddress)->where('userType', 'Author')->get();
        $counter = count($details);

        if ($counter > 0) {

            $array = array('exist' => true, 'message' => 'author exists', 'data' => $details);
        } else {

            $sreviewer = Mh_Sms_Authors_Institutions::where('recommendingEmail', $authEmailAddress)->get();

            $counter = count($sreviewer);

            if ($counter > 0) {
                $array = array('exist' => true, 'message' => 'author exists', 'data' => $sreviewer);
            } else {
                $array = array('exist' => false,  'message' => 'author available', 'data' => $authEmailAddress);
            }
        }

        return $array;
    }


    public function update_author_institution(Request $request, $ordernumber)
    {

        $journalID = request('journalID');
        $companyID = request('companyID');

        $orderNumber = $ordernumber;

        Mh_Sms_Authors_Institutions::create([
            'userID' =>  auth()->user()->id,
            'authSequence' => $request->authSequence,
            'authTitle' => $request->authTitle,
            'authFirstName' =>  $request->authFirstName,
            'authLastName' => $request->authLastName,
            'authEmailAddress' => $request->authEmailAddress,
            'authAffiliation' => $request->authAffiliation,
            'authCountry' => $request->authCountry,
            'authCorresponding' => $request->authCorresponding,
            'orderNumber'  => $orderNumber,
        ]);


        $company = mh_companies::where('id', $companyID)->first();
        $journal = mh_journals::where('id', $journalID)->first();


        return redirect()->route('edit-author-institution', [$company->companySEOURL, $journal->seo, $orderNumber])->with('message', 'Authors updated successfully');
    }




    public function delete_author($company, $journal, $id)
    {

        $author = Mh_Sms_Authors_Institutions::find($id);

        $author->delete();

        return redirect()->route('author-institution', [$company, $journal])->with('message', 'Author Deleted Successfully!');
    }


    public function destroy_author($company, $journal, $id)
    {

        $author = Mh_Sms_Authors_Institutions::find($id);

        $author->delete();

        return redirect()->route('author-institution', [$company, $journal])->with('message', 'Author Deleted Successfully!');
    }
}
