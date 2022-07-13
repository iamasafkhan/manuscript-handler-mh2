<?php

namespace App\Http\Controllers\frontend\newsubmissions;

use App\Http\Controllers\Controller;
use App\Models\mh_companies;
use App\Models\mh_esubmit_file_designation;
use App\Models\mh_journals;
use App\Models\Mh_Sms_Authorchecklist;
use App\Models\Mh_Sms_Filesupload;
use App\Models\Mh_Sms_Typetitleabstract;
use App\Models\MhCompanies;
use App\Models\MhJournals;
use Illuminate\Http\Request;
use PDF;


class FileUploadController extends Controller
{
    public function index($company, $seo)
    {
        $company = mh_companies::where('companySEOURL', $company)->first();
        $journal = mh_journals::where('seo', $seo)->first();

        $filedesignation = mh_esubmit_file_designation::where('journalID', $journal->id)->get();

        $fileUploaded = Mh_Sms_Filesupload::where('orderNumber', session()->get('orderNumber'))->first();


        $uploadedFiles = Mh_Sms_Filesupload::where('orderNumber', session()->get('orderNumber'))
        ->join('mh_esubmit_file_designation', 'mh_esubmit_file_designation.id' , '=', 'mh_sms_filesupload.fileDisignation')
        ->select('mh_sms_filesupload.*', 'mh_esubmit_file_designation.title as fileDesignation')
        ->get();

        //dd($uploadedFiles);
        //dd($filedesignation);
        return view('frontend.newsubmissions.file-upload', compact('company', 'journal', 'filedesignation', 'uploadedFiles','fileUploaded'));
    }


    public function submit_file_upload(Request $request)
    {


        $journalID = request('journalID');
        $companyID = request('companyID');

        $company = mh_companies::where('id', $companyID)->first();
        $journal = mh_journals::where('id', $journalID)->first();

        $orderNumber = session()->get('orderNumber');
        $orderNumberPDF = rand().'_'.$orderNumber;

        $fileupload =  Mh_Sms_Filesupload::create([
            'userID' =>  auth()->user()->id,
            'journalID' => auth()->user()->journalID,
            'fileDisignation'  => $request->get('fileDisignation'),
            'imageColor'  => $request->get('imageColor'),
            'orderNumber' => $orderNumber,
        ]);

        if (request()->file('uploadFilesFile')) {

            $filename = rand().'_'.$request->file('uploadFilesFile')->getClientOriginalName();
            $request->file('uploadFilesFile')->storeAs('manuscripts/' . $company->companySEOURL . '/' . $journal->seo, $filename, 'public');

            $fileupload->update([
                'fileName' => $filename,
            ]);
        }

        $domPdfPath = base_path('vendor/dompdf/dompdf');
        \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
        \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');
        $Content = \PhpOffice\PhpWord\IOFactory::load(public_path('storage/manuscripts/'. $company->companySEOURL . '/' . $journal->seo.'/'. $filename));
        $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content,'PDF');
        if (!is_dir(public_path('storage/manuscripts/' . $company->companySEOURL . '/' . $journal->seo.'/pdf'))) {
            mkdir(public_path('storage/manuscripts/' . $company->companySEOURL . '/' . $journal->seo.'/pdf'), 0777, true);
        }

        $pdfFile = $PDFWriter->save(public_path('storage/manuscripts/' . $company->companySEOURL . '/' . $journal->seo.'/pdf/'.$orderNumberPDF.'.pdf'));
        //echo 'File has been successfully converted';

        // dd('the files has been converted');
        $fileupload->update([
            'pdfFile' => $orderNumberPDF.'.pdf',
        ]);


        return redirect()->route('file-upload', [$company->companySEOURL, $journal->seo])->with('message', 'You can Select Other File If You Want Or Go To Next Step');

    }


    public function edit_file_upload($company, $seo, $ordernumber)
    {

        $company = mh_companies::where('companySEOURL', $company)->first();
        $journal = mh_journals::where('seo', $seo)->first();
        $orderNumber = Mh_Sms_Typetitleabstract::where('orderNumber', $ordernumber)->first();
        $filedesignation = mh_esubmit_file_designation::where('journalID', $journal->id)->get();
        $uploadedFiles = Mh_Sms_Filesupload::where('orderNumber', $ordernumber)->get();
        $fileUploaded = Mh_Sms_Filesupload::where('orderNumber', $ordernumber)->first();

        return view('frontend.newsubmissions.incompletesubmissions.update-file-upload', compact('company', 'journal', 'filedesignation', 'uploadedFiles','fileUploaded', 'orderNumber'));
    }

    public function update_file_upload(Request $request, $orderNumber)
    {
        // Mh_Sms_Filesupload::where('orderNumber',$orderNumber)->delete();

        $company = mh_companies::where('id', request('companyID'))->first();
        $journal = mh_journals::where('id', request('journalID'))->first();

        $orderNumberPDF = rand().'_'.$orderNumber;

        $fileupload =  Mh_Sms_Filesupload::create([
            'userID' =>  auth()->user()->id,
            'journalID' => auth()->user()->journalID,
            'fileDisignation'  => $request->get('fileDisignation'),
            'imageColor'  => $request->get('imageColor'),
            'orderNumber' => $orderNumber,
        ]);

        if (request()->file('uploadFilesFile')) {

            $filename = rand().'_'.$request->file('uploadFilesFile')->getClientOriginalName();
            $request->file('uploadFilesFile')->storeAs('manuscripts/' . $company->companySEOURL . '/' . $journal->seo, $filename, 'public');

            $fileupload->update([
                'fileName' => $filename,
            ]);
        }

        $domPdfPath = base_path('vendor/dompdf/dompdf');
        \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
        \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');
        $Content = \PhpOffice\PhpWord\IOFactory::load(public_path('storage/manuscripts/'. $company->companySEOURL . '/' . $journal->seo.'/'. $filename));
        $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content,'PDF');
        if (!is_dir(public_path('storage/manuscripts/' . $company->companySEOURL . '/' . $journal->seo.'/pdf'))) {
            mkdir(public_path('storage/manuscripts/' . $company->companySEOURL . '/' . $journal->seo.'/pdf'), 0777, true);
        }

        $pdfFile = $PDFWriter->save(public_path('storage/manuscripts/' . $company->companySEOURL . '/' . $journal->seo.'/pdf/'.$orderNumberPDF.'.pdf'));
        //echo 'File has been successfully converted';

        // dd('the files has been converted');
        $fileupload->update([
            'pdfFile' => $orderNumberPDF.'.pdf',
        ]);


        return redirect()->route('edit-file-upload', [$company->companySEOURL, $journal->seo, $orderNumber])->with('message', 'You can Select Other File If You Want Or Go To Next Step');


    }
    public function delete_file($company, $journal, $id)
    {

        $files = Mh_Sms_Filesupload::find($id);
        $files->delete();

        return redirect()->route('file-upload', [$company, $journal])->with('message', 'File Deleted Successfully!');
    }

    public function remove_file($company, $journal, $orderNumber, $id)
    {

        Mh_Sms_Filesupload::find($id)->delete();

        return redirect()->route('edit-file-upload', [$company, $journal, $orderNumber])->with('message', 'File Deleted Successfully!');
    }
}
