<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/28
 * Time: 21:45
 */

namespace App\Http\Controllers\Sit;


use App\Http\Controllers\Controller;
use App\Model\Teller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {

    }

    public function login(Request $request)
    {
        $data = $request->all();
        if($request->isMethod('post')) {
           $teller = new Teller();
           $users = $teller->where(['teller_name'=>$data['teller_name']])->get();
           if(empty($users)) {
               return back()->withErrors('用户不存在！');
           }

           $password = md5(md5($data['teller_pass']).$data['teller_name']);
           if($users['teller_pass'] !== $password) {
               return back()->withErrors('密码错误！');
           }

           return redirect('/');
        }

    }

    public function reg(Request $request)
    {
        $args = $request->all();
        if($request->isMethod('post')) {
            $teller = new Teller();
            $teller->teller_name      = $args['teller_name'];
            $teller->teller_pass      = md5( md5($args['teller_pass']).$args['teller_name']);
            $teller->created           = date('Y-m-d H:i:s');
            if($teller->save($args)) {
                return redirect('/');
            } else {
                return back()->withErrors('注册失败');
            }

        }
    }

}