<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/3
 * Time: 22:41
 */

namespace App\Http\Controllers\Sit;


use App\Http\Controllers\Controller;

class IndexController extends Controller
{
	
	
	public function __construct()
	{
       
	}
	
	public function index()
	{
		if(!isset($_GET['echostr'])) {	
              file_put_contents('./token.txt',$_GET);		
		      $this->valid();	
		}else {
			$this->responesMsg();
		}
	}
	
	public function valid()
	{
		$nonce     = $_GET['nonce'];
		$token     = "liuxiujun";
		$timestamp = $_GET['timestamp'];
		$echostr   = $_GET['echostr'];
		$signature = $_GET['signature'];
		//形成数组，然后按字典序排序
		$array = array();
		$array = array($nonce, $timestamp, $token);
		sort($array);
		//拼接成字符串,sha1加密 ，然后与signature进行校验
		$str = sha1( implode( $array ) );
		if( $str == $signature && $echostr ){
			//第一次接入weixin api接口的时候
			echo  $echostr; exit;
			
		} 
	}
	
	public function responesMsg()
	{
		$requestContent = file_get_contents('php://input');
		file_put_contents('./request.txt',$requestContent);
		
		$requestContent = simplexml_load_string($requestContent);
		$toUserName   = $requestContent->ToUserName;
		$fromUserName = $requestContent->FromUserName;
		$createTime   = $requestContent->CreateTime;
		$msgType      = $requestContent->MsgType;
		$content      = $requestContent->Content;
		
		$responesContent = "
		<xml>
		<ToUserName><![CDATA[{$fromUserName}]]></ToUserName>
		<FromUserName><![CDATA[{$toUserName}]]></FromUserName>
		<CreateTime>{$createTime}</CreateTime>
		<MsgType><![CDATA[text]]></MsgType>
		<Content><![CDATA[{$content}]]></Content>
		</xml>
		";
		echo $responesContent; 
	}

}