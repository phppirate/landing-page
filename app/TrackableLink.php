<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrackableLink extends Model
{
    // This is used to get details on signups and where they come from

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function clicks()
    {
        return $this->hasMany(Click::class);
    }

    public function signUps()
    {
        return $this->belongsToMany(SignUp::class);
    }

    public function click()
    {
        return $this->clicks()->save(new Click());
    }

    public function name($name)
    {
        if($name){
            $this->name = $name;
            return $this;
        }

        return $this->name;
    }

    protected static function boot(){
        parent::boot();

        static::created(function($link){
            $link->token = str_random(60);
            $link->save();
        });
    }
}
