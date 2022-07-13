<?php

namespace App\Http\Controllers\frontend\newsubmissions;

use App\Http\Controllers\Controller;
use App\Models\mh_companies;
use App\Models\mh_journals;
use App\Models\mh_journals_checklist;
use App\Models\MhCompanies;
use App\Models\MhJournals;
use Illuminate\Http\Request;

class AuthorChecklistController extends Controller
{
    public function index(Request $request, $company, $seo)
    {

        // $url = $request->url();
 
        // With Query String...
        // $url = $request->fullUrl();
       
        // dd($request->path());

        //dd(request()->all()); // All parameters
      //request()->get('param') // One parameter
      // dd(request()->only('param1', 'param2'));
        
    $company = mh_companies::where('companySEOURL', $company)->first();
    $journal = mh_journals::where('seo', $seo)->first();
    $journalID = $journal->id;
    $checklists = mh_journals_checklist::where('journalID', $journalID)->get();
   

        return view('frontend.newsubmissions.authors-checklist', compact('company', 'journal', 'checklists'));
    }

    public function submit_first_step()
    {
        
    }
}
