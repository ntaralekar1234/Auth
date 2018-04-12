<?php

namespace App\Http\Controllers;
use App;
use App\User;
use App\user_service;
use Illuminate\Http\Request;
use Mail;
use App\Mail\UserAdvertiseEmail;

class AdminController extends Controller
{
    public function advertise()
    {
    	return view('Admin.advertise');
    }

    public function getusers($category)
    {
    	
    	$user = App\user_service::where($category, 1)->get();

    	return count($user);
    }

    public function sendAd(Request $request)
    {
      $user = App\user_service::where($request['category'], 1)->get();
      foreach ($user as $u)
        {
          $users = App\user_service::find($u->id)->user;
           
          Mail::to($users->email)->send(new UserAdvertiseEmail($request['message']));



        }


    }
}
