<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
//    public $timestamps = false;
    protected $fillable = ['noteContent','quote','link','image'];

    public function user(){
//        return $this->belongsTo(User::class);
        return $this->belongsTo('App\User');
    }
}
