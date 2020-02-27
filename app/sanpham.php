<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sanpham extends Model
{
     protected $table ='sanpham';
     public function loaisp()
    {
    	return $this->belongsTo('App\loaisp','id_loaisp','id');
    }
    public function nhacungcap()
    {
    	return $this->belongsTo('App\nhacungcap','id_nhacc','id');
    }
    public function hoadon()
    {
    	return $this->belongsTo('App\hoadon','id_sp','id');
    }
    public function nhaphang()
    {
    	return $this->hasMany('App\nhaphang','id_sp','id');
    }
    public function baohang()
    {
    	return $this->hasMany('App\baohang','id_sp','id');
    }

}
