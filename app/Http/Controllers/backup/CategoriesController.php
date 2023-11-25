<?php

namespace App\Http\Controllers;

use App\Http\Requests\CatFilterRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class categoriesController extends Controller
{
    

    // public function category()
    // {
    //     $categories = Category::all();
    //     return view('categories', compact('categories'));
    // }


    // public function storeCategory(CatFilterRequest $request)
    // {
    //     $validatedData = $request->validated();

    //     Category::create($validatedData);

    //     return redirect()->route('homepage')->with('success', 'Category added successfully.');
    // }
}
