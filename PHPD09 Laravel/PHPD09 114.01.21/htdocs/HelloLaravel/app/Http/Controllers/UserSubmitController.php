<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
class UserSubmitController extends Controller
{
    public function checkAccount(Request $request)
    {
        // Get the account from the form input
        $account = $request->input('account');

        // Query the database to check if the account exists
        $user = UserModel::where('account', $account)->first(); // Assuming 'account' is the column name

        // Prepare the result based on the account check
        if ($user) {
            // Account found, return a success message or user data
            $result = "歡迎, " . $user->cname; // Assuming you have a 'name' column in your 'users' table
        } else {
            // Account not found
            $result = "這個帳號不存在。";
        }

        // Return the view with the result
        return view('UserSubmit', compact('account', 'result'));
    }
}
