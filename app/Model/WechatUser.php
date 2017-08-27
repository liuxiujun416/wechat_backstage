<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WechatUser extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table='wechat_user';
    public $timestamps = false;
}
