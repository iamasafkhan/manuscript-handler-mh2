<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\mh_esubmit_areaofspecificinterest;
use App\Models\mh_journals;
use Illuminate\Http\Request;

class AreaSpecificInterestController extends Controller
{
    
    public function areaofspecificinterest($id)
    {

        $journals = mh_journals::find($id);
        $areaofspecificinterest = mh_esubmit_areaofspecificinterest::select('*')
            ->where('journalID', '=', $id)
            ->get();
        return view('admin.journals.areaofspecificinterest',compact('journals','areaofspecificinterest'));
    }




    public function areaofspecificintereststore(Request $request)
    {
        
        if($request->specialIssue == '')
        {
            $specialIssue = 0;
        } else {
            $specialIssue = $request->specialIssue;
        }

        $request->validate([

            'title' => 'required:mh_esubmit_typesofmanuscript',
        ],
        
        [
            
          'title.required' => 'please specify title',
   
        ]);

        $areaofspecificinterest =  mh_esubmit_areaofspecificinterest::updateOrCreate(
            ['id' => $request->id],

            [
                 'journalID' => $request->journalid,
                'title' => $request->title,
                'specialIssue' => $specialIssue
            ]
        );


                 
        return redirect()->route('areaofspecificinterest', $areaofspecificinterest->journalID) 
       
        ->with('success', 'Add Area specific Interest Successfully.');


    }



    public function areaofspecificinterestedit($id)
    {
       $areaofspecificinterest = mh_esubmit_areaofspecificinterest::find($id);

       return view('admin.journals.areaofspecificinterestedit',compact('areaofspecificinterest'));
    }



    
    public function areaofspecificinterestupdate(Request $request)
    {


        $request->validate([

            'title' => 'required:mh_esubmit_typesofmanuscript',
        ],
        
        [
            
          'title.required' => 'please specify title',
   
        ]);
        
  

     $areaofspecificinterest =  mh_esubmit_areaofspecificinterest::updateOrCreate(
        ['id' => $request->id],

        [
      
            'title' => $request->title,
 

        ]
    );


                   
    return redirect()->route('areaofspecificinterest', $areaofspecificinterest->journalID) 
       
    ->with('success', 'Update Area specific Interest Successfully.');

    }





    public function areaofspecificinterestdestroy($id)
    {
        
       $areaofspecificinterest = mh_esubmit_areaofspecificinterest::find($id);

       $areaofspecificinterest->delete();
        
       return redirect()->route('areaofspecificinterest', $areaofspecificinterest->journalID) 
       
       ->with('success', 'Delete Area specific Interest Successfully.');

    }

}
