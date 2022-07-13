<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\mh_journalpagecontent;
use App\Models\mh_journals;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function contentpages($id)
    {
        //dd($id);
        $journals = mh_journals::find($id);
        $contentpages = mh_journalpagecontent::select('*')
        ->where('journalID', '=', $id)
        ->get();
        
        return view('admin.journals.contentpages',compact('journals','contentpages'));
    }



    public function contentstore(Request $request)
    {

      

        $request->validate([

            'page_tab' => 'required:mh_journalpagecontent',

            'page_title' => 'required:mh_journalpagecontent',

            'page_heading' => 'required:mh_journalpagecontent',

            'page_url' => 'required:mh_journalpagecontent',

            'meta_keyword' => 'required:mh_journalpagecontent',

            'meta_phrase' => 'required:mh_journalpagecontent',

            'meta_description' => 'required:mh_journalpagecontent',

  
        ],
        
        [
  
          'page_tab.required' => 'please specify page tab ',

          'page_title.required' => 'please specify page title ',

          'page_heading.required' => 'please specify page heading ',

          'page_url.required' => 'please specify page url ',

          'meta_keyword.required' => 'please specify meta keyword  ',

          'meta_phrase.required' => 'please specify meta phrase ',

          'meta_description.required' => 'please specify meta description ',



        ]);
      


        $pagecontent =  mh_journalpagecontent::updateOrCreate(
            ['id' => $request->id],

            [
                'journalID' => $request->journalid,
                'page_tab' => $request->page_tab,
                'page_title' => $request->page_title,
                'page_heading' => $request->page_heading,
                'page_url' => $request->page_url,
                'meta_keyword' => $request->meta_keyword,
                'meta_phrase' => $request->meta_phrase,
                'meta_description' => $request->meta_description,

            ]
        );


           return redirect()->route('contentpages', $pagecontent->journalID) 
       
            ->with('success', 'Add Content Page Successfully.');
    }


    public function contentedit($id)
    {
        $pagecontent = mh_journalpagecontent::find($id); 
        return view('admin.journals.contentpagesedit', compact('pagecontent'));
    }



    public function contentupdate(Request $request)
    {

        


        $request->validate([

            'page_tab' => 'required:mh_journalpagecontent',

            'page_title' => 'required:mh_journalpagecontent',

            'page_heading' => 'required:mh_journalpagecontent',

            'page_url' => 'required:mh_journalpagecontent',

            'meta_keyword' => 'required:mh_journalpagecontent',

            'meta_phrase' => 'required:mh_journalpagecontent',

            'meta_description' => 'required:mh_journalpagecontent',

  
        ],
        
        [


            
          'page_tab.required' => 'please specify page tab ',

          'page_title.required' => 'please specify page title ',

          'page_heading.required' => 'please specify page heading ',

          'page_url.required' => 'please specify page url ',

          'meta_keyword.required' => 'please specify meta keyword  ',

          'meta_phrase.required' => 'please specify meta phrase ',

          'meta_description.required' => 'please specify meta description ',



        ]);

        $pagecontent =  mh_journalpagecontent::updateOrCreate(
            ['id' => $request->id],

            [
                'page_tab' => $request->page_tab,

                'page_title' => $request->page_title,

                'page_heading' => $request->page_heading,

                'page_url' => $request->page_url,

                'meta_keyword' => $request->meta_keyword,

                'meta_phrase' => $request->meta_phrase,

                'meta_description' => $request->meta_description,

            ]
        );


        return redirect()->route('contentpages', $pagecontent->journalID) 
       
        ->with('success', 'Update Content Page Successfully.');

    }




    public function contentdestroy($id)
    {

        
        $pagecontent = mh_journalpagecontent::find($id);

        $pagecontent->delete();


        
        return redirect()->route('contentpages', $pagecontent->journalID) 
       
        ->with('success', 'Delete Content Page Successfully.');
    }



}
