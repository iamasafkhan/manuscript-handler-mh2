<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\newseventsmanagment;
use Illuminate\Http\Request;

class NewsEventsManagmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $newseventsmanagment = newseventsmanagment::all();
          
        return view('admin.newseventsmanagment.home',compact('newseventsmanagment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.newseventsmanagment.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:mh_news',

            'description' => 'required:mh_news',
    
        ],
        
        [

          'title.required' => 'please specify Title',
          'title.unique' => 'This Title already exists',

          'description.required' => 'please specify some description',


        ]);
               
        $newseventsmanagment =  newseventsmanagment::updateOrCreate(
            ['id' => $request->id],
         
            ['title' => $request->title, 
            'description' => $request->description,
            ]);

         

        return  redirect()->to('admin/newseventsmanagment')
        ->with('status', 'News Add  Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     


        $newseventsmanagment = newseventsmanagment::find($id);

        return view('admin.newseventsmanagment.edit',compact('newseventsmanagment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
               
        $request->validate([

            'title' => 'required:mh_newseventsmanagment',
            'description' => 'required:newseventsmanagment',
       
        ],
        
        [

          'title.required' => 'please specify Tittle',
          'description.required' => 'please specify some description',
        ]);


        $newseventsmanagment = newseventsmanagment::find($id);

        $newseventsmanagment ->update([
            'title' => request()->get('title'),
            'description' => request()->get('description')

        ]);

        return redirect()->to('admin/newseventsmanagment')
        ->with('success', 'News Edit successfully!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $newseventsmanagment = newseventsmanagment::find($id);
        $newseventsmanagment->delete();
        return redirect()->route('newseventsmanagment.index') 
         ->with('status', 'News delete Successfully!');
    }
}
