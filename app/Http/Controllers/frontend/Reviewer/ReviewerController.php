<?php

namespace App\Http\Controllers\Frontend\Reviewer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewerController extends Controller
{
    //

    public function index()
    {
        
        return view('frontend.reviewer.home');
    }


}
