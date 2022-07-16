<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\MhJournals;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JournalsUsingMhController extends Controller
{
    public function index()
    {
        // $journals = MhJournals::all();
  
        $journals = DB::table('mh_journals')
        ->join('mh_companies', 'mh_journals.companyID', '=', 'mh_companies.id')
        ->select('mh_journals.*', 'mh_companies.companySEOURL as companyName')
        ->orderBy('mh_journals.id', 'DESC')
        ->get();
         
        return view('frontend.journals-using-mh', compact('journals'));

    }

    public function submit_online()
    {
        // $journals = MhJournals::all();
    return view('frontend.submit-online');

    }
}
