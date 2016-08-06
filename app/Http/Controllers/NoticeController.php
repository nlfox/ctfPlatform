<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Post;
use App\Solved;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use League\Flysystem\Exception;
use Session;

class NoticeController extends Controller
{


    public function solveRecord()
    {
        $solved = Solved::where('id', '>', '0')->orderBy('id', 'DESC')->take(10)->first();
        return $solved;
    }

    public function notice()
    {
        $notices = Post::getNotice();
        return view('notice')->with('notices',$notices);
    }



    public function score()
    {
        try {
            $pageId = Input::get('page');
        } catch (Exception $e) {
            $pageId = 0;
        }
        $scores = User::where('id', '>', 0)->orderBy('score', 'DESC')->offset($pageId * 10)->take(10)->get();
        return view('score')->with('scores', $scores)->with('page', $pageId);

    }


}
