<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\mh_journals;
use App\Models\mh_journals_checklist;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{



    public function checklist(Request $request,$id)
    {
        $journals = mh_journals::find($id);
        $checklist = mh_journals_checklist::select('*')
        ->where('journalID', '=', $id)
        ->get();
        return view('admin.journals.checklist',compact('journals','checklist'));
    }




    public function checkliststore(Request $request)
    {

        $request->validate([

            'description' => 'required:mh_journals_checklist',
        ],
        
        [
            
          'description.required' => 'please specify some description',

        ]);


        // dd($request);


        $checklist =  mh_journals_checklist::updateOrCreate(
            ['id' => $request->id],

            [
                 'journalID' => $request->journalid,

                'description' => $request->description,

            ]
        );


        
      

        return redirect()->route('checklist', $checklist->journalID) 
       
            ->with('status', 'Add Checklist Successfully.');
    }


    public function checklistedit(Request $request,$id)
    {
 
        $checklist = mh_journals_checklist::find($id);

        return view('admin.journals.checklistedit',compact('checklist'));


    }



    public function checklistupdate(Request $request,$id)
    {


        $request->validate([

            'description' => 'required:mh_journals_checklist',
        ],
        
        [
            
          'description.required' => 'please specify some description',

        ]);



        $checklist =  mh_journals_checklist::updateOrCreate(
            ['id' => $request->id],

            [

                'description' => $request->description,

            ]
        );
    
        
        return redirect()->route('checklist', $checklist->journalID) 
       
            ->with('status', 'Update Checklist Successfully.');
    }


    public function checklistdestroy(Request $request, $id)
    {
        $checklist = mh_journals_checklist::find($id);
        $checklist->delete();

       
    

        return redirect()->route('checklist', $checklist->journalID) 

        ->with('status', 'Checklist delete Successfully!');
    }
}
