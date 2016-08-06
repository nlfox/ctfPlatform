<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    public $fillable = ['name', 'value'];

    static function getSettings()
    {
        $settings = Settings::where('id', '>', '0')->get();
        return $settings;
    }

    static function getIntro()
    {
        return Settings::where('name','=','introduction')->get()->first();
    }

    static function getStat()
    {
        return Settings::where('name','=','started')->get()->first();
    }
}
