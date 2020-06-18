<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $table ='userinfo';

    public function user(){
    	return $this->belongsTo(User::class);
    }
}
