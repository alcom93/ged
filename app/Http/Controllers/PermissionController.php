<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionFilterRequest;
use App\Models\DocumentUserPermission;

class PermissionController extends Controller
{
    public function addPermAction(PermissionFilterRequest $request)
    {
        $validatedData = $request->validated();
        DocumentUserPermission::create($validatedData);
        return \redirect()->route('show-doc-page',['id'=>$validatedData["document_id"]])->with('success', 'Permission with user added successfully');
    }
}
