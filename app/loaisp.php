<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loaisp extends Model
{
     protected $table ='loaisanpham';
     
     public function sanpham()
    {
    	return $this->hasMany('App\sanpham','id_loaisp','id');
    }
}
