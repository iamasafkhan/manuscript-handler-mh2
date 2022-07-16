<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminProfileSettingController extends Controller
{



    public function index()
    {
        $adminprofile = Admin::where('email', Auth::user()->email)->first();


        return view('admin.profile.admin_setting',compact('adminprofile'));
        
    }

   
    public function create()
    {
    
    }

    
    public function store(Request $request)
    {
    
    }

    
    public function show($id)
    {
    
    }

    
    public function edit($id)
    {
        
    }

  
    public function update(Request $request, $id)
    {
        //   dd($request);
       $adminprofile = Admin::find($id);

       //dd($request);

       $adminprofile->update([
           'name' => request()->get('name'),
          
   
           
   


       ]);


       if (request()->hasFile('image')) {


        $filename =  $adminprofile->id . '-' . request()->file('image')->getClientOriginalName();

        request()->file('image')->storeAs('AdminProfile/images/', $filename, 'public');

        $adminprofile->update([
            'image' => $filename
        ]);
    }


    return view('admin.home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
