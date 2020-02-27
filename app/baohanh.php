<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class baohanh extends Model
{
    protected $table ='baohanh';
    public function sanpham()
    {
    	return $this->belongsTo('App\sanpham','id_sp','id');
    }
}
