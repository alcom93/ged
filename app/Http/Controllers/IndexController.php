<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index():View{
        $doc= Document::find(10);
        
        return view('homepage');    
    }
   
}
