<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Auth;
use Illuminate\Http\Request;
use Validator;

class ProfileController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function __construct(){
        $this->middleware('auth');
    }
    public function getIndex()
    {
        //可优化
        $name=Auth::user()->name;
        $user=User::where('name', '=', $name)->get()->first();
        return view('profile')->with('user',$user);
    }
    public function postIndex(Request $request)
    {
        //todo:集成一起去
        Validator::extend('phonenum', function($attribute, $value, $parameters)
        {
            if(preg_match("/^1[34578]\d{9}$/", $value)){
                return true;
            }
            else{
                return false;
            }
        });

        //可优化
        $name=Auth::user()->name;
        $user=User::where('name', '=', $name)->get()->first();
        // 获取参数
        $params = $request->only(array(
            "phone","sid","msg"
        ));
        // 验证参数
        $validator = Validator::make($params, array(
            'sid' => 'required|min:6',
            'msg' => 'required|max:100',
            'phone'=> 'required|min:6|phonenum'
        ));

        $validator->sometimes('sid', 'required|min:6|unique:users', function($input) use($user)
        {
            return $input['sid'] != $user->sid;
        });

        $validator->sometimes('phone', 'required|min:6|unique:users', function($input) use($user)
        {
            return $input['phone'] != $user->phone;
        });

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
            return view('message')->with(
                array(
                    'stat' => '0',
                    'msg' => 'Information not valid.',
                    "url" => 'task'
                )
            );
        }

        // 新建对象
        $user->sid = $params['sid'];
        $user->phone = $params['phone'];
        $user->msg = $params['msg'];
        $user->save();
        return view('message')->with(
            array(
                'stat' => '1',
                'msg' => 'Successfully modified.',
                "url" => 'task'
            )
        );
    }

}
