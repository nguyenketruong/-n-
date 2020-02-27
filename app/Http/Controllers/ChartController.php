<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Charts;

use App\sanpham;
use App\hoadon;
use App\User;
use App\khachhang;
use App\nhaphang;
use App\thongke;
use DB;
class ChartController extends Controller
{
    public function sanpham()
    {
        $sp=sanpham::count();
        $hd=hoadon::count();
        $us=User::count();
        $kh=khachhang::count();
      $sanpham= sanpham::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
            ->get();

        $chart = Charts::database($sanpham, 'bar', 'highcharts')

            ->title("Thống kê Sản Phẩm")

            ->elementLabel("sản phẩm")

            ->dimensions(1000, 500)

            ->responsive(false)

            ->groupByMonth(date('Y'), true);

        return view('admin/thongke/chart',compact('chart','sp','hd','us','kh'));

        } 
        public function thongke()
        {
            $tk=thongke::select('tháng','name','gianhap','giatien','sldaban','slnhap')->orderBy('tháng','DESC')->get()->toArray();
            $kt=thongke::select('tháng','ttban','ttnhaphang')->orderBy('tháng','DESC')->get()->toArray();
             return view('admin.thongke.thongke',compact('tk','kt'));
        }
 
}
