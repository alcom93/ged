<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsFilterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class usersController extends Controller
{

    public function user(Request $request)
    {
        $users = User::all();
        return view('users', compact('users'));
    }


    public function storeUser(UsFilterRequest $request)
    {

        $validatedData = $request->validated();

        User::create($validatedData);

        return redirect()->route('users')->with('success', 'User added successfully.');
    }
}
