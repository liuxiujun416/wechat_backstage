<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/2
 * Time: 3:56
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class VideoCategory extends Model
{
    protected $primaryKey = 'id';
    protected $table='video_category';
    public $timestamps = false;


}