<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Permission;
use App\UserPermission;

class PermissionsController extends Controller
{
    //
    public function create($id){
        $categories = Category::all();
        // return $categories;
        return view('admin.permission.create',compact('id','categories'));
    }

    public function store(Request $request){
        // return $request;
        $row = new Permission;
        $category = Category::where('id',$request['permission']['id'])->first();
        $row->name = $category->name;
        $row->user_id = $request['user_id'];
        $row->permission_id = $category->id;
        $row->save();
    }

    public function permissions($id){
        $permissions = UserPermission::where('user_id',$id)->get();
        return $permissions;
    }
}
