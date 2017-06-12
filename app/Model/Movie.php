<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    //
    protected $primaryKey = 'movie_id';
    protected $table='movie';
    public $timestamps = false;
}
