<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nhanvien extends Model
{
     protected $table ='nhanvien';
      public function loainv()
    {
    	return $this->belongsTo('App\loainv','id_loainv','id');
    }
    public function chitietdh()
    {
    	return $this->hasMany('App\chitietdh','id_nv','id');
    }
}

