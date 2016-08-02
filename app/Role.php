<?php

namespace App;

use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasSlug;

    protected $fillable = ['name'];

    public function permissions()
    {
        return $this->belongsToMany('App\Permission');
    }
}
