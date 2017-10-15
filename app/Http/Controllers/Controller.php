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

    public function httpRequest($url='',$type='get',$data=[])
    {

        if($url) {
            $ch = curl_init();
            curl_setopt($ch,CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_SAFE_UPLOAD, false);
            if (stripos( $url, "https://" ) !== FALSE) {
                curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE );
                curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, false );
            }

            curl_setopt($ch, CURLOPT_URL, $url );
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
            if($type == 'post') {
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            }
            $sContent = curl_exec ($ch);
            $aStatus = curl_getinfo ($ch);
            curl_close ( $ch);
            if (intval ( $aStatus ["http_code"] ) == 200) {
                return $sContent;
            } else {
                return false;
            }
        }
        return false;
    }

    protected function getAccessToken()
    {
        $credential = 'client_credential';
        $appid = 'wxa1e866bd690c001b';
        $appsecret = '4f0d59a22b729d17ebc1263e299c7a8b';

        $url = sprintf("https://api.weixin.qq.com/cgi-bin/token?grant_type=%s&appid=%s&secret=%s",$credential,$appid,$appsecret);
        $result = $this->httpRequest($url);
        $result = json_decode($result,true);
        return $result['access_token'];
    }

    protected function getIP()
    {
            if (getenv('HTTP_CLIENT_IP')) {
                 $ip = getenv('HTTP_CLIENT_IP');
            } elseif (getenv('HTTP_X_FORWARDED_FOR')) {
                  $ip = getenv('HTTP_X_FORWARDED_FOR');
            } elseif (getenv('HTTP_X_FORWARDED')) {
                  $ip = getenv('HTTP_X_FORWARDED');
            } elseif (getenv('HTTP_FORWARDED_FOR')) {
                  $ip = getenv('HTTP_FORWARDED_FOR');
            } elseif (getenv('HTTP_FORWARDED')) {
                  $ip = getenv('HTTP_FORWARDED');
            } else {
                $ip = $_SERVER['REMOTE_ADDR'];
            }
            return $ip;
    }


}
