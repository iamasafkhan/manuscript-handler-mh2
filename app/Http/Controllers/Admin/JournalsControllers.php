<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\mh_journals;
use Illuminate\Http\Request;

class JournalsControllers extends Controller
{

    public function index()
    {

        if (request()->has('q')) {

            $q = request()->get('q');

            $journals = mh_journals::where('name', 'like', "%$q%")->get();


        }
        else
        {

            $journals = mh_journals::all();


        }
        return view('admin.journals.home', compact('journals'));
    }




    public function create()
    {
        return view('admin.journals.add');
    }



    public function store(Request $request)
    {


        $request->validate(
            [

                'name' => 'required|unique:mh_journals',

                'journalHomePage' => 'required:mh_journals',

                'seo' => 'required|unique:mh_journals',

                'shortDescription' => 'required:mh_journals',

                'leftimage' => 'required:mh_journals',

                'detailimage' => 'required:mh_journals',

                'bannerImage' => 'required:mh_journals',
            ],

            [

                'name.required' => 'please specify journal name',

                'name.unique' => 'This journal name already exists',

                'journalHomePage.required' => 'please specify journalHomePage name',

                'seo.required' => 'please specify seo name',

                'seo.unique' => 'This seo  name already exists',

                'shortDescription.required' => 'please specify shortDescription name',

                'leftimage.required' => 'please specify leftimage',

                'detailimage.required' => 'please specify detailimage',

                'bannerImage.required' => 'please specify bannerImage',

            ]
        );



     //   dd($request);


        $journals =  mh_journals::create([

            'name' => request()->get('name'),

            'shortname' => request()->get('shortname'),

            'journalHomePage' => request()->get('journalHomePage'),

            'seo' => request()->get('seo'),

            'shortDescription' => request()->get('shortDescription'),

            // 'leftimage' => request()->get('leftimage'),

            // 'detailimage' => request()->get('detailimage'),

            // 'bannerImage' => request()->get('bannerImage'),


        ]);


        if (request()->hasFile('leftimage')) {
            if (!is_dir(public_path('storage/images/journals/leftimage'))) {
                mkdir(public_path('storage/images/journals/leftimage'), 0775, true);
            }
            $filename = $journals->id . '-' . request()->file('leftimage')->getClientOriginalName();
            request()->file('leftimage')->storeAs('storage/images/journals/leftimage', $filename, 'public');
            $journals->update([
                'leftimage' => $filename
            ]);
        }



        if (request()->hasFile('detailimage')) {
            if (!is_dir(public_path('storage/images/journals/detailimage'))) {
                mkdir(public_path('storage/images/journals/detailimage'), 0775, true);
            }
            $filename = $journals->id . '-' . request()->file('detailimage')->getClientOriginalName();
            request()->file('detailimage')->storeAs('storage/images/journals/detailimage', $filename, 'public');
            $journals->update([
                'detailimage' => $filename
            ]);
        }


        if (request()->hasFile('bannerImage')) {
            if (!is_dir(public_path('storage/images/journals/bannerImage'))) {
                mkdir(public_path('storage/images/journals/bannerImage'), 0775, true);
            }
            $filename = $journals->id . '-' . request()->file('bannerImage')->getClientOriginalName();
            request()->file('bannerImage')->storeAs('storage/images/journals/bannerImage', $filename, 'public');
            $journals->update([
                'bannerImage' => $filename
            ]);
        }

        return redirect()->to('admin/journals')
            ->with('success', 'Add Journals successfully!');
    }



    public function edit($id)
    {
        $journals = mh_journals::find($id);

        return view('admin.journals.edit', compact('journals'));
    }

    public function update(Request $request, $id)
    {

      //  dd($request);
        $request->validate(
            [
                'name' => 'required:mh_journals',
                'shortname' => 'required:mh_journals',
                'journalHomePage' => 'required:mh_journals',
                'seo' => 'required:mh_journals',
                'shortDescription' => 'required:mh_journals',
                // 'leftimage' => 'required:mh_journals',
                // 'detailimage' => 'required:mh_journals',
                // 'bannerImage' => 'required:mh_journals',
            ],

            [
                'name.required' => 'please specify journal name',
                'journalHomePage.required' => 'please specify journalHomePage name',
                'seo.required' => 'please specify seo name',
                'shortDescription.required' => 'please specify shortDescription name',
                // 'leftimage.required' => 'please specify leftimage',
                // 'detailimage.required' => 'please specify detailimage',
                // 'bannerImage.required' => 'please specify bannerImage',
            ]
        );


        $journals  = mh_journals::find($id);
        $journals->update([
            'name' => request()->get('name'),
            'shortname' => request()->get('shortname'),
            'journalHomePage' => request()->get('journalHomePage'),
            'seo' => request()->get('seo'),
            'shortDescription' => request()->get('shortDescription'),
        ]);

        if (request()->hasFile('leftimage')) {

            // if (!is_dir(public_path('images/journals/leftimage'))) {
            //     mkdir(public_path('images/journals/leftimage'), 0777, true);
            // }
            $filename = $journals->id . '-' . request()->file('leftimage')->getClientOriginalName();

            $store = request()->file('leftimage')->storeAs('journals/leftimage', $filename, 'public');

            $journals->update([
                'leftimage' => $filename
            ]);
        }

        //dd('uploaded');

        // if (request()->hasFile('detailimage')) {

        //     if (!is_dir(public_path('storage/images/journals/detailimage'))) {
        //         mkdir(public_path('storage/images/journals/detailimage'), 0775, true);
        //     }

        //     $filename = $journals->id . '-' . request()->file('detailimage')->getClientOriginalName();

        //     request()->file('detailimage')->storeAs('storage/images/journals/detailimage', $filename, 'public');

        //     $journals->update([

        //         'detailimage' => $filename

        //     ]);
        // }


        if (request()->hasFile('bannerImage')) {
            // if (!is_dir(public_path('images/journals/bannerImage'))) {
            //     mkdir(public_path('images/journals/bannerImage'), 0777, true);
            // }
            $filename = $journals->id . '-' . request()->file('bannerImage')->getClientOriginalName();
            request()->file('bannerImage')->storeAs('journals/bannerImage', $filename, 'public');
            $journals->update([
                'bannerImage' => $filename
            ]);
        }


        return redirect()->route('journals.index')
            ->with('success', 'Edit Journals Successfully!');
    }


    public function destroy($id)
    {

        $journals = mh_journals::find($id);

        $journals->delete();

        return redirect()->route('journals.index')

            ->with('success', 'Journal deleted Successfully!');
    }
}
