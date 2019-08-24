<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeSection extends Model
{
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function __toString()
    {
        return $this->name;
    }
}
