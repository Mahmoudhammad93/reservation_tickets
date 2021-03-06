<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    //
    protected $table='educational';

    protected $fillable = [
        'name',
        'faculty',
        'form',
        'to',
        'user_id',
        'university',
        'description',
    ];
}
