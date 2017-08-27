<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/12
 * Time: 21:10
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MediaController extends Controller
{
    public function __construct()
    {
        $this->init();
    }

    public function index()
    {
        $list = DB::table('pic_text')->select();
        return view('admin.media.index',['list'=>$list]);
    }



    public function add(Request $request)
    {
        if($request->isMethod('post')) {
          $args = $request->all();
          $data = [
            'title' => $args['title'],
              'status' => $args['status'],
              'media_element_id' => $args['media_element_id'],
              'content' => $args['content'],
              'created' => time(),
              'updated' => time(),
              'deleted' => time()
          ];
          $bool = DB::table('pic_text')->insert($data);
            if($bool) {
               redirect('admin/media/index');
            }
        }

        return view('admin.media.add');

    }


    public function upload(Request $request)
    {

        $file = $request->file('file');
        if(!$file->isValid()){
            exit('文件上传出错！');
        }
        $newFileName = md5(time().rand(0,10000)).'.'.$file->getClientOriginalExtension();
        $savePath = './upload/img/';
        if(!is_dir($savePath)) {
            mkdir($savePath, 777, true);
        }
        $savePath .= $newFileName;
        if($file->getClientOriginalExtension() == 'mp4') {
            $ftp = new FtpController('47.93.33.115',21,'root','@liu416115');     // 打开FTP连接
            $ftp->up_file($file->getRealPath(),$savePath);     // 上传文件
            $ftp->close();                       // 关闭FTP连接
        }else {
            file_put_contents($savePath, file_get_contents($file->getRealPath()));
        }
        if(!file_exists($savePath)) {
            return response(['status'=>0,'path'=>'','type'=>$file->getMimeType(),'message'=>'保存文件失败！']);
        }

        $mediaPath = str_replace('\\','/',base_path( str_replace_first('./','',$savePath)));
        $token = $this->getAccessToken();
        $url = "https://api.weixin.qq.com/cgi-bin/media/upload?access_token={$token}&type=image";

        $data = array(
            'media'=> new \CURLFile(realpath($savePath)),

        );
        $result = $this->curl_post($url,$data);

        $data = [
            'file_name'  =>$savePath,
            'media_id'   =>$result['media_id'],
            'media_type' =>$result['type'],
            'created'    => time(),
            'updated'    => time(),
            'deleted'    => time()
        ];

        $lastId = DB::table('media_element')->insertGetId($data);

        if($lastId) {
            return response(['status' => 1, 'path' => ltrim($savePath, '.'),'media_element_id'=>$lastId,  'message' => '保存文件成功！']);
        } else {
            return response(['status'=>0,'path'=>'','media_element_id'=>$lastId,'message'=>'保存文件失败！']);
        }

    }




    function curl_post($url, $data, $header = array()){

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            if(is_array($header) && !empty($header)){
                $set_head = array();
                foreach ($header as $k=>$v){
                    $set_head[] = "$k:$v";
                }
                curl_setopt($ch, CURLOPT_HTTPHEADER, $set_head);
            }
            if (stripos( $url, "https://" ) !== FALSE) {
                curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE );
                curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, false );
            }
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, 0);// 1s to timeout.
            $response = curl_exec($ch);
            if(curl_errno($ch)){
                return curl_error($ch);
            }
            curl_close($ch);
            $info = array();
            if($response){
                $info = json_decode($response, true);
            }
            return $info;
    }

}