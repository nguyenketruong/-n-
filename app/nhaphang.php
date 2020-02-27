<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nhaphang extends Model
{
    protected $table ='nhaphang';
    public function sanpham()
    {
    	return $this->hasMany('App\sanpham','id_sp','id');
    }
    public function nhacungcap()
    {
    	return $this->hasMany('App\nhacungcap','id_nhacc','id');
    }

}
