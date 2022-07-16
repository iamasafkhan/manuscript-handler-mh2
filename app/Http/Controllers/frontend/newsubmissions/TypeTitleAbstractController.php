<?php

namespace App\Http\Controllers\frontend\newsubmissions;

use App\Http\Controllers\Controller;
use App\Models\mh_companies;
use App\Models\Mh_Countries;
use App\Models\mh_esubmit_areaofspecificinterest;
use App\Models\mh_esubmit_typesofmanuscript;
use App\Models\mh_journals;
use App\Models\Mh_Sms_Authorchecklist;
use App\Models\Mh_Sms_Keywords;
use App\Models\mh_sms_suggestedrev;
use App\Models\Mh_Sms_Typetitleabstract;
use App\Models\mh_sms_unsuggestedrev;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TypeTitleAbstractController extends Controller
{
    public function index(Request $request, $company, $seo)
    {
        $company = mh_companies::where('companySEOURL', $company)->first();
        $journal = mh_journals::where('seo', $seo)->first();
        $typeofmanuscripts = mh_esubmit_typesofmanuscript::where('journalID', $journal->id)->get();
        $areaofspecificinterests = mh_esubmit_areaofspecificinterest::where('journalID', $journal->id)->get();
        $countries = Mh_Countries::all();


        $step2 = Mh_Sms_Typetitleabstract::where('orderNumber', $request->session()->get('orderNumber'))->first();


        return view('frontend.newsubmissions.type-title-abstract', compact('company', 'journal', 'typeofmanuscripts', 'areaofspecificinterests', 'countries', 'step2'));
    }

    public function submit_TypeTitle_Abstract(Request $request)
    {



        $journalID = request('journalID');
        $companyID = request('companyID');

        $orderNumber = session()->get('orderNumber');

        //$ordernumber = Mh_Sms_Authorchecklist::where('journalID',  $journalID)->first();


        Mh_Sms_Typetitleabstract::create([
            'userID' =>  auth()->user()->id,
            'typeOfManuScript'  => $request->get('typeOfManuScript'),
            'areaOfSpecificInterest' => $request->get('areaOfSpecificInterest'),
            'manuscriptTitle'  => $request->get('manuscriptTitle'),
            'runningTitle'  => $request->get('runningTitle'),
            'manuscriptAbstract'  => $request->get('manuscriptAbstract'),
            'manuscriptAcknowledgement'  => $request->get('manuscriptAcknowledgement'),
            'orderNumber'  => $orderNumber,

        ]);

        $keywords = $request->keywords;


        foreach ($keywords as $key => $keyword_value) {
            Mh_Sms_Keywords::create([
                'userID' =>  auth()->user()->id,
                'keywords' => $keyword_value,
                'orderNumber'  => $orderNumber,

            ]);
        }

        $company = mh_companies::where('id', $companyID)->first();
        $journal = mh_journals::where('id', $journalID)->first();

        return redirect()->route('reviewer', [$company->companySEOURL, $journal->seo]);
    }

    public function edit_type_title_abstract($company, $seo, $orderNumber)
    {


        $company = mh_companies::where('companySEOURL', $company)->first();
        $journal = mh_journals::where('seo', $seo)->first();
        $typeTitleAbstract = Mh_Sms_Typetitleabstract::where('orderNumber', $orderNumber)->first();
        $orderNumber = Mh_Sms_Authorchecklist::where('orderNumber', $orderNumber)->first();
        $typeofmanuscripts = mh_esubmit_typesofmanuscript::where('journalID', $journal->id)->get();
        $areaofspecificinterests = mh_esubmit_areaofspecificinterest::where('journalID', $journal->id)->get();
        $countries = Mh_Countries::all();

        return view('frontend.newsubmissions.incompletesubmissions.update-type-title-abstract', compact('company', 'journal', 'typeofmanuscripts', 'areaofspecificinterests', 'countries', 'orderNumber', 'typeTitleAbstract'));
    }

    public function update_type_title_abstract(Request $request, $orderNumber)
    {


        Mh_Sms_Typetitleabstract::updateOrCreate(
            ['orderNumber' => $orderNumber],
            [
                'userID' =>  auth()->user()->id,
                'typeOfManuScript'  => $request->get('typeOfManuScript'),
                'areaOfSpecificInterest' => $request->get('areaOfSpecificInterest'),
                'manuscriptTitle'  => $request->get('manuscriptTitle'),
                'runningTitle'  => $request->get('runningTitle'),
                'manuscriptAbstract'  => $request->get('manuscriptAbstract'),
                'manuscriptAcknowledgement'  => $request->get('manuscriptAcknowledgement'),
                'orderNumber'  => $orderNumber,
            ]
        );


        Mh_Sms_Keywords::where('orderNumber', $orderNumber)->delete();

        $keywords = $request->keywords;


        foreach ($keywords as $key => $keyword_value) {
            Mh_Sms_Keywords::create([
                'userID' =>  auth()->user()->id,
                'keywords' => $keyword_value,
                'orderNumber'  => $orderNumber,

            ]);
        }

        $company = mh_companies::where('id',  request('companyID'))->first();
        $journal = mh_journals::where('id',  request('journalID'))->first();
        return redirect()->route('edit-reviewer', [$company->companySEOURL, $journal->seo, $orderNumber]);
    }
}
