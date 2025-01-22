<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
     // Define the table if it's not the default 'users'
     protected $table = 'userinfo';

     // Define the primary key if necessary
     protected $primaryKey = 'uid';
 
     // Define the fillable columns for mass assignment (if needed)
     protected $fillable = ['account', 'cname']; // Adjust as needed
}