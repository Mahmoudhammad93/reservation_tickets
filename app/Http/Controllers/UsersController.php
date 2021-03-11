<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Permission;
use App\Ticket;

class UsersController extends Controller
{
    //
    public function index(){
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    public function create(){
        return view('admin.users.create');
    }

    public function store(Request $request){
        // return $request;
        $user = new User;
        $user->first_name = $request['user']['first_name'];
        $user->last_name = $request['user']['last_name'];
        $user->email = $request['user']['email'];
        $user->address = $request['user']['address'];
        $user->phone = $request['user']['phone'];
        $user->image = 'default.png';
        $user->password = Hash::make($request['user']['password']);
        $user->type = $request['user']['type'];

        $user->save();

        if($request['user']['type'] == 'admin'){
            foreach($request['permissions'] as $permission){
                $permissions = new Permission;
                $permissions->name = $permission['name'];
                $permissions->user_id = $user->id;
                $permissions->create = 1;
                $permissions->edit = 1;
                $permissions->delete = 1;
                $permissions->open = 1;
                $permissions->close = 1;
                $permissions->save();
            }

        }else{
            foreach($request['permissions'] as $permission){
                $permissions = new Permission;
                $permissions->name = $permission['name'];
                $permissions->user_id = $user->id;
                $permissions->create = $permission['create'];
                $permissions->edit = $permission['edit'];
                $permissions->delete = $permission['delete'];
                $permissions->open = $permission['open'];
                $permissions->close = $permission['close'];
                $permissions->save();
            }
        }
    }

    public function edit_user($id){
        $flag = Permission::where('user_id',$id)->first();
        if($flag){
            $user = User::with('permissions')->find($id);
            $permissions = Permission::all();
            $permission_id = Ticket::where('user_id',$id)->first();
        }else{
            $user = User::find($id);
            $permissions = Permission::all();
            $permission_id = Ticket::where('user_id',$id)->first();
        }
        // return $permission_id;
        return view('admin.users.edit',compact('user','permissions','permission_id'));
    }

    public function update_user(Request $request, $id){
        // return $request;
        $user = User::find($id);
        $user->first_name = $request['user']['first_name'];
        $user->last_name = $request['user']['last_name'];
        $user->email = $request['user']['email'];
        $user->address = $request['user']['address'];
        $user->phone = $request['user']['phone'];
        $user->image = 'default.png';
        if(isset($request['user']['password'])){
            $user->password = Hash::make($request['user']['password']);
        }
        $user->type = $request['user']['type'];

        $user->save();

        $flag = Permission::where('user_id', $id)->get();
        // return count($flag);
        if(count($flag) > 0){
            if($request['user']['type'] == 'admin'){
                foreach($flag as $permission){
                    $permission->delete();
                }
                foreach($request['permissions'] as $permission){
                    $permissions = new Permission;
                    $permissions->name = $permission['name'];
                    $permissions->user_id = $user->id;
                    $permissions->create = 1;
                    $permissions->edit = 1;
                    $permissions->delete = 1;
                    $permissions->open = 1;
                    $permissions->close = 1;
                    $permissions->save();
                }
            }else{
                foreach($flag as $permission){
                    $permission->delete();
                }
                foreach($request['permissions'] as $permission){
                    $permissions = new Permission;
                    $permissions->name = $permission['name'];
                    $permissions->user_id = $user->id;
                    $permissions->create = $permission['create'];
                    $permissions->edit = $permission['edit'];
                    $permissions->delete = $permission['delete'];
                    $permissions->open = $permission['open'];
                    $permissions->close = $permission['close'];
                    $permissions->save();
                }
            }
        }else{
            if($request['user']['type'] == 'admin'){
                foreach($request['permissions'] as $permission){
                    $permissions = new Permission;
                    $permissions->name = $permission['name'];
                    $permissions->user_id = $user->id;
                    $permissions->create = 1;
                    $permissions->edit = 1;
                    $permissions->delete = 1;
                    $permissions->open = 1;
                    $permissions->close = 1;
                    $permissions->save();
                }
            }else{
                foreach($request['permissions'] as $permission){
                    $permissions = new Permission;
                    $permissions->name = $permission['name'];
                    $permissions->user_id = $user->id;
                    $permissions->create = $permission['create'];
                    $permissions->edit = $permission['edit'];
                    $permissions->delete = $permission['delete'];
                    $permissions->open = $permission['open'];
                    $permissions->close = $permission['close'];
                    $permissions->save();
                }
            }
        }
    }
}
