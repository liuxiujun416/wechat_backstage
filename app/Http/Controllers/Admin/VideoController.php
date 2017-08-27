<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/27
 * Time: 22:17
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Model\Video;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->init();
    }

    public function  index()
    {
        $lists = [];
        return view('admin.video.index',['lists'=>$lists]);
    }

    public function add(Request $request)
    {
        if($request->isMethod('post')) {
            $args = $request->all();
            $v = Validator::make($args, [

            ]);
            if($v->fails()) {
                return back()->withErrors($v->errors());
            }

            $video = new Video();
            $video->movie_name = $args['movie_name'];
            $video->movie_path = $args['movie_path'];
            $video->status      = $args['status'];
            $video->img         = $args['img'];
            $video->created = time();
            if($video->save($args)) {
                return redirect('/admin/video/index');
            } else {
                return back()->withErrors('添加失败');
            }
        }
        return view('admin.video.add');
    }

}