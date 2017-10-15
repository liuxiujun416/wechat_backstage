<?php

namespace App\Http\Controllers\Sit;

use App\Model\Video;
use App\Model\VideoCategory;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class VideoController extends Controller
{


    public function index($id='')
    {
        $lists = Video::where('deleted',1);
        if($id) {
           $lists = $lists->where('category_id',$id);
        }

        $lists = $lists->get();
        $videoCategory = VideoCategory::where('deleted',1)->get();

       return view('sit.video.index',['lists'=>$lists,'video_category'=>$videoCategory]);
    }

    public function  single($id)
    {
        DB::table('video')->where('video_id',$id)->increment('hots');
        DB::table('click_log')->insert(['video_id'=>$id,'click_ip'=>$this->getIP(),'created'=>date('Y-m-d H:i:s',time())]);
        $list = Video::find($id);
        $videoCategory = VideoCategory::where('deleted',1)->get();
        $recommend = Video::where('deleted',1)->orderBy('created','desc')->take(8)->get();
        return view('sit.video.single',['list'=>$list,'video_category'=>$videoCategory,'recommend'=>$recommend]);

    }

}
