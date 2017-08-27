<?php

namespace App\Http\Controllers\Admin;

use App\Model\Menu;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AccessController extends Controller
{
    //
    public function __construct()
    {
        $this->init();
    }

    public function index()
    {
        return view('admin.access.index');
    }

    public function ajax()
    {
        $t = $this->tree();
        return json_encode($t);
    }

    private function tree($pid=0,&$t=[])
    {
        $lists = Menu::where('pid',$pid)->get()->toArray();
        if(! $lists) {
            return false;
        }
        foreach($lists as $list){
            $results = $this->tree($list['menu_id']);
            $res = ['name' => $list['menu_name'], 'checkboxValue' => $list['menu_id'], 'checked' => true];
            if($results) {
                 $res['children'] = $results;
            }
            array_push($t, $res);
        }
        return $t;
    }

    public function save(Request $request)
    {
        dd($request->all());
    }
}
