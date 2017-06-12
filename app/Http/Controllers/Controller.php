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
        $pid = [];
        foreach($menuList as $value) {
            if($value['pid'] == 0) {
                array_push($levelOneMenu,$value);
            } else {
                array_push($levelTwoMenu,$value);
                array_push($pid,$value['pid']);
            }
        }
        $urlArr = explode('/',ltrim($_SERVER['REQUEST_URI'],'/'));
        $html = "<ul>";
        foreach($levelOneMenu as $value) {
            $childHtml = '';
            $count = 0;
            if(in_array($value['menu_id'],$pid)) {
                $childHtml = '<ul>';
                foreach($levelTwoMenu as $val){
                    $childHtml .='<li><a href="/'.$val['modul'].'/'.$val['controller'].'/'.$val['method'].'">'.$val['menu_name'].'</a></li>';
                    $count++;
                }
                $childHtml .='</ul>';
            }
            $className = $urlArr['1'] == $value['controller'] ? 'active' : 'submenu';
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
