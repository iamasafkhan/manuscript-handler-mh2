<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\mh_pagecontent;
use Illuminate\Http\Request;


use Illuminate\Support\Str;

class ContentManagementController extends Controller
{



    public function index()
    {
        $pagecontent = mh_pagecontent::all();

        return view('admin.contentManagement.home', compact('pagecontent'));
    }

    

    public function create()
    {
        return view('admin.contentManagement.add');
    }

   


    public function store(Request $request)
    {

        
        $request->validate(
            [

               'page_title' => 'required:mh_pagecontent',

                'page_heading' => 'required:mh_pagecontent',

                'page_type' => 'required:mh_pagecontent',

                'meta_keyword' => 'required:mh_pagecontent',

                'meta_phrase' => 'required:mh_pagecontent',

                'meta_description' => 'required:mh_pagecontent',


            ],

            [

                'page_title.required' => 'please specify page title ',

                'page_heading.required' => 'please specify page heading ',

                'page_type.required' => 'please specify meta keyword  ',

                'meta_keyword.required' => 'please specify meta keyword  ',

                'meta_phrase.required' => 'please specify meta phrase ',

                'meta_description.required' => 'please specify  description ',



            ]
        );


        $mh_pagecontent =  mh_pagecontent::create([

            'id' => request('id'),

            'page_title' => request('page_title'),

            'page_heading' => request('page_heading'),

            'page_url' => Str::slug(request('page_title', '-')),

            'page_type' => request('page_type'),

            'meta_keyword' => request('meta_keyword'),

            'meta_phrase' => request('meta_phrase'),

            'meta_description' => request('meta_description'),

        ]);



        return redirect()->to('admin/contentmanagement')

            ->with('success', 'Add Content Successfully.');
    }

   
    public function show($id)
    {
        
    }

  
    public function edit($id)
    {

        $contentmanagement = mh_pagecontent::find($id);

        return view('admin.contentManagement.edit', compact('contentmanagement'));
    }

    
    public function update(Request $request, $id)
    {

        //dd($request);

        $request->validate(
            [

                'page_title' => 'required:mh_pagecontent',

                'page_heading' => 'required:mh_pagecontent',

                'page_type' => 'required:mh_pagecontent',

                

                'meta_keyword' => 'required:mh_pagecontent',

                'meta_phrase' => 'required:mh_pagecontent',

                'meta_description' => 'required:mh_pagecontent',


            ],

            [

                'page_title.required' => 'please specify page title ',

                'page_heading.required' => 'please specify page heading ',

                'page_type.required' => 'please specify meta keyword  ',

                'meta_keyword.required' => 'please specify meta keyword  ',

                'meta_phrase.required' => 'please specify meta phrase ',

                'meta_description.required' => 'please specify  description ',

            ]
        );

        $mh_pagecontent =  mh_pagecontent::create([

            'id' => request('id'),

            'page_title' => request('page_title'),

            'page_heading' => request('page_heading'),

            'page_url' => Str::slug(request('page_title', '-')),

            'page_type' => request('page_type'),

            'meta_keyword' => request('meta_keyword'),

            'meta_phrase' => request('meta_phrase'),

            'meta_description' => request('meta_description'),

        ]);



        return redirect()->to('admin/contentmanagement')

            ->with('success', 'Update Content  Successfully.');
    }

    
    public function destroy($id)
    {
        $mh_pagecontent = mh_pagecontent::find($id);

        $mh_pagecontent->delete();


        return redirect()->to('admin/contentmanagement')

            ->with('success', 'Delete Content Successfully.');
    }



    public function active()
    {

        $pagecontent = mh_pagecontent::find(request('id'));

        $pagecontent->update(['status' => 1]);

        return  redirect()->to('admin/contentmanagement');

    }



    public function unactive()
    {
        $pagecontent = mh_pagecontent::find(request('id'));

        $pagecontent->update(['status' => 0]);

        return  redirect()->to('admin/contentmanagement');
  
    }



}
