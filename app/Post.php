<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function posts()
    {
        return $this->belongsToMany('App\Post', 'posts_posts', 'parent_id', 'child_id');
    }

    public function thePosts()
    {
        return $this->belongsToMany('App\Post', 'posts_posts', 'child_id', 'parent_id');
    }
}

class PostsPosts extends Model
{
    //
}
