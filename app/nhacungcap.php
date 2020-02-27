<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nhacungcap extends Model
{
    protected $table ='nhacungcap';
    public function sanpham()
    {
    	return $this->hasMany('App\sanpham','id_nhacc','id');
    }
    public function nhaphang()
    {
    	return $this->hasMany('App\nhaphang','id_nhacc','id');
    }
}
