<?php

namespace App\Console\Commands;

use App\Model\WechatUser;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;


class TextPicCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'text-pic';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $lists = WechatUser::where(['deleted'=>1])->select();
        $this->getLinkInfo($lists);
    }

    /**
     * 推送信息
     * @param $xmlObject
     */
    public function getLinkInfo($userList)
    {
        foreach ($userList as $key => $user) {

            $url = "www.baidu.com";
            $title = "公众平台官网链接";
            $desc = "公众平台官网链接";
            $picUrl = "http://mpic.tiankong.com/ecc/3e3/ecc3e349338dbe58603cf270d9cd7c9c/640.jpg?x-oss-process=image/resize,m_lfit,h_600,w_600/watermark,image_cXVhbmppbmcucG5n,t_90,g_ne,x_5,y_5";
            $responeContent = <<<EOL
            <xml>
            <ToUserName><![CDATA[{$user->to_user_name}]]></ToUserName>
            <FromUserName><![CDATA[{$user->from_user_name}]]></FromUserName>
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


            echo $responeContent;
        }
    }

}
