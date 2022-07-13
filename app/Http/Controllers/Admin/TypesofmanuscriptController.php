<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\mh_esubmit_typesofmanuscript;
use App\Models\mh_journals;
use Illuminate\Http\Request;

class TypesofmanuscriptController extends Controller
{
     public function typesofmanuscript(Request $request,$id)
     {


        $journals = mh_journals::find($id);
        $typesofmanuscript = mh_esubmit_typesofmanuscript::select('*')
            ->where('journalID', '=', $id)
            ->get();
        return view('admin.journals.typesofmanuscript',compact('journals','typesofmanuscript'));
     }




     public function typesofmanuscriptstore(Request $request)
     {
      $request->validate([

         'title' => 'required:mh_esubmit_typesofmanuscript',
     ],
     
     [
         
       'title.required' => 'please specify title',

     ]);
    
        
        $typesofmanuscript =  mh_esubmit_typesofmanuscript::updateOrCreate(
            ['id' => $request->id],
         
            [
            'journalID' => $request->journalid,

            'title' => $request->title, 
        
            ]);
         
            
        return redirect()->route('typesofmanuscript', $typesofmanuscript->journalID) 
       
        ->with('success', 'Add TypeManuscript Successfully.');
     }


     public function typesofmanuscriptedit($id)
     {
         
        $typesofmanuscript = mh_esubmit_typesofmanuscript::find($id);

        return view('admin.journals.typesofmanuscriptedit',compact('typesofmanuscript'));
     }



     public function typesofmanuscriptupdate(Request $request)
     {

      $request->validate([

         'title' => 'required:mh_esubmit_typesofmanuscript',
     ],
     
     [
         
       'title.required' => 'please specify title',

     ]);


        $typesofmanuscript =  mh_esubmit_typesofmanuscript::updateOrCreate(

            ['id' => $request->id],

            [

                'title' => $request->title,

            ]
        );
        return redirect()->route('typesofmanuscript', $typesofmanuscript->journalID) 
       
        ->with('success', 'Update TypeManscript Successfully.');
     }



     public function typesofmanuscriptdestroy($id)
     {
        $typesofmanuscript = mh_esubmit_typesofmanuscript::find($id);
        $typesofmanuscript->delete();

        return redirect()->route('typesofmanuscript', $typesofmanuscript->journalID) 
       
        ->with('success', 'Delete TypeManscript Successfully.');
  
     }




}
