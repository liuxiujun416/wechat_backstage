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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class VideoController extends Controller
{
    public function __construct()
    {
        $this->init();
    }

    public function  index()
    {
        $lists = Video::where('deleted',1)->get();
        return view('admin.video.index',['lists'=>$lists]);
    }

    public function add(Request $request)
    {
        if($request->isMethod('post')) {
            $args = $request->all();
            $v = Validator::make($args,
                ['name'=>'required'],
                ['required' => '电影名称不为空']);
            if($v->fails()) {
                return back()->withErrors($v->errors());
            }

            $video = new Video();
            $video->video_name     = $args['name'];
            $video->path            = $args['path'];
            $video->icon            = $args['img'];
            $video->updated         = time();
            $video->created         = time();
            $video->deleted         = 1;
            if($video->save($args)) {
                return redirect('/admin/video/index');
            } else {
                return back()->withErrors('添加失败');
            }
        }
        return view('admin.video.add');
    }

}