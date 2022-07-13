<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\mh_companies;
use App\Models\mh_journals;
use App\Models\mh_journals_checklist;
use App\Models\MhCompanies;
use App\Models\MhJournals;
use Illuminate\Http\Request;

class NewSubmissionsController extends Controller
{
  public function index($company, $seo)
  {

    $company = mh_companies::where('companySEOURL', $company)->first();
    $journal = mh_journals::where('seo', $seo)->first();
    //dd($journal);
    $journalID = $journal->id;

    $checklists = mh_journals_checklist::where('journalID', $journalID)->get();
    //dd($checklist);

    return view('frontend.newsubmissions.submit-new-manuscript', compact('checklists'));
  }
}
