<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SignUp extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email'];

    
    public function getEmailHashAttribute()
    {
        return md5($this->email);
    }
}
