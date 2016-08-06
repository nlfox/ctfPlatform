<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $fillable = ['content', 'title'];

    static function getNotice()
    {
        return Post::where('id', '>', '0')->orderBy('id', 'DESC')->get();
    }
}
