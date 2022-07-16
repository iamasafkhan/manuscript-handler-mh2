<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\mh_resources_center;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ResourceCenterController extends Controller
{


    public function index()
    {

        $resources_center = mh_resources_center::all();

        return view('admin.resourcecenter.home', compact('resources_center'));
    }


    public function create()
    {
        return view('admin.resourcecenter.add');
    }



    public function store(Request $request)
    {


        $request->validate(
            [

                'user_type' => 'required:mh_resources_center',

                'youtubelink' => 'required:mh_resources_center',

                'pdffile' => 'required:mh_resources_center',

            ],

            [
                'user_type.required' => 'please select User Type ',

                'youtubelink.required' => 'please Enter YouTube Link',

                'pdffile.required' => 'please select PDF file',
            ]
        );

        


        $resources_center =  mh_resources_center::updateOrCreate(
            ['id' => $request->id],

            [
                'user_type' => $request->user_type,

                'youtubelink' => $request->youtubelink,

                'pdffile' => $request->pdffile,

            ]
        );


        if (request()->hasFile('pdffile')) {


            $filename = $resources_center->id . '-' . request()->file('pdffile')->getClientOriginalName();

            request()->file('pdffile')->storeAs('pdf', $filename, 'public');

            $resources_center->update([
                'pdffile' => $filename
            ]);
        }

        return redirect()->to('admin/resourcecenter')

            ->with('success', 'Add Resource Center Successfully.');
    }




    public function edit($id)
    {

        $resources_center = mh_resources_center::find($id);

        return view('admin.resourcecenter.edit', compact('resources_center'));
    }







    public function update(Request $request)
    {
        $request->validate(
            [

                'user_type' => 'required:mh_resources_center',

                'youtubelink' => 'required:mh_resources_center',

                'pdffile' => 'required:mh_resources_center',

            ],

            [
                'user_type.required' => 'please select User Type ',

                'youtubelink.required' => 'please Enter YouTube Link',

                'pdffile.required' => 'please select PDF file',
            ]
        );

        $resources_center =  mh_resources_center::updateOrCreate(
            ['id' => $request->id],

            [
                'user_type' => $request->user_type,

                'youtubelink' => $request->youtubelink,

                'pdffile' => $request->pdffile,

            ]
        );


        if (request()->hasFile('pdffile')) {


            $filename = $resources_center->id . '-' . request()->file('pdffile')->getClientOriginalName();

            request()->file('pdffile')->storeAs('pdf', $filename, 'public');

            $resources_center->update([
                'pdffile' => $filename
            ]);
        }

        return redirect()->to('admin/resourcecenter')

            ->with('success', 'Update Resource Center Successfully.');
    }



    public function destroy($id)
    {

        $resources_center = mh_resources_center::find($id);
        $resources_center->delete();
        return redirect()->to('admin/resourcecenter')
            ->with('success', 'Delete Resource Successfully!');
    }



  
}
