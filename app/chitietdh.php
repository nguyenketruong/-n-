<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chitietdh extends Model
{
   protected $table ='chitietdonhang';
    public function hoadon()
    {
    	return $this->belongsTo('App\hoadon','id_hd','id');
    }
     public function nhanvien()
    {
    	return $this->belongsTo('App\nhanvien','id_nv','id');
    }
}
