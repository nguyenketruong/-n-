<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use\App\nhaphang;
use\App\nhacungcap;
use\App\sanpham;

class NhapHangController extends Controller
{
   public function getAdd()
    {
        $sp=sanpham::all();
        $nha=nhacungcap::all();
    	return view('admin.nhaphang.Them',compact('sp','nha'));

    }
    public function postAdd(Request $request)
    {
      $this->validate($request,
        [
         "gianhap"=>"required"
        ],[
          "gianhap.required"=>"bạn chưa thay đổi giá nhập sản phẩm"
        ]); 
        
        $nh= new nhaphang;

        $nh->id_nhacc=$request->id_nhacc;
        $nh->gianhap=$request->gianhap;
        $nh->soluong=$request->soluong;
        $nh->ngaynhap=$request->ngaynhap;
        $nh->id_sp=$request->id_sp;
        $nh->save();

        return redirect('admin/nhaphang/add')->with('thongbao','Thêm thành công');  
    }

    public function getEdit($id)
    {
        $nh= nhaphang::find($id);
        $sp= sanpham::all();
        $nha=nhacungcap::all();
    	return view('admin.nhaphang.Sua',compact('nh','sp','nha','id'));
    }
    public function postEdit(Request $request,$id)
    {
        $nh= nhaphang::find($id);
        $this->validate($request,[
        	"gianhap"=>"required"
        ],[
        	"gianhap.required"=>"Bạn chưa thay đổi giá nhâp"
        ]);
        $nh->id_nhacc=$request->id_nhacc;
        $nh->gianhap=$request->gianhap;
        $nh->soluong=$request->soluong;
        $nh->ngaynhap=$request->ngaynhap;
        $nh->id_sp=$request->id_sp;
        $nh->save();
        return redirect('admin/nhaphang/edit/'.$id)->with('thongbao','Sửa thành công');
    }

    public function getlist()
    {
    $nh=nhaphang::select(DB::raw('nhaphang.id,nhacungcap.name as hoten2 ,sanpham.name,nhaphang.gianhap,nhaphang.soluong,nhaphang.ngaynhap'))
    ->join('sanpham','nhaphang.id_sp','sanpham.id')
    ->join('nhacungcap','nhaphang.id_nhacc','nhacungcap.id')
    ->orderBy('id','DESC')->get();
	return view('admin.nhaphang.Danhsach',compact('nh'));
    }
    public function getDelete($id)
    {
        $nh =nhaphang::find($id);
        $nh->delete();
        return redirect('admin/nhaphang/list')->with('thongbao','Xóa Thành Công');
    } 
}
