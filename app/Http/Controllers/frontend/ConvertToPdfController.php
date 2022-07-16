<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use PDF;


class ConvertToPdfController extends Controller
{
//     public function convertDocToPDF(){
//         $domPdfPath = base_path('manuscripts/'. $company->companySEOURL . '/' . $journal->seo, $filename);
//         \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
//         \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF'); 
//         $Content = \PhpOffice\PhpWord\IOFactory::load(public_path('manuscripts/'. $company->companySEOURL . '/' . $journal->seo, $filename . 'pdffile')); 
//         $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content,'PDF');
//         $PDFWriter->save(public_path('doc-pdf.pdf')); 
//         echo 'File has been successfully converted';
//    }
}
