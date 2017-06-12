<?php

namespace App\Http\Controllers\Sit;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MovieController extends Controller
{
    //

    public function index()
    {
        return view('sit.movie.comedy');
    }
}
