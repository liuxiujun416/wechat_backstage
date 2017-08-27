<?php

namespace App\Http\Controllers\Sit;

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
       // echo "hello";
       return view('sit.video.index');
    }

    public function  single()
    {
        return view('sit.video.single');

    }

}
