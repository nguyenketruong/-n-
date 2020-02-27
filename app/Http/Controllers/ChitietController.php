<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\hoadon;
use App\nhanvien;
use App\chitietdh;

class ChitietController extends Controller
{
     public function getAdd()
    {
        $hd=hoadon::all();
    	return view('admin.chitietdonhang.Them',compact('hd'));

    }
    public function postAdd(Request $request)
    {
      $this->validate($request,
        [
         "tenkhachhang"=>"required"
        ],[
          "tenkhachhang.required"=>"bạn chưa nhâp tên khách hàng"
        ]); 
        
        $ct= new chitietdh;

        $ct->id_hd=$request->id_hd;
        $ct->tenkhachhang=$request->tenkhachhang;
        $ct->sdt=$request->sdt;
        $ct->diachi=$request->diachi;
        $ct->email=$request->email;
        $ct->ngaysinh=$request->ngaysinh;
        $ct->save();

        return redirect('admin/chitiet/add')->with('thongbao','Thêm thành công');  
    }

    public function getEdit($id)
    {
        $ct= chitietdh::find($id);
        $hd= hoadon::all();
    	return view('admin.chitietdonhang.Sua',compact('ct','hd','id'));
    }
    public function postEdit(Request $request,$id)
    {
        $ct= chitietdh::find($id);
        $this->validate($request,[
        "diachi"=>"required",
        "sdt"=>"required"
        ],[
        "diachi.required"=>"bạn chưa thay đổi địa chỉ",
        "sdt.required"=>"bạn chưa thay đổi số điện thoại"
        ]);
        $ct->id_hd=$request->id_hd;
        $ct->tenkhachhang=$request->tenkhachhang;
        $ct->sdt=$request->sdt;
        $ct->diachi=$request->diachi;
        $ct->email=$request->email;
        $ct->ngaysinh=$request->ngaysinh;
        $ct->save();

        return redirect('admin/chitiet/edit/'.$id)->with('thongbao','Sửa thành công');
    }

    public function getList()
    {
    $ct=chitietdh::select(DB::raw('chitietdonhang.id,chitietdonhang.id_hd,chitietdonhang.tenkhachhang,chitietdonhang.email,chitietdonhang.diachi,chitietdonhang.sdt'))
    ->orderBy('id','DESC')->get();
	return view('admin.chitietdonhang.Danhsach',compact('ct'));
    }
    public function getDelete($id)
    {
        $ct =chitietdh::find($id);
        $ct->delete();
        return redirect('admin/chitiet/list')->with('thongbao','Xóa Thành Công');
    }
}
