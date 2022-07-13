<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    
    use AuthenticatesUsers;


    public function adminhome()
    {
        return view('admin.home');
    }




    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if(Auth::guard('admin')->attempt($credentials, $request->remember)){
            $user = Admin::where('email', $request->email)->first();
            Auth::guard('admin')->login($user);
            return redirect()->route('admin.home');
        }
        return redirect()->route('admin.home')->with('status', 'Failed To Process Login');

    }

 

    public function logout()
    {
        auth()->logout();
        session()->invalidate();
        return redirect()->route('admin.login');
    }




    protected function loggedOut(Request $request)
    {
        return redirect()->route('admin.login');
    }





    protected function guard(){
        return Auth::guard('admin');
    }

  


    public function admin_dashboard(Request $request)
    {
        return view('admin.profile.admin_dashboard');
    }


    public function inbox_email()
    {
        return view('admin.profile.inbox_email');
    }


  
}
