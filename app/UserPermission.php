<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    //
    protected $fillable=['name','user_id','permission_id','create','edit','delete','open','close'];
}
