<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PostController extends Controller
{
    public $prefix = 'admin/post';
    public $fillable;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->fillable = (new Post())->fillable;
    }

    public function anyIndex()
    {
        $posts = Post::getNotice();
        return view('admin/list')->with([
            'items' => $posts,
            'fields' => [
                'title' => 'title',
                'category' =>'category',
            ],
            'prefix' =>$this->prefix
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
                "url" => $this->prefix
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
                'fields'=>$this->fillable,
                'prefix' => $this->prefix,
            ]
        );
    }

    public function postEdit(Request $request)
    {
        $id = Input::get('id');
        $task = Post::where('id', '=', $id)->get()->first();
        $task->fill(Input::all());
        $task->save();
        return view('message')->with(array
            (
                "stat" => 1,
                "msg" => 'successful',
                "url" => $this->prefix
            )
        );
    }


    public function anyDel(Request $request)
    {
        $id = Input::get('id');
        $task = Post::where('id', '=', $id);
        $task->delete();
        return view('message')->with(array
            (
                "stat" => 1,
                "msg" => 'successfully deleted',
                "url" => $this->prefix
            )
        );
    }
}
