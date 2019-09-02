<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use Searchable;

    public function posts()
    {
        return $this->belongsToMany('App\Post', 'posts_posts', 'parent_id', 'child_id');
    }

    public function thePosts()
    {
        return $this->belongsToMany('App\Post', 'posts_posts', 'child_id', 'parent_id');
    }

    public function homeSection()
    {
        return $this->belongsTo('App\HomeSection');
    }

    public function searchableAs()
    {
        return 'posts';
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();
        return $array;
    }
}

class PostsPosts extends Model
{
    //
}
