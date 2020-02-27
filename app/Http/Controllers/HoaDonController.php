<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\khachhang;
use App\sanpham;
use App\hoadon;

class HoaDonController extends Controller
{
    public function getHoadonadd()
    {
        $sp=sanpham::all();
        $kh=khachhang::all();
        return view('admin.hoadon.Them',compact('sp','kh'));
    }
    public function postHoadonadd(Request $request)
    {
        $this->validate($request,
        [
         "soluong"=>"required"
        ],[
          "soluong.required"=>"bạn chưa nhâp so luong"
        ]); 
        $hd = new hoadon;
        $hd->id_kh=$request->id_kh;
        $hd->soluong = $request->soluong;
        $hd->tongtien = $request->tongtien;
        $hd->ngay=$request->ngay;
        $hd->hinhthucthanhtoan =$request->hinhthucthanhtoan;
        $hd->id_sp=$request->id_sp;
        $hd->save();
        return redirect('admin/hoadon/add')->with('thongbao','Thêm  Thành Công');
    }
    public function getHoadonedit($id)
    {
        $hd= hoadon::find($id);
        $kh= khachhang::all();
        $sp=sanpham::all();
        return view('admin.hoadon.Sua',compact('hd','kh','sp','id'));
    }
    public function postHoadonedit(Request $request,$id)
    {
        $this->validate($request,
            ["soluong"=>"required",
            "tongtien"=>"required",
            "hinhthucthanhtoan"=>"required"
            ],
            ["soluong.required"=>"vui lòng Sửa Số Lượng",
            "tongtien.required"=>"vui lòng sửa tổng tiền",
            "hinhthucthanhtoan.required"=>"vui lòng sửa hình thức thanh toán"
        ]);
        $hd= hoadon::find($id);
        $hd->id_kh=$request->id_kh;
        $hd->soluong = $request->soluong;
        $hd->tongtien = $request->tongtien;
        $hd->ngay=$request->ngay;
        $hd->hinhthucthanhtoan =$request->hinhthucthanhtoan;
        $hd->id_sp=$request->id_sp;
        $hd->save();
        return redirect('admin/hoadon/edit/'.$id)->with('thongbao','Sửa thành công');
    }
    public function getHoadonlist()
    {

    $hd=hoadon::select(DB::raw('hoadon.id,khachhang.name as hoten,sanpham.name,hoadon.soluong,hoadon.tongtien,hoadon.ngay,hoadon.hinhthucthanhtoan'))
    ->join('sanpham','hoadon.id_sp','sanpham.id')
    ->join('khachhang','hoadon.id_kh','khachhang.id')
    ->orderBy('id','DESC')
    ->get();
    return view('admin.hoadon.Danhsach',compact('hd'));
    }
    public function getDelete($id)
    {
        $hd =hoadon::find($id);
        $hd->delete();
        return redirect('admin/hoadon/list')->with('thongbao','Xóa Thành Công');
    }
}

