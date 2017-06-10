<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //

    protected $primaryKey = 'menu_id';
    protected $table='menu';
    public $timestamps = false;

    public static function getMenuAll()
    {
        $list = self::get()->toArray();
        return $list;
    }
}
