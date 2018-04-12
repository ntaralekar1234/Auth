<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Session;
class VerifyEmailController extends Controller
{
     /**
     * Verify the user with goven token
     *
     * @param  string  $token
     * @return Response
     */

    public function index($email,$token)
    {
    	User::where(['email'=>$email,'email_token'=>$token])->firstOrFail()

    	->update(['active'=>'1','email_token'=> null]);

    	Session::flash('status','Account verified..Plz Login');
    	return redirect()
    	->route('login');

    }
}
