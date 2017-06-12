<?php

namespace App\Http\Controllers\Admin;

use App\Model\Role;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    //

    public function __construct()
    {
        $this->init();
    }

    public function index()
    {
        $list = Role::where('status',0)->get();
        return view('admin.role.index',['list'=>$list]);
    }

    public function add(Request $request)
    {
        if($request->isMethod('post')) {
            $args = $request->all();
            $v = Validator::make($args,
                ['role_name'=>'required'],
                ['required' => '角色名称不为空']
            );
            if($v->fails()) {
                return back()->withErrors($v->errors());
            }
            $role = new Role();
            $role->role_name = $args['role_name'];
            $role->created = time();
            if($role->save($args)) {
                return redirect('/admin/role/index');
            } else {
                return back()->withErrors('角色添加失败');
            }
        }

        return view('admin.role.add');
    }

    public function edit()
    {
        return view('admin.role.edit');
    }
}
