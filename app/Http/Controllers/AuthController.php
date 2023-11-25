<?php

namespace App\Http\Controllers;

use App\Http\Requests\logFilterRequest;
use App\Http\Requests\LoginFilterRequest;
use App\Http\Requests\UsFilterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(){
             return view('login');
    }

 
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect()->route('login-page')->with('out', 'vous etes deconnecte');
    }

    public function loginAction(LoginFilterRequest $request){
        $reponse = Auth::attempt($request->validated());
                if ($reponse == true) {
                    $request->session()->regenerate();
                    return redirect()->route('homepage');
                }
                return redirect()->route('login-page')->withErrors(['failed' => 'email ou password incorrect']);


    }
}
