<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\sanpham;
use App\loaisp;
use App\nhacungcap;

class SanphamController extends Controller
{
     public function getAdd()
    {
        $loai=loaisp::all();
        $nha=nhacungcap::all();
    	return view('admin.sanpham.Them',compact('loai','nha'));

    }
    public function postAdd(Request $request)
    {
      $this->validate($request,
        [
         "name"=>"required"
        ],[
          "name.required"=>"bạn chưa nhâp tên sản phẩm"
        ]); 
        
        $sp= new sanpham;

        $sp->id_loaisp=$request->id_loaisp;
        $sp->name=$request->name;
        $sp->giasale=$request->giasale;
        $sp->mota=$request->mota;
        $sp->khuyenmai=$request->khuyenmai;
        $sp->danhgia=$request->danhgia;
        $sp->trangthai=$request->trangthai;
        $sp->img=$request->img;
        $sp->giatien=$request->giatien;
        $sp->soluong=$request->soluong;
        $sp->id_nhacc=$request->id_nhacc;
        $sp->save();

        return redirect('admin/sanpham/add')->with('thongbao','Thêm thành công');  
    }

    public function getEdit($id)
    {
        $sp= sanpham::find($id);
        $loai= loaisp::all();
        $nha=nhacungcap::all();
    	return view('admin.sanpham.Sua',compact('sp','loai','nha','id'));
    }
    public function postEdit(Request $request,$id)
    {
        $sp= sanpham::find($id);
        $this->validate($request,[
          "name"=>"required|unique:sanpham,name|min:3"
        
        ],[
          "name.required"=>"bạn chưa nhập tên",
           "name.unique"=>"tên trùng tên cũ",
           "name.min"=>"ên quá ngắn"
        ]);
        $sp->id_loaisp=$request->id_loaisp;
        $sp->name=$request->name;
        $sp->giasale=$request->giasale;
        $sp->mota=$request->mota;
        $sp->khuyenmai=$request->khuyenmai;
        $sp->danhgia=$request->danhgia;
        $sp->trangthai=$request->trangthai;
        $sp->img=$request->img;
        $sp->giatien=$request->giatien;
        $sp->soluong=$request->soluong;
        $sp->id_nhacc=$request->id_nhacc;
        $sp->save();

        return redirect('admin/sanpham/edit/'.$id)->with('thongbao','Sửa thành công');
    }

    public function getSPlist()
    {
    $sp=sanpham::select(DB::raw('sanpham.id,loaisanpham.name as hoten1 ,sanpham.name,sanpham.soluong,sanpham.giasale,sanpham.giatien,nhacungcap.name as hoten'))
    ->join('loaisanpham','sanpham.id_loaisp','loaisanpham.id')
    ->join('nhacungcap','sanpham.id_nhacc','nhacungcap.id')
    ->orderBy('id','DESC')->get();
	return view('admin.sanpham.Danhsach',compact('sp'));
    }
    public function getDelete($id)
    {
        $sp =sanpham::find($id);
        $sp->delete();
        return redirect('admin/sanpham/list')->with('thongbao','Xóa Thành Công');
    }
}
