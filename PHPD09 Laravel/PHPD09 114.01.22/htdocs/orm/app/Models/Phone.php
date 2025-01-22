<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $table = 'phone';
    protected $primaryKey = 'tel';
    protected $keyType = 'string';
    public $timestamps = false;

}
