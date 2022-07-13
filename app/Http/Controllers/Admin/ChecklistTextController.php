<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\mh_journals;
use App\Models\mh_journals_checklist_text;
use Illuminate\Http\Request;

class ChecklistTextController extends Controller
{


    public function checklisttext($id)
    {
        $journals = mh_journals::find($id);
        $checklisttext = mh_journals_checklist_text::select('*');
        // ->where('journalID', '=', $id)
        // ->get();
        return view('admin.journals.checklisttext',compact('journals','checklisttext'));
    }




    public function  checklisttextstore(Request $request)
    {
        $request->validate([

            'description' => 'required:mh_journals_checklist',
        ],
        
        [
            
          'description.required' => 'please specify some description',

        ]);


        $checklisttext =  mh_journals_checklist_text::updateOrCreate(
            ['id' => $request->id],

            [
                 'journalID' => $request->journalid,

                'description' => $request->description,

            ]
        );


        return redirect()->route('checklisttext', $checklisttext->journalID) 
       
        ->with('status', 'Update Checklist Text Successfully.');
    }





}
