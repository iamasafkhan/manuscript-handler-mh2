<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\mh_companies;
use App\Models\mh_journals;
use App\Models\MhCompanies;
use App\Models\MhJournals;
use Illuminate\Http\Request;

class FrontendDashboardController extends Controller
{
    public function index($company, $seo)
    {

        $company = mh_companies::where('companySEOURL', $company)->first();
        
        $seo = mh_journals::where('seo', $seo)->first();

        return view('frontend.dashboard-home', compact('company', 'seo'));
    }
}
