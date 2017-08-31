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

    public function uploadMovie(Request $request)
    {

       // ;脚本解析输入数据(类似 POST 和 GET)允许的最大时间，单位是秒。 它从接收所有数据到开始执行脚本进行测量的。
      ini_set("max_input_time","12000");

      //;允许客户端单个POST请求发送的最大数据

        ini_set("post_max_size" ,"2000M");
    //;是否开启文件上传功能
     //file_uploads = On

  //;文件上传的临时存放目录(如果不指定，使用系统默认的临时目录)
   // ;upload_tmp_dir =

 //;允许单个请求上传的最大文件大小
  ini_set("upload_max_filesize", "2000M");

   // ;允许单个POST请求同时上传的最大文件数量
   ini_set("max_file_uploads","100");

        $file = $_FILES['file'];

        $newFileName = md5(time().rand(0,10000)).substr($file['name'],strpos($file['name'],'.'));

        $savePath = './upload/';
        $savePath .= $newFileName;
        $ftp = new FtpController('47.93.33.115','21','root','@liu416115');     // 打开FTP连接
        $ftp->up_file($file['tmp_name'],$savePath);     // 上传文件
        $ftp->close();                       // 关闭FTP连接

         return response(['status'=>1,'path'=>ltrim($savePath,'.'),'type'=>$file['type'],'message'=>'保存文件成功！']);                  // 关闭FTP连接
    }
}
