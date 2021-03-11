<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Ticket;
use App\Permission;

class TicketsController extends Controller
{
    //
    public function index(){
        if(auth()->user()->type == 'user'){
            $data = Ticket::where('user_id',auth()->user()->id)
            ->join('users','users.id','tickets.user_id')
            ->select('users.first_name as f_name','users.last_name as l_name','tickets.name','tickets.deadline','tickets.id')
            ->where('tickets.deadline','>=', date('Y-m-d'))
            ->get();
            // return date('Y-m-d');
            $permissions = Permission::where('User_id',auth()->user()->id)->get();
        }else{
            $data = Ticket::join('users','users.id','tickets.user_id')
            ->select('users.first_name as f_name','users.last_name as l_name','tickets.name','tickets.deadline','tickets.id')
            ->where('tickets.deadline','>=', date('Y-m-d'))
            ->get();
            // return date('Y-m-d');
            $permissions = Permission::where('User_id',auth()->user()->id)->get();
        }

        // $data['permissions'] = $permissions;
        // return response()->json($data);
        // return response()->json(['data'=>$data,'permissions'=>$permissions]);
        return view('admin.tickets.index',compact('data','permissions'));
    }

    public function create(){
        $users = User::all();
        return view('admin.tickets.create',compact('users'));
    }

    public function store(Request $request){
        // return $request;
        $row = Ticket::create([
            'name' => $request['name'],
            'deadline' => $request['end_date'],
            'user_id' => $request['user_id']
        ]);
        $row->save();
    }

    public function view_ticket($id){
        $ticket = Ticket::find($id);
        return view('admin.tickets.details',compact('ticket'));
    }

    public function delete_ticket($id){
        $row = Ticket::find($id)->delete();
    }

    public function tickets_api($id){
        header("Access-Control-Allow-Origin: *");
        $user = User::where('id', $id)->first();
        if($user->type == 'user'){
            $data = Ticket::where('user_id',$id)
            ->join('users','users.id','tickets.user_id')
            ->select('users.first_name as f_name','users.last_name as l_name','tickets.name','tickets.deadline','tickets.id')
            ->where('tickets.deadline','>=', date('Y-m-d'))
            ->get();
            // return date('Y-m-d');
            $permissions = Permission::where('User_id',$id)->get();
        }else{
            $data = Ticket::join('users','users.id','tickets.user_id')
            ->select('users.first_name as f_name','users.last_name as l_name','tickets.name','tickets.deadline','tickets.id')
            ->where('tickets.deadline','>=', date('Y-m-d'))
            ->get();
            // return date('Y-m-d');
            $permissions = Permission::where('User_id',$id)->get();
        }


        return response()->json(['data'=> $data, 'permissions'=> $permissions]);
    }
}
