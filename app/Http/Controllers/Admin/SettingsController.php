<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class SettingsController extends Controller
{

    public $prefix = 'admin/settings';
    public $fillable;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->fillable = (new Settings())->fillable;
    }

    public function getIndex()
    {
        return view('admin/settings')->with([
            'intro' => Settings::getIntro(),
            'started' => Settings::getStat()->value,
        ]);
    }

    public function postIndex(Request $request)
    {
        $intro = Settings::getIntro();
        $intro->value = Input::get("intro");
        $intro->save();
        if ($request->exists('started')) {
            $started = 1;
        } else {
            $started = 0;
        }
        $stat = Settings::getStat();
        $stat->value = $started;
        $stat->save();
        return view('message')->with(array
            (
                "stat" => 1,
                "msg" => 'successful',
                "url" => $this->prefix
            )
        );
    }


}
