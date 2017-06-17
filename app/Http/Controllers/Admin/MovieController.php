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

    public function __construct()
    {
        $this->init();
    }

    public function index()
    {
        $list = Movie::where('status',1)->get();
        return view("admin.movie.index",['list'=>$list]);
    }

    public function add(Request $request)
    {
        if($request->isMethod('post')) {
            $args = $request->all();
            $v = Validator::make($args,
                ['movie_name'=>'required'],
                ['required' => '电影名称不为空']
            );
            if($v->fails()) {
                return back()->withErrors($v->errors());
            }
            $movie = new Movie();
            $movie->movie_name = $args['movie_name'];
            $movie->movie_path = $args['movie_path'];
            $movie->status      = $args['status'];
            $movie->img         = $args['img'];
            $movie->created = time();
            if($movie->save($args)) {
                return redirect('/admin/movie/index');
            } else {
                return back()->withErrors('电影添加失败');
            }
        }
        return view('admin.movie.add');
    }



    public function upload(Request $request)
    {
        //判断请求中是否包含name=file的上传文件

        $file = $request->file('file');
        if(!$file->isValid()){
            exit('文件上传出错！');
        }
        $newFileName = md5(time().rand(0,10000)).'.'.$file->getClientOriginalExtension();
        $savePath = './upload/';
        if(!is_dir($savePath)) {
            mkdir($savePath, 777, true);
        }
        $savePath .= $newFileName;
        if($file->getClientOriginalExtension() == 'mp4') {
            $ftp = new FtpController('47.93.33.115',21,'root','@liu416115');     // 打开FTP连接
           // $ftp_path = '/yjdata/www/wechat_backstage/public/upload/movie/';
            $ftp->up_file($file->getRealPath(),$savePath);     // 上传文件
            $ftp->close();                       // 关闭FTP连接
        }else {
            file_put_contents($savePath, file_get_contents($file->getRealPath()));
        }
        if(!file_exists($savePath)) {
            return response(['status'=>0,'path'=>'','type'=>$file->getMimeType(),'message'=>'保存文件失败！']);
        }
        return response(['status'=>1,'path'=>ltrim($savePath,'.'),'type'=>$file->getMimeType(),'message'=>'保存文件成功！']);
    }
}
