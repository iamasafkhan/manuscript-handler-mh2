<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\mh_companies;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{



    public function companies()
    {

        $companies = mh_companies::all();

        return view('admin.companies.home', compact('companies'));
    }



    public function companiescreate()
    {

        return view('admin.companies.add');
    }




    public function companiesstore(Request $request)
    {

       // dd($request);

        $request->validate(
            [

                'companyName' => 'required|unique:mh_companies',

                'companyShortName' => 'required:mh_companies',

                'companySEOURL' => 'required|unique:mh_companies',

                'companyEmailAddress' => 'required|unique:mh_companies',

                'companyPhoneNumber' => 'required|unique:mh_companies',

                'companyLogo' => 'required:mh_companies',

                'companyWebsite' => 'required|unique:mh_companies',

                'companyAddress' => 'required:mh_companies',

                'companyDescription' => 'required:mh_companies',
            ],

            [

                'companyName.required' => 'please specify Company name',
                'companyName.unique' => 'Comapany name already  exists ',

                'companyShortName.required' => 'please specify Company Short Name',

                'companySEOURL.required' => 'please specify Company SEO URL',
                'companySEOURL.unique' => 'Company SEO URL already  exists ',



                'companyEmailAddress.required' => 'please specify Company Email Address',
                'companyEmailAddress.unique' => 'Company Email Address already  exists ',



                'companyPhoneNumber.required' => 'please specify Company Phone Number',
                'companyPhoneNumber.unique' => 'Company Phone Number already  exists ',



                'companyWebsite.required' => 'please specify Company Website',
                'companyWebsite.unique' => 'Company Website already  exists ',


                'companyAddress.required' => 'please specify Company Address',

                'companyLogo.required' => 'please select Company Logo',




                'companyDescription.required' => 'please specify Company Description',

            ]
        );

        $companies =  mh_companies::updateOrCreate(
            ['id' => $request->id],

            [
                'companyName' => $request->companyName,
                'companyShortName' => $request->companyShortName,
                'companyName' => $request->companyName,
                'companySEOURL' => $request->companySEOURL,
                'companyEmailAddress' => $request->companyEmailAddress,
                'companyPhoneNumber' => $request->companyPhoneNumber,
                'companyWebsite' => $request->companyWebsite,
                'companyAddress' => $request->companyAddress,
                'companyDescription' => $request->companyDescription,
                'companyLogo' => $request->companyLogo,
            ]
        );


        if (request()->hasFile('companyLogo')) {

            $filename = $companies->id . '-' . request()->file('companyLogo')->getClientOriginalName();

            request()->file('companyLogo')->storeAs('images/companyLogo', $filename, 'public');

            $companies->update([

                'companyLogo' => $filename

            ]);
        }


        return  redirect()->to('admin/companies')
            ->with('success', 'Add Companies Successfully.');
    }





    public function companiesedit($id)
    {
        
        $companies = mh_companies::find($id);

        return view('admin.companies.edit',compact('companies'));


    }



    public function companiesupdate(Request $request)
    {

        $request->validate(
            [

                'companyName' => 'required:mh_companies',

                'companyShortName' => 'required:mh_companies',

                'companySEOURL' => 'required:mh_companies',

                'companyEmailAddress' => 'required:mh_companies',

                'companyPhoneNumber' => 'required:mh_companies',

                'companyLogo' => 'required:mh_companies',

                'companyWebsite' => 'required:mh_companies',

                'companyAddress' => 'required:mh_companies',

                'companyDescription' => 'required:mh_companies',
            ],

            [

                'companyName.required' => 'please specify Company name',
        
                'companyShortName.required' => 'please specify Company Short Name',

                'companySEOURL.required' => 'please specify Company SEO URL',
         
                'companyEmailAddress.required' => 'please specify Company Email Address',
           
                'companyPhoneNumber.required' => 'please specify Company Phone Number',
              
                'companyWebsite.required' => 'please specify Company Website',
        
                'companyAddress.required' => 'please specify Company Address',

                'companyLogo.required' => 'please select Company Logo',

                'companyDescription.required' => 'please specify Company Description',

            ]
        );


        $companies =  mh_companies::updateOrCreate(
            ['id' => $request->id],

            [
                'companyName' => $request->companyName,
                'companyShortName' => $request->companyShortName,
                'companyName' => $request->companyName,
                'companySEOURL' => $request->companySEOURL,
                'companyEmailAddress' => $request->companyEmailAddress,
                'companyPhoneNumber' => $request->companyPhoneNumber,
                'companyWebsite' => $request->companyWebsite,
                'companyAddress' => $request->companyAddress,
                'companyDescription' => $request->companyDescription,

                'companyLogo' => $request->companyLogo,
            ]
        );


        if (request()->hasFile('companyLogo')) {

            $filename = $companies->id . '-' . request()->file('companyLogo')->getClientOriginalName();

            request()->file('companyLogo')->storeAs('images/companyLogo', $filename, 'public');

            $companies->update([

                'companyLogo' => $filename

            ]);
        }


        return  redirect()->to('admin/companies')
            ->with('success', 'Update Companies Successfully.');
    }





    public function companiesdestroy($id)
    {
        $companies = mh_companies::find($id);
        $companies->delete();
        return  redirect()->to('admin/companies')
            ->with('success', 'Companies Delete  Successfully.');
    }
}
