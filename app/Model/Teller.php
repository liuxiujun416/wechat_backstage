<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/15
 * Time: 20:02
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Teller extends Model
{
    protected $primaryKey = 'id';
    protected $table='teller';
    public $timestamps = false;

}