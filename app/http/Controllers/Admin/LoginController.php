<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/6/4
 * Time: 12:08
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

use App\Model\Users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {

        return view('admin.login.login');
    }

    public function login()
    {
        $data = Request::all();

        $messages = [
            'user'    => 'The :attribute and :other must match.',
            'pwd'    => 'The :attribute must be exactly :size.',
        ];
        $v = Validator::make(
            $data,
            [
                'user' => 'required',
                'pwd' => 'required',
            ],
            $messages
        );
        if ($v->fails()) {
            $error = $v->errors()->toArray();
            if ($error['user']){
                return response(['status' => 0, 'url' => '/admin/login/index', 'message' => $error['user'][0]]);
            }
            if($error['pwd']) {
               return response(['status' => 0, 'url' => '/admin/login/index', 'message' => $error['pwd'][0]]);
            }
        }

        if($data) {
            $users = Users::where(['username' => $data['user']])->first()->toArray();
            if (empty($users['username'])) {
                return response(['status' => 0, 'url' => '/admin/login/index', 'message' => "not found user infomation"]);
            }
            $pwd = md5($data['pwd']);
            if ($pwd === $users['password']) {
                Session(['user' => $users]);
                return response(['status' => 0, 'url' => '/admin/index/index', 'message' => "login success!"]);
            }
        }
    }
}