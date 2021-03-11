<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //
    protected $fillable=['name','user_id','deadline'];

    public function permissions(){
        return $this->hasMany('App\Permission','permission_id');
    }

    public function categories(){
        return $this->hasMany('App\Category','permission_id');
    }
}
