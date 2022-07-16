<?php

namespace App\Http\Controllers\frontend\Publisher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    
    public function index()
    {
        return view('frontend.publisher.home');
    }

}
