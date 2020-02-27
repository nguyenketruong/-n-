<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hoadon extends Model
{
     protected $table ='hoadon';
     public function khachhang()
    {
    	return $this->belongsTo('App\khachhang','id_kh','id');
    }
    public function chitiethd()
    {
    	return $this->belongsTo('App\chitiethd','id_hd','id');
    }
     public function sanpham()
    {
    	return $this->hasMany('App\sanpham','id_sp','id');
    }

}
