<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Task;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Symfony\Component\Security\Core\User\User;

class TaskController extends Controller
{

    public $prefix = 'admin/task';
    public $fillable;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->fillable = (new Task())->fillable;
    }

    public function anyIndex()
    {
        $tasks = Task::all();
        return view('admin/list')->with([
            'items' => $tasks,
            'fields' => [
                'title' => 'title',
                'category' => 'category',
            ],
            'prefix' => $this->prefix
        ]);
    }

    public function getAdd()
    {
        $fillable = $this->fillable;
        return view('admin/add')->with([
            'prefix' => $this->prefix,
            'fields' => $this->fillable,
        ]);
    }


    public function postAdd()
    {
        $task = new Task;
        $task->fill(Input::all());
        $task->save();

        return view('message')->with(array
            (
                "stat" => 1,
                "msg" => 'successful',
                "url" => 'admin/task'
            )
        );
    }

    public function getEdit()
    {
        $id = Input::get('id');
        $task = Task::find($id);
        return view('admin/edit')->with([
                'task' => $task,
                'id' => $id,
                'fields' => $this->fillable,
                'prefix' => $this->prefix,
            ]
        );
    }

    public function postEdit()
    {
        $id = Input::get('id');
        $task = Task::find($id);
        $task->fill(Input::all());
        $task->save();
        return view('message')->with(array
            (
                "stat" => 1,
                "msg" => 'successful',
                "url" => 'admin/task'
            )
        );
    }


    public function anyDel()
    {
        $id = Input::get('id');
        $task = Task::find($id);
        $task->delete();
        return view('message')->with(array
            (
                "stat" => 1,
                "msg" => 'successfully deleted',
                "url" => 'admin/task'
            )
        );
    }

}
