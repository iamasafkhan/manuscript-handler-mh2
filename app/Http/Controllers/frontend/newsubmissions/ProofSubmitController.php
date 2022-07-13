<?php

namespace App\Http\Controllers\frontend\newsubmissions;

use App\Http\Controllers\Controller;
use App\Models\mh_companies;
use App\Models\mh_journals;
use App\Models\Mh_Sms_Authorchecklist;
use App\Models\Mh_Sms_Authors_Institutions;
use App\Models\Mh_Sms_Filesupload;
use App\Models\Mh_Sms_Keywords;
use App\Models\mh_sms_suggestedrev;
use App\Models\Mh_Sms_Typetitleabstract;
use App\Models\mh_sms_unsuggestedrev;
use App\Models\MhCompanies;
use App\Models\MhJournals;
use Barryvdh\DomPDF\Facade\Pdf;
//use PDF;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Webklex\PDFMerger\Facades\PDFMergerFacade as PDFMerger;


class ProofSubmitController extends Controller
{
    public function index($company, $seo)
    {

        $company = mh_companies::where('companySEOURL', $company)->first();
        $journal = mh_journals::where('seo', $seo)->first();
        //$uploadedFiles = Mh_Sms_Filesupload::where('orderNumber', session()->get('orderNumber'))->get();
        $uploadedFiles = Mh_Sms_Filesupload::where('orderNumber', session()->get('orderNumber'))
        ->join('mh_esubmit_file_designation', 'mh_esubmit_file_designation.id' , '=', 'mh_sms_filesupload.fileDisignation')
        ->select('mh_sms_filesupload.*', 'mh_esubmit_file_designation.title as fileDesignation')
        ->get();
        $authorInstitutions = Mh_Sms_Authors_Institutions::where('orderNumber', session()->get('orderNumber'))->orderBy('id', 'ASC')->get();
        $typeTitleAbstract = Mh_Sms_Typetitleabstract::where('orderNumber', session()->get('orderNumber'))
        ->leftJoin('mh_esubmit_typesofmanuscript', 'mh_esubmit_typesofmanuscript.id', '=', 'mh_sms_typetitleabstract.typeOfManuScript')
        ->leftJoin('mh_areas_of_interest', 'mh_areas_of_interest.id', '=', 'mh_sms_typetitleabstract.areaOfSpecificInterest')
        ->select('mh_sms_typetitleabstract.*', 'mh_esubmit_typesofmanuscript.title as typeOfManuscript', 'mh_areas_of_interest.title as areaOfSpecificInterest')
        ->first();
        $suggestedrevs = mh_sms_suggestedrev::where('orderNumber', session()->get('orderNumber'))->orderBy('id', 'ASC')->get();
        $unsuggestedrevs = mh_sms_unsuggestedrev::where('orderNumber', session()->get('orderNumber'))->orderBy('id', 'ASC')->get();
        $author = Mh_Sms_Authorchecklist::where('pdf_accept', '1')->where('orderNumber', session()->get('orderNumber'))->first();
        $orderNumber = session()->get('orderNumber');

        $keywords = Mh_Sms_Keywords::where('orderNumber', $orderNumber)->get();

        //  dd($keywords);
        return view('frontend.newsubmissions.proof-submit', compact('company', 'journal', 'uploadedFiles', 'authorInstitutions', 'typeTitleAbstract', 'suggestedrevs', 'unsuggestedrevs', 'orderNumber', 'author', 'keywords'));

    }

    public function submit_proof_submit()
    {

        $company = mh_companies::where('id', request('companyID'))->first();
        $journal = mh_journals::where('id', request('journalID'))->first();

        $dt = new DateTime();


        $orderNumber = session()->get('orderNumber');


        $authorchecklist = Mh_Sms_Authorchecklist::where('orderNumber', $orderNumber);

            if($authorchecklist) {
                $authorchecklist->update([

                    'statusDated' => $dt->format('Y-m-d'),
                    'submitStatus' => 1,
                    'manuscriptStatus' => 1,

                ]);
            }



        return redirect()->route('finish-new-manuscript', [$company->companySEOURL, $journal->seo])->with('message', 'Your Submissions Completed successfully');

    }


    public function marge_pdf($company, $seo, $orderNumber)
    {
        $company = mh_companies::where('companySEOURL', $company)->first();
        $journal = mh_journals::where('seo', $seo)->first();

        $pdf_file = Mh_Sms_Filesupload::where('orderNumber', $orderNumber)->orderBy('id', 'ASC')->get();

        if($pdf_file){
            $pdf = PDFMerger::init();

            if (!is_dir(public_path('storage/manuscripts/' . $company->companySEOURL . '/' . $journal->seo.'/merged'))) {
                mkdir(public_path('storage/manuscripts/' . $company->companySEOURL . '/' . $journal->seo.'/merged'), 0775, true);
            }

            $coverPage = $this->generateCoverPage($company->companySEOURL,  $journal->seo, $orderNumber);
            $pdf->addPDF('storage/manuscripts/'. $company->companySEOURL . '/' . $journal->seo  . '/' . 'coverpages/'.$coverPage);

            foreach ($pdf_file as $key => $value) {
                $pdf->addPDF( 'storage/manuscripts/' . $company->companySEOURL . '/' . $journal->seo  . '/' . 'pdf/' . $value->pdfFile, 'all');
            }

            $fileName = time().'.pdf';
            $pdf->merge();
            $pdf->save(public_path('/storage/manuscripts/' . $company->companySEOURL . '/' . $journal->seo  . '/merged/' . $fileName));
            $pdf->stream(public_path($fileName));

        }
    }

    public function pdf_accept($company, $seo, $orderNumber)
    {

        $company = mh_companies::where('companySEOURL', $company)->first();
        $journal = mh_journals::where('seo', $seo)->first();

         $authorchecklist = Mh_Sms_Authorchecklist::where('orderNumber', $orderNumber);

            if($authorchecklist) {
                $authorchecklist->update([


                   'pdf_accept' => 1,


                ]);
            }


        return redirect()->route('proof-submit', [$company->companySEOURL, $journal->seo])->with('message', 'Your Submissions Completed successfully');

    }

    public function edit_proof_submit($company, $seo, $ordernumber)
    {
        $orderNumber = $ordernumber;

        $company = mh_companies::where('companySEOURL', $company)->first();
        $journal = mh_journals::where('seo', $seo)->first();
        // $ordernumber = Mh_Sms_Typetitleabstract::where('orderNumber', $orderNumber)->first();
        $uploadedFiles = Mh_Sms_Filesupload::where('orderNumber', $orderNumber)
        ->join('mh_esubmit_file_designation', 'mh_esubmit_file_designation.id','=','mh_sms_filesupload.fileDisignation')
        ->select('mh_sms_filesupload.*', 'mh_esubmit_file_designation.title as fileDisignation')
        ->get();
        $authorInstitutions = Mh_Sms_Authors_Institutions::where('orderNumber', $orderNumber)->get();
        $typeTitleAbstract = Mh_Sms_Typetitleabstract::where('orderNumber', $orderNumber)
        ->join('mh_esubmit_typesofmanuscript', 'mh_esubmit_typesofmanuscript.id', '=', 'mh_sms_typetitleabstract.typeOfManuScript')
        ->join('mh_areas_of_interest', 'mh_areas_of_interest.id', '=', 'mh_sms_typetitleabstract.areaOfSpecificInterest')
        ->select('mh_sms_typetitleabstract.*',
         'mh_esubmit_typesofmanuscript.title as typeOfManuscript',
          'mh_areas_of_interest.title as areaOfSpecificInterest')
        ->first();

        $suggestedrevs = mh_sms_suggestedrev::where('orderNumber', $orderNumber)->get();
        $unsuggestedrevs = mh_sms_unsuggestedrev::where('orderNumber', $orderNumber)->get();
        $author = Mh_Sms_Authorchecklist::where('pdf_accept', '1')->where('orderNumber', $orderNumber)->first();
        $keywords = Mh_Sms_Keywords::where('orderNumber', $orderNumber)->get();

        return view('frontend.newsubmissions.incompletesubmissions.update-proof-submit', compact('company', 'journal', 'uploadedFiles', 'authorInstitutions', 'typeTitleAbstract', 'suggestedrevs', 'unsuggestedrevs', 'orderNumber', 'author', 'keywords'));
    }



    public function update_proof_submit($orderNumber)
    {


        $company = mh_companies::where('id', request('companyID'))->first();
        $journal = mh_journals::where('id', request('journalID'))->first();

        $dt = new DateTime();

      $authorchecklist = Mh_Sms_Authorchecklist::where('orderNumber', $orderNumber);

            if($authorchecklist) {
                $authorchecklist->update([

                    'statusDated' => $dt->format('Y-m-d'),
                    'submitStatus' => 1,
                      'manuscriptStatus' => 1,

                ]);
            }



        return redirect()->route('finish-incomplete-manuscript', [$company->companySEOURL, $journal->seo, $orderNumber])->with('message', 'Your Submissions Completed successfully');

    }



    public function update_pdf_accept($company, $seo, $orderNumber)
    {

        $company = mh_companies::where('companySEOURL', $company)->first();
        $journal = mh_journals::where('seo', $seo)->first();

         $authorchecklist = Mh_Sms_Authorchecklist::where('orderNumber', $orderNumber);

            if($authorchecklist) {
                $authorchecklist->update([


                   'pdf_accept' => 1,


                ]);
            }


        return redirect()->route('edit-proof-submit', [$company->companySEOURL, $journal->seo, $orderNumber])->with('message', 'Your Submissions Completed successfully');

    }

    public function pdfview()
    {
        $data = Mh_Sms_Authors_Institutions::all();


        return view('frontend.newsubmissions.pdf-file', compact('data'));
    }



    public function generateCoverPage($company, $journal, $orderNumber)
    {

        $company = mh_companies::where('companySEOURL', $company)->first();
        $journal = mh_journals::where('seo', $journal)->first();
        $title = Mh_Sms_Typetitleabstract::where('orderNumber', '20220702072520')->first();


        $manuscript = DB::table('mh_sms_authorchecklist')
        ->join('mh_journals', 'mh_sms_authorchecklist.journalID', '=', 'mh_journals.id')
        ->join('mh_sms_typetitleabstract', 'mh_sms_authorchecklist.orderNumber', '=', 'mh_sms_typetitleabstract.orderNumber')
        ->join('mh_esubmit_typesofmanuscript', 'mh_sms_typetitleabstract.typeOfManuScript', '=', 'mh_esubmit_typesofmanuscript.id')
        ->join('mh_esubmit_areaofspecificinterest', 'mh_sms_typetitleabstract.areaOfSpecificInterest', '=', 'mh_esubmit_areaofspecificinterest.id')
        ->select('mh_sms_authorchecklist.*',
                'mh_journals.name as journalName', 'mh_journals.bannerImage as journalBanner',
                'mh_sms_typetitleabstract.manuscriptTitle as manuscriptTitle',
                'mh_sms_typetitleabstract.manuscriptAbstract as manuscriptAbstract',
                'mh_esubmit_typesofmanuscript.title as typeOfManuscript',
                'mh_esubmit_areaofspecificinterest.title as areaOfSpecificInterest')
        ->where('mh_sms_authorchecklist.orderNumber', $orderNumber)
        ->where('mh_sms_authorchecklist.userID', auth()->user()->id)
        ->first();
        //dd($manuscript);

        $authInstitutions = Mh_Sms_Authors_Institutions::where('orderNumber', $orderNumber)->get();

        $pdf = Pdf::loadView('frontend.newsubmissions.pdf-file', compact('manuscript', 'authInstitutions'))->setOptions(['defaultFont' => 'sans-serif']);

        if (!is_dir(public_path('storage/manuscripts/' . $company->companySEOURL . '/' . $journal->seo.'/coverpages'))) {
            mkdir(public_path('storage/manuscripts/' . $company->companySEOURL . '/' . $journal->seo.'/coverpages'), 0775, true);
        }

        $fileName = $orderNumber.'-'.rand().'-coverpage.pdf';
        $pdf->save(public_path('storage/manuscripts/'. $company->companySEOURL . '/' . $journal->seo  . '/' . 'coverpages/' . $fileName));

        //$pdf->addPDF('storage/manuscripts/'. $company->companySEOURL . '/' . $journal->seo  . '/' . 'coverpages/'.$coverPage);
        return $fileName;
        //return $pdf->save('tutsmake.pdf');

    }


    public function pdfgenerate($company, $journal, $orderNumber)
    {

        $company = mh_companies::where('companySEOURL', $company)->first();
        $journal = mh_journals::where('seo', $journal)->first();
        $title = Mh_Sms_Typetitleabstract::where('orderNumber', '20220702072520')->first();


        // ->join('mh_esubmit_typesofmanuscript', 'mh_sms_typetitleabstract.typeOfManuScript', '=', 'mh_esubmit_typesofmanuscript.id')
        // ->join('mh_esubmit_typesofmanuscript', 'mh_sms_typetitleabstract.typeOfManuScript', '=', 'mh_esubmit_typesofmanuscript.id')

        $manuscript = DB::table('mh_sms_authorchecklist')
        ->join('mh_journals', 'mh_sms_authorchecklist.journalID', '=', 'mh_journals.id')
        ->join('mh_sms_typetitleabstract', 'mh_sms_authorchecklist.orderNumber', '=', 'mh_sms_typetitleabstract.orderNumber')
        ->join('mh_esubmit_typesofmanuscript', 'mh_sms_typetitleabstract.typeOfManuScript', '=', 'mh_esubmit_typesofmanuscript.id')
        ->join('mh_esubmit_areaofspecificinterest', 'mh_sms_typetitleabstract.areaOfSpecificInterest', '=', 'mh_esubmit_areaofspecificinterest.id')
        //->leftjoin('mh_sms_authors_institutions',  'mh_sms_authorchecklist.orderNumber', '=', 'mh_sms_authors_institutions.orderNumber')
        //->join('mh_sms_authors_institutions', 'mh_sms_authorchecklist.orderNumber', '=', 'mh_sms_authors_institutions.orderNumber')
        ->select('mh_sms_authorchecklist.*',
                'mh_journals.name as journalName', 'mh_journals.bannerImage as journalBanner',
                'mh_sms_typetitleabstract.manuscriptTitle as manuscriptTitle',
                'mh_sms_typetitleabstract.manuscriptAbstract as manuscriptAbstract',
                'mh_esubmit_typesofmanuscript.title as typeOfManuscript',
                'mh_esubmit_areaofspecificinterest.title as areaOfSpecificInterest')
        ->where('mh_sms_authorchecklist.orderNumber', $orderNumber)
        ->where('mh_sms_authorchecklist.userID', auth()->user()->id)
        // ->where('mh_sms_authors_institutions.authCorresponding', '1')
        //->groupBy('mh_sms_authorchecklist.orderNumber')
        ->first();
        //$data = Mh_Sms_Authors_Institutions::all();
        //$title = 'Welcome to MalakandSoft.com';
        //$date = date('m/d/Y');



        //$manuscriptTypePlusArea = mh

        $authInstitutions = Mh_Sms_Authors_Institutions::where('orderNumber', $orderNumber)->get();

        //dd($authInstitutions);

        $pdf = Pdf::loadView('frontend.newsubmissions.pdf-file', compact('manuscript', 'authInstitutions'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream('tutsmake.pdf');

    }
}
