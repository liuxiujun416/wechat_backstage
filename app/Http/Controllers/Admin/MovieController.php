<?php

namespace App\Http\Controllers\Admin;

use App\Model\Movie;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class MovieController extends Controller
{
    //

    public function index()
    {
        $list = Movie::where('status',0)->get();
        return view("admin.movie.index",['list'=>$list]);
    }

    public function add(Request $request)
    {
        if($request->isMethod('post')) {
            $args = $request->all();
            $v = Validator::make($args,
                ['role_name'=>'required'],
                ['required' => '电影名称不为空']
            );
            if($v->fails()) {
                return back()->withErrors($v->errors());
            }
            $movie = new Movie();
            $movie->movie_name = $args['role_name'];
            $movie->movie_path = $args['role_name'];
            $movie->status      = $args['role_name'];
            $movie->img         =
            $movie->created = time();
            if($movie->save($args)) {
                return redirect('/admin/movie/index');
            } else {
                return back()->withErrors('电影添加失败');
            }
        }
        return view('admin.movie.add');
    }
}
