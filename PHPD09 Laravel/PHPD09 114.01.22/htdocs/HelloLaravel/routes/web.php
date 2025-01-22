<?php

namespace App\Http\Controllers;
use App\Http\Controllers\UserSubmitController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Middleware\CheckNumber;

Route::get('/query/{uid?}', function($uid=1) {
    $users = DB::select('select * from userinfo where uid = ? or ?', [$uid, $uid]);
        $result = '';
    // foreach($users as $user) {
    //     $result = $result . $user->cname . '<br/>';
    // }
    return view('result')->with('users', $users);
});

Route::get('/querynew/{uid}', function($uid) {
    $cname = DB::scalar('select cname from userinfo where uid = ?', [$uid]);
    print($cname);
});


Route::get('/update/{uid}/{cname}', function($uid, $cname) {
    DB::update('update userinfo set cname = ? where uid = ?', [$cname, $uid]);
    return redirect('/querynew/' . $uid);
});
Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello/{name?}', function($name='World') {
    return "Hello {$name}!";
});

Route::get('/print', function() {
    print('hi');
});

Route::get('/{op}/{a}/{b}', function($op, $a, $b) {
    if($op == 'add'){
        return $a + $b;
    }
    if($op == 'sub') {
        return $a - $b;
    }
});
Route::get('/div/{a}/{b}', function($a, $b) {
    return $a / $b;
});
// Route::get('/compute', function() {
//     return view('compute')
//         ->with('a', '')
//         ->with('b', '');
// });

Route::view('/compute', 'compute', ['a'=>'', 'b'=>'', 'result'=>'']);
    
Route::post('/compute', [ComputeController::class, '__invoke'])
    ->middleware(CheckNumber::class);









Route::view('/UserSubmit', 'UserSubmit', ['account'=>'', 'result'=>'']);
  
Route::post('/UserSubmit', [UserSubmitController::class, 'checkAccount'])->name('user.checkAccount');
