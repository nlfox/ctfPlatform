<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'sid', 'phone', 'msg'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token','isadmin'];

    public static function getTop10()
    {
        return User::where('id', '>', 0)->take(10)->orderBy('score', 'DESC')->get();
    }

    public static function getUser($username)
    {
        return User::where('name', '=', $username)->get()->first();
    }
}
