<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Ticket::where('user_id',auth()->user()->id)
        ->join('users','users.id','tickets.user_id')
        ->select('users.first_name as f_name','users.last_name as l_name','tickets.name','tickets.deadline','tickets.id')
        ->where('tickets.deadline','>=', date('Y-m-d'))
        ->get();
        return view('home',compact('data'));
    }
}
