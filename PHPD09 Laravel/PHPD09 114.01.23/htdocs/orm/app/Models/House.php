<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class House extends Model
{
    protected $table = 'house';
    protected $primaryKey = 'hid';
    protected $keyType = 'int';
    public $timestamps = false;

    function bills(): HasManyThrough{
        return $this->hasManyThrough(
        Bill::class,
        Phone::class,
        'hid', // phone.hid
        'tel', // bill.tel
        'hid', // house.hid
        'tel'  // phone.tel 
        );
    }
}
