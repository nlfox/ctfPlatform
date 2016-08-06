<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solved extends Model {

	//
    static function isSolved($user,$taskId){
        if($john = Solved::where('user', '=', $user)->where('taskid','=',$taskId)->get()->first() == null ){
            return true;
        }
        else{
            return false;
        }
    }
    static function getSolved($user){
        return Solved::where('user', '=', $user)->get(['taskid']);
    }

}
