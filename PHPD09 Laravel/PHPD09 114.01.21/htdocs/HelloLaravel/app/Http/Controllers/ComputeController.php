<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MyModel;
class ComputeController extends Controller
{
    private $model;
    function __construct() {
        $this->model = new UserModel();
    }
    function __invoke(Request $request) {
    $account = $request->account;
    $result = $this->model->$account;

    return view('UserSubmit') 
        -> with('result', $result);
    }
}
