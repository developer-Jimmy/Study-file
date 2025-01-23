<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MyRequest;

class FormController extends Controller
{
    function __invoke(Request $request) {
        // $uid  =$request->uid;
        // print($uid);
        if ($request->hasFile('photo')) {
            $photo = $request->photo;
            // $photo->store('documents');
            $photo->storeAs('documents', $photo->hashName());
            print($photo->getClientOriginalName());
        }else {
            print('no file upload');
        }
    }
}
