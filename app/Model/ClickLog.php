<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/9
 * Time: 1:32
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class ClickLog extends Model
{
    protected $primaryKey = 'click_id';
    protected $table='click_log';
    public $timestamps = true;
}