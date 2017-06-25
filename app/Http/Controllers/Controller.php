<?php

namespace App\Http\Controllers;

use App\Model\Menu;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function init()
    {
        $menuList = Menu::getMenuAll();
        $levelOneMenu = [];
        $levelTwoMenu = [];
        foreach($menuList as $value) {
            if($value['pid'] == 0) {
                array_push($levelOneMenu,$value);
            } else {
                array_push($levelTwoMenu,$value);
            }
        }
        $urlArr = explode('/',ltrim($_SERVER['REQUEST_URI'],'/'));
        $html = "<ul>";
        foreach($levelOneMenu as $value) {
            $count = 0;
                $childHtml = '<ul>';
                $className = 'submenu';
                foreach($levelTwoMenu as $val){
                    if($value['menu_id'] == $val['pid']) {
                        $childHtml .= '<li><a href="/' . $val['modul'] . '/' . $val['controller'] . '/' . $val['method'] . '">' . $val['menu_name'] . '</a></li>';
                        $count++;
                    }
                    if($val['controller'] == $urlArr['1'] &&  $value['menu_id'] == $val['pid'] ) {
                        $className = 'submenu active open';
                    } 
                }
                $childHtml .='</ul>';

            $html .= ' <li class="'.$className.'">';
            if($value['pid'] == 0) {
               $html .=  '<a href="#"><i class="icon icon-th-list"></i> <span>'.$value['menu_name'].'</span> <span class="label">'.$count.'</span></a>';
            }

            $html .= $childHtml;
            $html .= '</li>';
        }
        $html .= "</ul>";
        view()->share('menu_list',$html);
    }
}
