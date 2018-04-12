<?php

namespace App\Http\Controllers;
use App;
use App\User;
use App\user_service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->admin)
        {
            return view('Admin.admin');
        }
        else
        {
            $userid = Auth::user()->id;
            $userservices = App\user_service::where('user_id',$userid)->first();

            return view('home',compact('userservices'));   
        }
           

    }

}
