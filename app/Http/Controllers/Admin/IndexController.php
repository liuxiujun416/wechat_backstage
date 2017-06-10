<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/6/3
 * Time: 22:54
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Model\Users;


class IndexController extends Controller
{
   public function __construct()
   {
          $this->init();
   }

    public function index()
    {
        $users = Users::all();
      return view('admin.index.index');
    }
}