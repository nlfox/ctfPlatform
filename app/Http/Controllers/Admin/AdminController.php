<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Bootstrapper;
use App\Post;
use Illuminate\Http\Request;
use Input;

class AdminController extends Controller
{

    public $prefix = 'admin/intro';
    public $fillable;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->fillable = (new Post())->fillable;
    }

    public function anyIndex()
    {
        $posts = Post::getIntro();
        return view('admin/list')->with([
            'items' => $posts,
            'fields' => [
                'title' => 'title',
                'category' => 'category',
            ],
            'prefix' => $this->prefix
        ]);
    }

    public function getAdd()
    {

        return view('admin/add')->with([
            'prefix' => $this->prefix,
            'fields' => $this->fillable,
        ]);
    }


    public function postAdd()
    {
        $task = new Post();
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
        $task = Post::where('id', '=', $id)->get()->first();
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
        $task = Post::where('id', '=', $id)->get()->first();
        $task->fill(Input::all());
        $task->save();
        return view('message')->with(array
            (
                "stat" => 1,
                "msg" => 'successful',
                "url" => 'admin'
            )
        );
    }


    public function anyDel()
    {
        $id = Input::get('id');
        $task = Post::where('id', '=', $id);
        $task->delete();
        return view('message')->with(array
            (
                "stat" => 1,
                "msg" => 'successfully deleted',
                "url" => 'admin'
            )
        );
    }
}