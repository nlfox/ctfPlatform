<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Settings;
use App\Solved;
use App\Task;
use App\User;
use Auth;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function __construct()
    {
        $this->middleware('game');
        $this->middleware('auth');
    }

    public function anyIndex()
    {

        $tasks = Task::all();
        $name = Auth::user()->name;
        $solved = Solved::getSolved($name);
        foreach ($solved as $i) {
            foreach ($tasks as &$task) {
                if ($task->id == $i->taskid) {
                    $task->solved = 1;
                }
            }
        }
        $scores = User::getTop10();
        return view('task')->with('tasks', $tasks)->with('scores', $scores);

    }


    public function anyCheck(Request $request)
    {
        $params = $request->only(array(
                'id', 'flag'
            )
        );

        $task = Task::where('id', '=', $params["id"])->get()->first();
        $flag = $task->flag;

        if ($flag == $params["flag"] && Solved::isSolved(Auth::user()->name, $params["id"])) {
            $name = Auth::user()->name;
            $user = User::getUser($name);
            $user->score += $task->score;
            $user->save();
            $msg = '1';
            $solved = new Solved();
            $solved->taskid = $params["id"];
            $solved->user = $name;
            $solved->save();
        } else
            $msg = '0';

        return view('check')->with('msg', $msg);
    }
}
