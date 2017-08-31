<?php

namespace App\Http\Controllers\Sit;

use App\Model\Video;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{

    public function __construct()
    {
        $this->init();
    }
    public function index()
    {
       $lists = Video::where('deleted',1)->get();
       return view('sit.video.index',['lists'=>$lists]);
    }

    public function  single($id)
    {
          $list = Video::find($id);
        return view('sit.video.single',['list'=>$list]);

    }

}
