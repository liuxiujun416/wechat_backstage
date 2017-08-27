<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/27
 * Time: 22:44
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $primaryKey = 'video_id';
    protected $table='video';
    public $timestamps = false;

}