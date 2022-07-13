<?php

namespace App\Http\Controllers\frontend\AssociateEditor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AssociateEditorController extends Controller
{
    
    public function index()
    {

   

        return view('frontend.assocateeditor.home');
    }

}
