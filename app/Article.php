<?php

namespace App;

use Actuallymab\LaravelComment\Contracts\Commentable;
use Illuminate\Database\Eloquent\Model;
use Actuallymab\LaravelComment\HasComments;

class Article extends Model implements Commentable
{
    // protected $fillable = ['title', 'excerpt', 'body'];

    use HasComments;

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

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function canBeRated(): bool
    {
        return true; // default false
    }


}
