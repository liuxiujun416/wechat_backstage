<?php

namespace App\Http\Controllers\Sit;

use App\Model\Movie;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MovieController extends Controller
{
    //

    public function index()
    {
        $list = Movie::where('status',1)->orderby('created')->get()->toArray();
        return view('sit.movie.comedy',['list'=>$list]);
    }
}
