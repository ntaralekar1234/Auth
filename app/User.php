<?php

namespace App;
use App\Notifications\VerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname', 'lname','mobile','email', 'password','email_token','active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function verified()
    {
       return $this->token === null;
    }

    public function sendVerificationEmail()
    {
        $this->notify(new VerifyEmail($this));
    }

    public function userservices()
    {
       return $this->hasOne('App\user_service');
    }
    

}
