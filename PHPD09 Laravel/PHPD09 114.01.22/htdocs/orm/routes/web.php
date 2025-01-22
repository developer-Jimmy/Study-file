<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\userinfo;
use App\Models\House;

Route::view('/form', 'form');
Route::post('/form', FormController::class);
Route::get('/myerror', function() {
    return "ERROR";
});
Route::get('/photo', function() {
    // $filename = 'documents/D9nG2S4yIsWfGamuhTol5pxVLhpYmxMdOtM7z51X.jpg'
    // $mimeType = Storage::mimeType($filename);
    $data = Storage::get('documents/D9nG2S4yIsWfGamuhTol5pxVLhpYmxMdOtM7z51X.jpg');
    return response($data)->header('content-type', '$mimeType');
});

Route::get('/bill', function() {
    $house = House::find(1);
    $sum = 0;
    foreach($house->bills as $bill) {
        print($bill->fee . '<br/>');
        $sum += $bill->fee;
    }
    print("總計 ${sum}");
});

Route::get('/userinfo', function() {
    $users = userinfo::where('uid', 'A01')->get();
    foreach($users as $user) {
        print($user->cname . '<br>');
        $lives = $user->lives;
        foreach($lives as $house) {
            print($house->address . '<br/>');
           
            }
        }
    }
);
Route::get('/live', function() {
    $user = userinfo::find('A01');
    $house = house::find(4);
    $user->lives()->save($house);
    print('OK');
});
Route::get('/insert', function() {
    $user = new userinfo;
    $user->uid = 'A07';
    $user->cname = '陳小美';
    $user->save();
    print('OK');
});
Route::get('/update', function() {
    $user =userinfo::find('A07');
    $user->cname = '陳美美';
    $user->save();
    print('OK');
});
Route::get('/delete', function() {
    $user = userinfo::find('A07');
    $user->delete();
});

Route::get('/', function () {
    $users = DB::table('userinfo')
        ->leftJoin('Live', 'userinfo.uid', '=', 'Live.uid')
        ->leftJoin('House', 'Live.hid', '=', 'house.hid')
        ->where('userinfo.uid', 'A06')
        ->orderBy('userinfo.uid', 'desc')
        ->get()
        ->dump();

    print('<pre>');
    print_r($users);
    print('</pre>');
    // foreach($users as $user) {
        // print($user->cname . '<br>');
    // }
});
