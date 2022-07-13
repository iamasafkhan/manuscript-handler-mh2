<?php

namespace App\Http\Controllers\frontend\newsubmissions;

use App\Http\Controllers\Controller;
use App\Models\mh_companies;
use App\Models\Mh_Countries;
use App\Models\mh_esubmit_profiles;
use App\Models\mh_journals;
use App\Models\Mh_Sms_Authorchecklist;
use App\Models\mh_sms_suggestedrev;
use App\Models\Mh_Sms_Typetitleabstract;
use App\Models\mh_sms_unsuggestedrev;
use Illuminate\Http\Request;

class SuggestedNonSuggestedRevController extends Controller
{
    public function index(Request $request, $company, $seo)
    {
        $company = mh_companies::where('companySEOURL', $company)->first();
        $journal = mh_journals::where('seo', $seo)->first();

        $countries = Mh_Countries::all();

        $step2 = Mh_Sms_Typetitleabstract::where('orderNumber', $request->session()->get('orderNumber'))->first();
        $sreviewers = mh_sms_suggestedrev::where('orderNumber', session()->get('orderNumber'))->get();
        $unsreviewers = mh_sms_unsuggestedrev::where('orderNumber', session()->get('orderNumber'))->get();




        return view('frontend.newsubmissions.suggested-nonsuggested-reviewers', compact('company', 'journal', 'countries', 'sreviewers', 'unsreviewers'));
    }

    public function submit_reviewers(Request $request)
    {

        //dd($request);

        $journalID = request('journalID');
        $companyID = request('companyID');

        $orderNumber = session()->get('orderNumber');

        mh_sms_suggestedrev::create([
            'userID' =>  auth()->user()->id,
            'recommendingName' => $request->rev_RecommendingName,
            'recommendingEmail' => $request->rev_RecommendingEmail,
            'recommendingExperties' =>  $request->rev_RecommendingExpert,
            'recommendingAffiliation' => $request->rev_RecommendingAffiliation,
            'recommendingCountry' => $request->rev_RecommendingCountryID,
            'orderNumber'  => $orderNumber
        ]);


        $company = mh_companies::where('id', $companyID)->first();
        $journal = mh_journals::where('id', $journalID)->first();

        return redirect()->route('reviewer', [$company->companySEOURL, $journal->seo])->with('message', 'Reviewers added successfully!');
    }

    public function submit_unsreviewers(Request $request)
    {



        $journalID = request('journalID');
        $companyID = request('companyID');

        $orderNumber = session()->get('orderNumber');


        mh_sms_unsuggestedrev::create([
            'userID' =>  auth()->user()->id,
            'recommendingName' =>  $request->rev_NonRecommendingName,
            'recommendingEmail' => $request->rev_NonRecommendingEmail,
            'recommendingExperties' =>  $request->rev_NonRecommendingExpert,
            'recommendingAffiliation' => $request->rev_NonRecommendingAffiliation,
            'recommendingCountry' => $request->rev_NonRecommendingCountryID,
            'orderNumber'  => $orderNumber,


        ]);

        $company = mh_companies::where('id', $companyID)->first();
        $journal = mh_journals::where('id', $journalID)->first();

        return redirect()->route('reviewer', [$company->companySEOURL, $journal->seo])->with('message', 'Reviewers added successfully!');
    }


    public function search_reviewers_email(Request $request)
    {

        $rev_RecommendingEmail = request('rev_RecommendingEmail');

        if ($rev_RecommendingEmail) {

            $array = array();

            $details = mh_esubmit_profiles::where('primaryEmailAddress', $rev_RecommendingEmail)->where('userType', 'Reviewer')->get();
            //dd($details);
            $counter = count($details);

            //dd($counter);
            if($counter > 0)
            {
                $recommendingName = $details->prefixType.' '.$details->firstName.' '.$details->middleName.' '.$details->lastName;
                //dd($recommendingName);
                $profile = array(
                    'userID' => $details->id,
                    'recommendingName' => $recommendingName,
                    'recommendingEmail' => $details->primaryEmailAddress,
                    'recommendingExperties' => $details->recommendingExperties,
                    'recommendingAffiliation' => $details->recommendingAffiliation,
                    'recommendingCountry' => $details->recommendingCountry,
                );

                $array = array('exist' => true,  'message' => 'reviewer exists', 'data' => $profile);
            } else {

                $suggreviewer = mh_sms_suggestedrev::where('recommendingEmail', $rev_RecommendingEmail)->get();
                $counter = count($suggreviewer);
                if ($counter > 0) {
                    $array = array('exist' => true, 'message' => 'reviewer exists', 'data' => $suggreviewer);
                } else {
                    $array = array('exist' => false,  'message' => 'reviewer available', 'data' => $rev_RecommendingEmail);
                }
            }
        } else {

            $rev_NonRecommendingEmail = request('rev_NonRecommendingEmail');
            $array = array();

            $details = mh_esubmit_profiles::where('primaryEmailAddress', $rev_NonRecommendingEmail)->where('userType', 'Reviewer')->get();
            $counter = count($details);

            if ($counter > 0) {

                $array = array('exist' => true, 'message' => 'reviewer exists', 'data' => $details);
            } else {

                $sreviewer = mh_sms_suggestedrev::where('recommendingEmail', $rev_NonRecommendingEmail)->get();

                $counter = count($sreviewer);

                if ($counter > 0) {
                    $array = array('exist' => true, 'message' => 'reviewer exists', 'data' => $sreviewer);
                } else {
                    $array = array('exist' => false,  'message' => 'reviewer available', 'data' => $rev_NonRecommendingEmail);
                }
            }
        }
        return $array;
    }


    public function edit_reviewers($company, $seo, $ordernumber)
    {
        // dd("here");
        $company = mh_companies::where('companySEOURL', $company)->first();
        $journal = mh_journals::where('seo', $seo)->first();
        $orderNumber = Mh_Sms_Authorchecklist::where('orderNumber', $ordernumber)->first();
        $countries = Mh_Countries::all();
        $sreviewers = mh_sms_suggestedrev::where('orderNumber', $ordernumber)->get();
        $unsreviewers = mh_sms_unsuggestedrev::where('orderNumber', $ordernumber)->get();


        return view('frontend.newsubmissions.incompletesubmissions.update-suggested-nonsuggested-reviewers', compact('company', 'journal', 'countries', 'orderNumber', 'sreviewers', 'unsreviewers'));
    }

    public function update_suggested_reviewers(Request $request, $ordernumber)
    {


        $orderNumber = $ordernumber;


        mh_sms_suggestedrev::create([
                'userID' =>  auth()->user()->id,
                'recommendingName' =>  $request->rev_RecommendingName,
                'recommendingEmail' => $request->rev_RecommendingEmail,
                'recommendingExperties' =>  $request->rev_RecommendingExpert,
                'recommendingAffiliation' => $request->rev_RecommendingAffiliation,
                'recommendingCountry' => $request->rev_RecommendingCountryID,
                'orderNumber'  => $orderNumber,
            ]);


        $company = mh_companies::where('id',  request('companyID'))->first();
        $journal = mh_journals::where('id',  request('journalID'))->first();


        return redirect()->route('edit-reviewer', [$company->companySEOURL, $journal->seo, $orderNumber])->with('message', 'Reviewers added successfully!');
    }


    public function update_unsreviewers(Request $request, $orderNumber)
    {



        mh_sms_unsuggestedrev::create([
            'userID' =>  auth()->user()->id,
            'recommendingName' =>  $request->rev_NonRecommendingName,
            'recommendingEmail' => $request->rev_NonRecommendingEmail,
            'recommendingExperties' =>  $request->rev_NonRecommendingExpert,
            'recommendingAffiliation' => $request->rev_NonRecommendingAffiliation,
            'recommendingCountry' => $request->rev_NonRecommendingCountryID,
            'orderNumber'  => $orderNumber,


        ]);



        $company = mh_companies::where('id',  request('companyID'))->first();
        $journal = mh_journals::where('id',  request('journalID'))->first();


        return redirect()->route('edit-reviewer', [$company->companySEOURL, $journal->seo, $orderNumber])->with('message', 'Reviewers added successfully!');
    }

    public function sreviewer_remove($company, $journal, $id)
    {


        $reviewer = mh_sms_suggestedrev::find($id);
        $reviewer->delete();

        return redirect()->route('reviewer', [$company, $journal])->with('message', 'Reviewer Deleted Successfully!');
    }

    public function unsreviewer_remove($company, $journal, $id)
    {


        $reviewer = mh_sms_unsuggestedrev::find($id);
        $reviewer->delete();

        return redirect()->route('reviewer', [$company, $journal])->with('message', 'Reviewer Deleted Successfully!');

    }


    public function sreviewer_delete($company, $journal, $orderNumber, $id)
    {


        $reviewer = mh_sms_suggestedrev::find($id);
        $reviewer->delete();

        return redirect()->route('edit-reviewer', [$company, $journal, $orderNumber])->with('message', 'Reviewer Deleted Successfully!');
    }

    public function unsreviewer_delete($company, $journal,$orderNumber, $id)
    {


        $reviewer = mh_sms_unsuggestedrev::find($id);
        $reviewer->delete();

        return redirect()->route('edit-reviewer', [$company, $journal, $orderNumber])->with('message', 'Reviewer Deleted Successfully!');

    }
}

