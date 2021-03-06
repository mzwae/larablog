<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Actuallymab\LaravelComment\CanComment;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use CanComment;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * select * from articles where user_id =
     * returns an eloquent collection
     */
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    /**
     * select * from projects where user_id =
     * returns an eloquent collection
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    /**
     * Route notifications for the Nexmo channel.
     *
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return string
     */
    public function routeNotificationForNexmo($notification)
    {
        return $this->phone_number;
    }

    public function getAvatarAttribute()
    {
        // dd($this->name);
        // return "https://i.pravatar.cc/200?u=" . $this->email;
        return "https://robohash.org/" . $this->name;
    }
}
