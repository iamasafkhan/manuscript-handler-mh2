<?php

namespace App\Http\Controllers\frontend\newsubmissions;

use App\Http\Controllers\Controller;
use App\Models\mh_companies;
use App\Models\mh_journals;
use App\Models\mh_journals_checklist;
use App\Models\Mh_Sms_Authorchecklist;
use App\Models\Mh_Sms_Authors_Institutions;
use App\Models\MhCompanies;
use App\Models\MhJournals;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class NewSubmissionsController extends Controller
{
    public function index($company, $seo)
    {

        $company = mh_companies::where('companySEOURL', $company)->first();
        $journal = mh_journals::where('seo', $seo)->first();
        $journalID = $journal->id;
        $checklists = mh_journals_checklist::where('journalID', $journalID)->get();


        return view('frontend.newsubmissions.submit-new-manuscript', compact('company', 'journal', 'checklists'));
    }

    public function submit_first_step(Request $request)
    {
        //dd(auth()->user()->id);
        $curTime = new \DateTime();
        $orderNumber = $curTime->format("YmdHis");

        $step1 = Mh_Sms_Authorchecklist::create([
            'userID' =>  auth()->user()->id,
            'journalID' => auth()->user()->journalID,
            'agree'  => $request->get('agree'),
            'conflictOfinterest' => $request->get('conflictOfinterest'),
            'clarifyStatement'  => $request->get('clarifyStatement'),
            'orderNumber' => $orderNumber,

        ]);

        //$manuscriptID = $step1->id;

        Mh_Sms_Authors_Institutions::create([
            'userID' => auth()->user()->id,
            'authSequence' => '1',
            'authTitle' => auth()->user()->prefixType,
            'authFirstName' => auth()->user()->firstName,
            'authLastName' => auth()->user()->lastName,
            'authEmailAddress' => auth()->user()->primaryEmailAddress,
            'authAffiliation' => auth()->user()->institution,
            'authCountry' => auth()->user()->country,
            'authCorresponding' => '1',
            'orderNumber' => $orderNumber,
        ]);

        session()->put('orderNumber', $orderNumber);


        $journalID = request('journalID');
        $companyID = request('companyID');
        $company = mh_companies::where('id', $companyID)->first();
        $journal = mh_journals::where('id', $journalID)->first();

        return redirect()->route('title-type-abstract', [$company->companySEOURL, $journal->seo])->with('message', 'created successfully');
    }

    public function finish_new_manuscript($company, $seo)
    {

        $company = mh_companies::where('companySEOURL', $company)->first();
        $journal = mh_journals::where('seo', $seo)->first();
        return view('frontend.newsubmissions.finish-new-manuscript', compact('company', 'journal'));
    }

    public function finish_incomplete_manuscript($company, $seo)
    {

        // dd()
        $company = mh_companies::where('companySEOURL', $company)->first();
        $journal = mh_journals::where('seo', $seo)->first();
        return view('frontend.newsubmissions.incompletesubmissions.finish-incomplete-manuscript', compact('company', 'journal'));
    }

    public function edit_author_checklist($company, $seo)
    {

        $company = mh_companies::where('companySEOURL', $company)->first();
        $journal = mh_journals::where('seo', $seo)->first();
        $journalID = $journal->id;
        $checklists = mh_journals_checklist::where('journalID', $journalID)->get();

        return view('frontend.newsubmissions.incompletesubmissions.update-authorchecklist', compact('company', 'journal', 'checklists'));
    }
}
