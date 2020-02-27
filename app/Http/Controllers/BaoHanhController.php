<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use\App\sanpham;
use\App\baohanh;

class BaoHanhController extends Controller
{
   public function getAdd()
    {
        $sp=sanpham::all();
    	return view('admin.baohanh.Them',compact('sp'));

    }
    public function postAdd(Request $request)
    {
      $this->validate($request,
        [
         "mota"=>"required"
        ],[
          "mota.required"=>"thay đổi mô tả của sản phẩm "
        ]); 
        
        $bh= new baohanh;
        $bh->id_sp=$request->id_sp;
        $bh->mota=$request->mota;
        $bh->trangthai=$request->trangthai;
        $bh->chiphi=$request->chiphi;
        $bh->ngaybaohanh=$request->ngaybaohanh;
        $bh->ngayhen=$request->ngayhen;
        $bh->save();

        return redirect('admin/baohanh/add')->with('thongbao','Thêm thành công');  
    }

    public function getEdit($id)
    {
        $sp= sanpham::all();
        $bh= baohanh::find($id);
    	return view('admin.baohanh.Sua',compact('sp','bh','id'));
    }
    public function postEdit(Request $request,$id)
    {
        $bh=baohanh::find($id);
        $this->validate($request,[
          "mota"=>"required"
        ],[
          "mota.required"=>"thay đổi mô tả"
        ]);
        $bh->id_sp=$request->id_sp;
        $bh->mota=$request->mota;
        $bh->trangthai=$request->trangthai;
        $bh->chiphi=$request->chiphi;
        $bh->ngaybaohanh=$request->ngaybaohanh;
        $bh->ngayhen=$request->ngayhen;
        $bh->save();

        return redirect('admin/baohanh/edit/'.$id)->with('thongbao','Sửa thành công');
    }
    public function getList() 
    {
     $bh=baohanh::select(DB::raw('baohanh.id,sanpham.name,baohanh.mota,baohanh.trangthai,baohanh.chiphi,baohanh.ngaybaohanh,baohanh.ngayhen'))
     ->join('sanpham','baohanh.id_sp','sanpham.id')
     ->orderBy('id','DESC')->get()->toArray();
	 return view('admin.baohanh.Danhsach',compact('bh'));
    }
    public function getDelete($id)
    {
        $bh =baohanh::find($id);
        $bh->delete();
        return redirect('admin/baohanh/list')->with('thongbao','Xóa Thành Công');
    } 
}
