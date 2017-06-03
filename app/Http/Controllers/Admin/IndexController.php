<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/6/3
 * Time: 22:54
 */

namespace App\Http\Controllers\Admin;


use App\Model\Users;
use Illuminate\Routing\Controller;

class IndexController extends Controller
{
   public function __construct()
   {

   }

    public function index()
    {
        $users = Users::all();
        dd($users);
      return view('admin.index.index');
    }
}