<?php 
namespace App\Http\Controllers\Sit;

use App\Model\Movie;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IndexController  extends Controller
{
	private $credential;
	
	private $appid;
	
	private $appsecret;
	
	public function __construct()
	{
		$this->credential = 'client_credential';
		//$this->appid      = 'wx8304ad33eda1cbfe';
		//$this->appsecret  = '48f9a8342d4db04cb7b9abe1d4bc99b7';

		$this->appid = 'wxa1e866bd690c001b';
		$this->appsecret = '4f0d59a22b729d17ebc1263e299c7a8b';
	}
	

	

	
	public function postRequest($url='',$param='')
	{
		$postUrl = $url;
        $curlPost = $param;
        $ch = curl_init();//初始化curl
		curl_setopt($ch,CURLOPT_URL,$postUrl);//抓取指定网页
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
		curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
		curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
        curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
        $data = curl_exec($ch);//运行curl
        curl_close($ch);
        
        return $data;
	}
	
	
	
	public function index()
	{
		if(isset($_GET['echostr'])) {
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
		$requestContent = simplexml_load_string($requestContent);
		$msgType      = $requestContent->MsgType;
		$event        = isset($requestContent->Event) ? $requestContent->Event : '';

		if($msgType == 'event') {
		      switch ($event) {
                  case 'subscribe':
                      $this->saveUserInfo($requestContent);
                      $this->getLinkInfo($requestContent);
                      break;
              }
        } else {
            if ('text' == trim($msgType)) {
                $this->getTextContent($requestContent,$requestContent->Content);
            }
        }
	}

	private function getTextContent($requestContent,$content)
    {
        $toUserName   = $requestContent->ToUserName;
        $fromUserName = $requestContent->FromUserName;
        $createTime   = $requestContent->CreateTime;

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



    public function getLinkInfo($xmlObject)
    {
        $url = "www.baidu.com";
        $title = "公众平台官网链接";
        $desc = "公众平台官网链接";
        $picUrl = "http://mpic.tiankong.com/ecc/3e3/ecc3e349338dbe58603cf270d9cd7c9c/640.jpg?x-oss-process=image/resize,m_lfit,h_600,w_600/watermark,image_cXVhbmppbmcucG5n,t_90,g_ne,x_5,y_5";
        $responeContent = <<<EOL
            <xml>
            <ToUserName><![CDATA[{$xmlObject->FromUserName}]]></ToUserName>
            <FromUserName><![CDATA[{$xmlObject->ToUserName}]]></FromUserName>
            <CreateTime>12345678</CreateTime>
            <MsgType><![CDATA[news]]></MsgType>
            <ArticleCount>1</ArticleCount>
            <Articles>
            <item>
            <Title><![CDATA[{$title}]]></Title> 
            <Description><![CDATA[{$desc}]]></Description>
            <PicUrl><![CDATA[{$picUrl}]]></PicUrl>
            <Url><![CDATA[{$url}]]></Url>
            </item>
            </Articles>
            </xml>
EOL;


        echo  $responeContent;
    }

    private function saveUserInfo($xmlObject)
    {
        file_put_contents('userinfo.txt',$xmlObject);
        $toUserName   = $xmlObject->ToUserName;
        $fromUserName = $xmlObject->FromUserName;
        $createTime   = $xmlObject->CreateTime;
        $data = [
          'to_user_name'=>$fromUserName,
            'from_user_name'=>$toUserName,
            'created'=>$createTime,
            'updated'=>$createTime,
            'deleted'=>1
        ];
        DB::table('wechat_user')->insert($data);
    }
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}