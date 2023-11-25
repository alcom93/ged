<?php

namespace App\Http\Controllers;


use App\Http\Requests\DocFilterRequest;

use App\Models\Category;
use App\Models\Document;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class documentsController extends Controller
{
    public function showAll(Request $request): View
    {

        $query = Document::query();


        if ($request->input('category') != \null) {
            $query
                ->where('category_id', $request->input('category'));
        }

        if ($request->input('access') != \null) {
            $query
                ->where('access', $request->input('access'));
        }

        if ($request->input('owner') != \null) {
            $query
                ->where('created_by', $request->input('owner'));
        }
        $document = $query->get();


        $categories = Category::all();
        $users = User::all(['id', 'name']);

        return view('documents', [
            'list' => $document,
            'categories' => $categories,
            'users' => $users
        ]);
    }

    public function show(int $id): View
    {
        $d = Document::find($id);
        $u = $d->usersPermissions()->get();
        $users = User::all(['id', 'name']);

        //\dump($u->toArray());
        return view('detailDoc', [
            'detail' => $d,
            'usersPermissions' => $u,
            'users' => $users,
        ]);
    }

    public function showForm()
    {
        $categories = Category::all();
        //  return view('addDocuments', compact('categories'));
        return \view('addDocuments', ['categories' => $categories]);
    }

    public function addFormAction(DocFilterRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['created_by'] = Auth::user()->id;
        //$validatedData['created_by'] = 1;

        if ($request->file('file') !== null) {

            $file = $request->file('file');
            $path = $file->store("users/" . Auth::user()->name,);
            // $path = $file->store("users/ritz");
            $validatedData['path'] = $path;
        }
        Document::create($validatedData);
        return redirect()->route('add-form-doc-page')->with('success', 'Document added successfully.');
    }

    public function removeAction(int $id)
    {
        $oldDoc = Document::find($id);
        $oldPath = $oldDoc->name;
        Storage::delete($oldPath);
        Document::destroy($id);
        return \redirect()->route('all-docs-page')->with('success', 'Document deleted.');
    }




    // public function hp()
    // {


    //     return view('homepage', []);
    // }




    // public function doc()
    // {
    //     return view('documents', ['title' => 'documents page', 'list' => Document::with('category', 'createdBy')->get()]);
    // }



    // public function storeDocument(DocFilterRequest $request)
    // {

    //     $validatedData = $request->validated();
    //     $validatedData['created_by'] = Auth::user()->id;

    //     if ($request->file('file') !== null) {

    //         $file = $request->file('file');
    //         $path = $file->store("users/" . Auth::user()->name, "public");
    //         $validatedData['name'] = $path;
    //     }
    //     Document::create($validatedData);
    //     return redirect()->route('homepage')->with('success', 'Document added successfully.');
    // }



    // public function log()
    // {
    //     return view('login');
    // }


    // public function authLogin(Request $request)
    // {

    //     $reponse = Auth::attempt([
    //         'email' => request('email'),
    //         'password' => request('password')
    //     ]);
    //     if ($reponse == true) {
    //         $request->session()->regenerate();
    //         return redirect()->route('homepage');
    //     }
    //     return redirect()->route('login')->withErrors(['failed' => 'email ou password incorrect']);
    // }


    // public function logout(Request $request)
    // {
    //     Auth::logout();
    //     $request->session()->invalidate();

    //     $request->session()->regenerateToken();
    //     return redirect()->route('homepage')->with('out', 'vous etes deconnecte');
    // }




    // public function add()
    // {
    //     $categories = Category::all();
    //     return view('addDocuments', compact('categories'));
    // }


    // public function setting()
    // {
    //     return view('setting');
    // }
}
