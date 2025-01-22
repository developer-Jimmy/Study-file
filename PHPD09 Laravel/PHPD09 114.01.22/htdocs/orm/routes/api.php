<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\userinfo;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/userinfo', function() {
    $users = userinfo::where('uid', 'like', 'A%')->get();
    $json = $users->toJson(JSON_UNESCAPED_UNICODE);
    return response($json)
        ->header('content-type', 'application/json');
        // ->header('charset', 'utf-8');
});

Route::post('/update', function(Request $request){
    $uid = $request->uid;
    $old = $request->old;
    $new = $request->new;
    $user = userinfo::find($uid);
    if(isset($user)) {
        if ($old == $user->password) {
            $user->password = $new;
            $user->save();
            return response(
                '{"ok":1}'   
            )->header('content-type', 'application/json');
        }
    }
    return response(
        '{"ok":0}'
    )->header('content-type', 'application/json'); 
});

Route::post('/checkAccount', function(Request $request){
    $uid = $request->uid;
    $userPwd = $request->userPwd;
    $user = userinfo::find($uid);
    if(isset($user)) {
        if ($userPwd === $user->password) {
            return response(
                '{"ok":1}'   
            )->header('content-type', 'application/json');
        }
    }
    return response(
        '{"ok":0}'
    )->header('content-type', 'application/json'); 
});