<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\mh_areas_of_interest;
use App\Models\mh_journals;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Laravel\Ui\Presets\React;

class AreasInterestManagmentController extends Controller
{
    public function index()
    {

        $areainterest = mh_areas_of_interest::all();
        return view('admin.areasinterestmanagment.home',compact('areainterest'));
    }



    public function create()
    {
        $journals = mh_journals::all();
        $areainterest = mh_areas_of_interest::all();
        return view('admin.areasinterestmanagment.add', compact('journals', 'areainterest'));
    }




    public function store(Request $request)
    {
        dd($request);
            
        $areas_of_interes =  mh_areas_of_interest::updateOrCreate(
            ['id' => $request->id],
         
            [
                'journalID' => $request->journal, 

                'parentID' => $request->parent_interest,

                'title' => $request->title, 

                'seo_url' => Str::slug(request('title', '-')),
          
            ]);

         

        return  redirect()->to('admin/areasinterestmanagment')
        ->with('success', 'Add  Area of Interest  Successfully.');

    }




    public function edit($id)
    {
      
        $areas_of_interest = mh_areas_of_interest::find($id);

        $journals = mh_journals::all();

        $areainterest = mh_areas_of_interest::all();

        return view('admin.areasinterestmanagment.edit',compact('areas_of_interest','journals', 'areainterest'));
        
    }




    public function update(Request $request,$id)
    {
    

         dd($request);

         $areas_of_interes =  mh_areas_of_interest::updateOrCreate(
            ['id' => $request->id],
         
            [
                'journalID' => $request->journal, 

                'parentID' => $request->parent_interest,

                'title' => $request->title, 

                'seo_url' => Str::slug(request('title', '-')),
          
            ]);

         

        return  redirect()->to('admin/areasinterestmanagment')
        ->with('success', 'Update  Area of Interest  Successfully.');

    }


    
    public function destroy($id)
    {
        
       $areas_of_interest = mh_areas_of_interest::find($id);

       $areas_of_interest->delete();
        
       return redirect()->to('admin/areasinterestmanagment') 
       
       ->with('success', 'Delete Area Interest Successfully.');

    }

}
