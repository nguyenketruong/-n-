<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class khachhang extends Model
{
     protected $table ='khachhang';
     public function hoadon()
    {
    	return $this->hasMany('App\hoadon','id_kh','id');
    }
}
