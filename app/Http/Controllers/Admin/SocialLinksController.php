<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\mh_socialpages;
use Illuminate\Http\Request;


class SocialLinksController extends Controller
{





  public function index()
  {

    $socialLinks = mh_socialpages::where('id', '1')->get();
    //  dd($socialLinks);
    $count = count($socialLinks);
    //dd($count);
    if ($count > 0) {
      $socialLinks = $socialLinks[0];
      return view('admin.sociallinks.edit', compact('socialLinks'));
    } else {
      $socialLinks = null;
      return view('admin.sociallinks.add');
    }
  }




  public function store(Request $request)
  {
    $request->validate(
      [

        'facebook' => 'required:mh_socialpages',

        'twitter' => 'required:mh_socialpages',

        'linkedin' => 'required:mh_socialpages',

        'googleplus' => 'required:mh_socialpages',

        'wikipedia' => 'required:mh_socialpages',

        'youtube' => 'required:mh_socialpages',

        'podcast' => 'required:mh_socialpages',

        'rss' => 'required:mh_socialpages',

      ],

      [

        'facebook.required' => 'please specify Facebook link',

        'twitter.required' => 'please specify Twitter link',

        'linkedin.required' => 'please specify LinkedIn link',

        'googleplus.required' => 'please specify Google Plus link',

        'wikipedia.required' => 'please specify Wikipedia',

        'youtube.required' => 'please specify Youtube link',

        'podcast.required' => 'please specify PodCast link',

        'rss.required' => 'please specify Rss link',


      ]
    );

    mh_socialpages::updateOrCreate(
      ['id' => $request->id],

      [
        'facebook' => $request->facebook,
        'twitter' => $request->twitter,

        'linkedin' => $request->linkedin,


        'googleplus' => $request->googleplus,

        'wikipedia' => $request->wikipedia,

        'youtube' => $request->youtube,

        'podcast' => $request->podcast,

        'rss' => $request->rss,

      ]
    );



    return  redirect()->to('admin/sociallinks')
    
    ->with('message', 'Add Social Links Successfully.');
  }





  public function update(Request $request)
  {
    




   // dd($request);

    $request->validate(
      [

        'facebook' => 'required:mh_socialpages',

        'twitter' => 'required:mh_socialpages',

        'linkedin' => 'required:mh_socialpages',

        'googleplus' => 'required:mh_socialpages',

        'wikipedia' => 'required:mh_socialpages',

        'youtube' => 'required:mh_socialpages',

        'podcast' => 'required:mh_socialpages',

        'rss' => 'required:mh_socialpages',

      ],

      [

        'facebook.required' => 'please specify Facebook link',

        'twitter.required' => 'please specify Twitter link',

        'linkedin.required' => 'please specify LinkedIn link',

        'googleplus.required' => 'please specify Google Plus link',

        'wikipedia.required' => 'please specify Wikipedia',

        'youtube.required' => 'please specify Youtube link',

        'podcast.required' => 'please specify PodCast link',

        'rss.required' => 'please specify Rss link',


      ]
    );




    $mh_socialpages = mh_socialpages::find(1);
    
    $mh_socialpages->update([

      'facebook' => $request->facebook,

      'twitter' => $request->twitter,

      'linkedin' => $request->linkedin,


      'googleplus' => $request->googleplus,

      'wikipedia' => $request->wikipedia,

      'youtube' => $request->youtube,

      'podcast' => $request->podcast,

      'rss' => $request->rss,
  

    ]);

    return  redirect()->to('admin/sociallinks')

    ->with('message', 'Update Social Links Successfully.');


  }
}
