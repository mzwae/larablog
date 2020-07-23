<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // protected $fillable = ['title', 'excerpt', 'body'];

    protected $guarded = [];

    public function path()
    {
        return route('articles.show', $this);
    }

    public function author()
    {
        //Define foreign key, otherwise Laravel will look for author_id by convention
        return $this->belongsTo(User::class, 'user_id');
    }
}
