<?php

namespace App\Http\Controllers;

use App\Http\Requests\CatFilterRequest;
use App\Http\Requests\UsFilterRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function showSettings(){
        return \view('setting');
            
    }

    public function showSettingsUser(){
        $users=User::query()->orderBy('name','asc')->get();
        return view('users',compact('users'));
    }

    public function addUsAction(UsFilterRequest $request){
        User::create($request->validated());
        
        return \redirect()->route('setting-user-page')->with('success','User added successfully');
    }

    public function removeUsAction(int $id){
        User::destroy($id);
        
        return \redirect()->route('setting-user-page')->with('success','User deleted');
       }


    public function showSettingsCategory(){
        $categories = Category::all();
    
        return view('categories', compact('categories'));
    }

    public function addFormAction(CatFilterRequest $request){
    
        Category::create($request->validated());
        
        return \redirect()->route('setting-category-page')->with('success','Category added successfully');
    }

    public function removeCatAction(int $id){
     Category::destroy($id);
     
     return \redirect()->route('setting-category-page')->with('success','Category deleted');
    }
}
