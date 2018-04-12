<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as User;
use App\user_service as user_service;
use Session;
class UserController extends Controller
{
    //

    public function update(Request $request, User $user)
    {

    	
        if($request->isMethod('post'))
        {
        	 $this->validate(
                $request,
                [
                    'fname' => 'required|string|max:255',
                    'lname' => 'required|string|max:255'
                    
                ]

            );
        	 Session::flash('status','Information successfully Updated..');
            $user::where('id', $request->id)
          	->update(['fname' => $request->fname,'lname'=> $request->lname,'address'=> $request->address,'tal'=>$request->tal,'dist'=>$request->dist]);
        }
    }

    public function servicesupdate(Request $request , user_service $user_service)
    {
       if($request->isMethod('post'))
        {
           $user_service::where('user_id', $request->id)
            ->update(['business' => $request->business,'personal'=> $request->personal,'education'=> $request->education,'hotels'=>$request->hotels,'healthcare'=>$request->healthcare,'financial'=>$request->financial,'beauty'=>$request->beauty,'real_estate'=>$request->real_estate,'events'=>$request->events,'services'=>$request->services,'agriculture'=>$request->agriculture,'food'=>$request->food,'auto'=>$request->auto]); 
        } 
    }

    public function servicesadd(Request $request , user_service $user_service)
    {
        if($request->isMethod('post'))
        {
          $user_service->user_id = $request->id;
           $user_service->business =  $request->business;
           $user_service->personal  =  $request->personal;
           $user_service->education  =  $request->education;
           $user_service->hotels  = $request->hotels;
           $user_service->healthcare  = $request->healthcare;
           $user_service->financial  = $request->financial;
           $user_service->beauty = $request->beauty;
           $user_service->real_estate  = $request->real_estate;
           $user_service->events  = $request->events;
           $user_service->services  = $request->services;
           $user_service->agriculture  = $request->agriculture;
           $user_service->food  = $request->food;
           $user_service->auto  = $request->auto;

            $user_service->save();
        }  
    }
}











