<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/13
 * Time: 20:06
 */

namespace App\Http\Controllers\Sit;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MediaController extends Controller
{
    public function index()
    {
        $lists = DB::table('pic_text')->find();
        print_r($lists);
        return view('Sit.media.index');
    }

}