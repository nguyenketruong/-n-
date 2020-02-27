<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\khachhang;

class KhachHangController extends Controller
{
    public function getKhachhangadd() 
    {
    	return view('admin.khachhang.Them');
    }
    public function postKhachhangadd(Request $request)
    {
     $this->validate($request,
        [
         "name"=>"required",
         "password"=>"required"
        ],[
          "name.required"=>"bạn chưa nhâp tên sản phẩm",
          "password.required"=>"bạn nhập sai mật khẩu "
        ]);   
        $kh= new khachhang;
        $kh->name = $request->name;
        $kh->password= $request->password;
        $kh->email =$request->email;
        $kh->diachi=$request->diachi;
        $kh->gioitinh=$request->gioitinh;
        $kh->ngaysinh =$request->ngaysinh;
        $kh->sdt =$request->sdt;
        $kh->save();
        return redirect('admin/khachhang/add')->with('thongbao','Thêm  Thành Công');
    }
    public function getKhachhangedit($id)
    {
        $kh= khachhang::find($id);
    	return view('admin.khachhang.Sua',compact('kh','id'));
    }
    public function postKhachhangedit(Request $request,$id)
     {
        $this->validate($request, 
            ["name"=>"required"],
            ["name.required"=>"Vui Lòng Sửa Lại Tên"]
        ); 
        $kh= khachhang::find($id);
        $kh->name = $request->name;
        $kh->password= $request->password;
        $kh->email =$request->email;
        $kh->diachi=$request->diachi;
        $kh->gioitinh=$request->gioitinh;
        $kh->ngaysinh =$request->ngaysinh;
        $kh->sdt =$request->sdt;
        $kh->save();
        return redirect('admin/khachhang/edit/'.$id)->with('thongbao','Sửa Thành Công');
     }
    public function getKhachhanglist()
    {
    $kh=khachhang::select('id','name','email','diachi','ngaysinh','sdt')->orderBy('id','DESC')->get()->toArray();
	return view('admin.khachhang.Danhsach',compact('kh'));
    }
    public function getDelete($id)
    {
        $kh =khachhang::find($id);
        $kh->delete();
        return redirect('admin/khachhang/list')->with('thongbao','Xóa Thành Công');
    }
}
