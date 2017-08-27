<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/19
 * Time: 2:20
 */

namespace App\Http\Controllers\Sit;


use App\Http\Controllers\Controller;

class BlogController extends Controller
{

    public function index()
    {
        return view('sit.blog.index');
    }

    public function archive()
    {
        return view('sit.blog.archive');
    }

    public function contact()
    {
        return view('sit.blog.contact');
    }

    public function single()
    {
        return view('sit.blog.single');
    }


}