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
        $data = Ticket::where('user_id',auth()->user()->id)
        ->join('users','users.id','tickets.user_id')
        ->select('users.first_name as f_name','users.last_name as l_name','tickets.name','tickets.deadline','tickets.id')
        ->where('tickets.deadline','>=', date('Y-m-d'))
        ->get();
        // return date('Y-m-d');
        $permissions = Permission::where('User_id',auth()->user()->id)->get();
        return view('admin.tickets.index',compact('data','permissions'));
    }

    public function create(){
        $users = User::all();
        return view('admin.tickets.create',compact('users'));
    }

    public function store(Request $request){
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
}
