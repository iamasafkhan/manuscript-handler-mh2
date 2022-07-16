<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\mh_areas_of_interest;
use App\Models\mh_areas_of_interest_selected;
use App\Models\mh_companies;
use App\Models\Mh_Countries;
use App\Models\mh_esubmit_profiles;
use App\Models\mh_journals;
use App\Models\MhCompanies;
use App\Models\MhEsubmitProfile;
use App\Models\MhJournals;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function show_register_form($company, $seo)
    {
        $companies = mh_companies::where('companySEOURL', $company)->first();
        $seos = mh_journals::where('seo', $seo)->first();

        $countries = Mh_Countries::all();

        $areaofinterset = mh_areas_of_interest::where('parentID', '=', 0)->get();
        //dd($areaofinterset);

        return view('frontend.register', compact('companies', 'seos','countries','areaofinterset'));
    }

    public function register(Request $request)
    {

        //dd($request);

        // request()->validate([
        //     'prefix' => 'required',
        //     'firstName' => 'required',
        //     //'middleName' => 'required',
        //     'lastName' => 'required',
        //     'primaryEmailAddress' => 'required|unique:mh_esubmit_profiles',
        //     'password' => 'required|min:6|confirmed',
        //     'password_confirmation' => 'required|min:6|'
        //     // 'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
        //     // 'password_confirmation' => 'min:6'
        // ],  [
        //         'prefix.required' => 'The prefix field is Required',
        //         'firstName.required' => 'Please enter your first',
        //         //'middleName.required' => 'Your middle Name is Required',
        //         'lastName.required' => 'Your last Name is Required',

        //         'primaryEmailAddress.required' => 'Email is required',
        //         //'primaryEmailAddress.unique' => 'This email already exists',
        //         'password.required' => 'Password is required',
        //         'password.min' => 'Min 6 characters',
        //         'password.confirmed' => 'Password and Confirm password should match!',
        //     ]
        // );



        $counter_check = mh_esubmit_profiles::where('primaryEmailAddress', request()->get('primaryEmailAddress'))
        ->where('companyID', request()->get('companyID'))
        ->where('journalID', request()->get('journalID'))
        ->where('userType', 'Author')
        ->count();

        //dd($counter_check);

        if($counter_check > 0)
        {
            return back()->with('message', 'This email is already registered, please try another.')->withInput();
        }
        else if($counter_check == 0)
        {
            $author = mh_esubmit_profiles::create([
                'companyID' => request()->get('companyID'),
                'journalID' => request()->get('journalID'),
                'prefixType' => request()->get('prefix'),
                'firstName' => request()->get('firstName'),
                'middleName' => request()->get('middleName'),
                'lastName' => request()->get('lastName'),
                'primaryEmailAddress' => request()->get('primaryEmailAddress'),
                'passWord' => bcrypt(request()->get('password')),
                'passWordVisible' => request()->get('password'),
                'institution' => request()->get('institution'),
                'department' => request()->get('department'),
                'address' => request()->get('address'),
                'postalCode' => request()->get('postal_code'),
                'city' => request()->get('city'),
                'country' => request()->get('country'),
                'contactNumber' => request()->get('contactNumber'),
            ]);

            $author_id = $author->id;
            //dd($author_id);

            if($author_id)
            {
                $selected_interest_array = request()->get('interest_selected');
                if($selected_interest_array != null)
                {
                    foreach($selected_interest_array as $interst)
                    {
                        $selected_int = mh_areas_of_interest_selected::create([
                            'classifyID' => $interst,
                            'profileID' => $author_id,
                        ]);
                    }
                }

            }
            // dd('finalizing' . $author_id);
        }



        $company = mh_companies::find(request()->get('companyID'));
        $seo = mh_journals::find(request()->get('journalID'));

        return redirect()->route('esubmit-login', [$company->companySEOURL, $seo->seo])->with('message', 'You are successfully registered, please check your email to activate your account.');
    }



    public function show_login($company, $seo)
    {


        $company = mh_companies::where('companySEOURL', $company)->first();
        $journal = mh_journals::where('seo', $seo)->first();

        return view('frontend.login', compact('company', 'journal'));
    }


    public function login()
    {
        //dd(request());
        request()->validate([
            'primaryEmailAddress' => 'required|email',
            'passWord' => 'required'
        ], [
            'primaryEmailAddress.required' => 'Enter email address please.',
            'primaryEmailAddress.email' => 'Invalid email address.',
            'passWord.required' => 'Enter password please.',
        ]);
        $email = request('primaryEmailAddress');
        $password = request('passWord');
        $journalID = request('journalID');
        $companyID = request('companyID');

        $user = mh_esubmit_profiles::where('primaryEmailAddress', $email)
        ->where('journalID', $journalID)
        ->where('companyID', $companyID)
        ->first();
         $company = mh_companies::where('id', $companyID)->first();
         $journal = mh_journals::where('id', $journalID)->first();

        //  dd($company);
        if (!$user) {
            return redirect()->back()->with(['message' => 'Invalid authentication informaiton. Please check your email address and try again with correct information or to obtain your correct password, please click on “Forgot Password.']);
        }

        if (!Hash::check($password, $user->passWord)) {
            return redirect()->back()->with(['message' => 'Your password is incorrect.']);
        }

        if($user->journalID == $journalID && $user->companyID == $companyID) {


            auth('profiles')->login($user);

            if ($user->userType == 'Author'  ) {

                 return redirect()->route('dashboard-home', [$company->companySEOURL, $journal->seo]);

            }

            elseif($user->userType == 'Reviewer')
            {
                return redirect()->to('reviewer');

            }

            elseif($user->userType == 'Editor')
            {
                return redirect()->route('editor-home', [$company->companySEOURL, $journal->seo]);

            }
            elseif($user->userType == 'Publisher')
            {
                return redirect()->to('publisher');

            }

            elseif($user->userType == 'AssociateEditor')
            {
                return redirect()->to('associateeditor');

            }


            elseif($user->userType == 'EditorialOffice')
            {
                return redirect()->route('editorial-home', [$company->companySEOURL, $journal->seo]);

            }

            else{


            }

            return redirect()->route('dashboard-home', [$company->companySEOURL, $journal->seo]);

            // return redirect()->to(url('/home', [$company->companySEOURL, $journal->seo]));

        } else {
            return redirect()->route('journals-using-mh')->with(['message' => 'Your selection is incorrect.']);
        }
    }


    public function logout()
    {
        auth()->logout();
        session()->invalidate();


        return redirect()->route('journals-using-mh');
    }
}
