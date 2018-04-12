<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_service extends Model
{
   public function user()
   {
   		return $this->belongsTo('App\User');
   }
   
}
