<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index():View{
        $doc= Document::find(10);
        dump($doc->haspermission(2));
        \dump($doc->permissionForUser(2));
        
        return view('homepage');    
    }
   
}
