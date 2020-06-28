<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    protected $table = 'address';
    protected $fillable = [
        'street',
        'city',
        'province',
        'cap',
        'user_id',
    ];

}