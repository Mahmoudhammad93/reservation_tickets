<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
use App\UserPermission;

class PermissionsController extends Controller
{
    //
    public function create($id){
        return view('admin.permission.create',compact('id'));
    }

    public function store(Request $request){
        // return $request;
        $row = new Permission;
        $row->name = $request['permission']['name'];
        $row->user_id = $request['user_id'];
        $row->save();
    }

    public function permissions($id){
        $permissions = UserPermission::where('user_id',$id)->get();
        return $permissions;
    }
}
