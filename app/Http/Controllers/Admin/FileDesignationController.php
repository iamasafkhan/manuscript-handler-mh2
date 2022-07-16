<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\mh_esubmit_file_designation;
use App\Models\mh_journals;
use Illuminate\Http\Request;

class FileDesignationController extends Controller
{
   public function filedesignation($id)
   {
      $journals = mh_journals::find($id);
      $filedesignation = mh_esubmit_file_designation::select('*')
      ->where('journalID', '=', $id)
      ->get();
      return view('admin.journals.filedesignation', compact('journals', 'filedesignation'));
   }



   public function filedesignationstore(Request $request)
   {


      $request->validate(
         [

            'title' => 'required:mh_esubmit_typesofmanuscript',
         ],

         [

            'title.required' => 'please specify title',

         ]
      );

      $file_designation =  mh_esubmit_file_designation::updateOrCreate(
         ['id' => $request->id],

         [
            'journalID' => $request->journalid,

            'title' => $request->title,

         ]
      );
     


      return redirect()->route('filedesignation', $file_designation->journalID) 
       
      ->with('success', 'Add FileDesignation Successfully.');
   }


   public function filedesignationedit($id)
   {
      $file_designation = mh_esubmit_file_designation::find($id);

      return view('admin.journals.filedesignationedit', compact('file_designation'));
   }



   public function filedesignationtupdate(Request $request)
   {
      $request->validate(
         [

            'title' => 'required:mh_esubmit_typesofmanuscript',
         ],

         [

            'title.required' => 'please specify title',

         ]
      );


      $file_designation =  mh_esubmit_file_designation::updateOrCreate(
         ['id' => $request->id],

         [

            'title' => $request->title,


         ]
      );

      return redirect()->route('filedesignation', $file_designation->journalID) 
       
      ->with('success', 'Update FileDesignation Successfully.');
   }



   public function filedesignationdestroy($id)
   {

      $file_designation = mh_esubmit_file_designation::find($id);

      $file_designation->delete();

      return redirect()->route('filedesignation', $file_designation->journalID) 
       
      ->with('success', 'Delete FileDesignation Successfully.');
   }
}
