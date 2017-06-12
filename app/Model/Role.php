<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $primaryKey = 'role_id';
    protected $table='role';
    public $timestamps = false;
}
