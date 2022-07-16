<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\mh_demorequests;
use Illuminate\Http\Request;

class DemoRequestsController extends Controller
{
    


    public function index()
    {
        $demorequests = mh_demorequests::all();

        return view('admin.demorequest.home',compact('demorequests'));
    }



}
