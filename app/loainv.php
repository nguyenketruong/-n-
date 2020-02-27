<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loainv extends Model
{
     protected $table ='loainhanvien';
     public function nhanvien()
    {
    	return $this->hasMany('App\nhanvien','id_loainv','id');
    }
}
