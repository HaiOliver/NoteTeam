<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
//    public $timestamps = false;
    protected $fillable = ['noteContent','quote','link','image'];

    public static function create(array $array)
    {
    }
}
