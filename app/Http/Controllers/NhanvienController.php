<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\nhanvien;
Use App\loainv;

class NhanvienController extends Controller
{
    public function getAdd()
    {
        $lnv=loainv::all();
    	return view('admin.nhanvien.Them',compact('lnv'));

    }
    public function postAdd(Request $request)
    {
      $this->validate($request,
        [
         "name"=>"required"
        ],[
          "name.required"=>"bạn chưa nhâp tên nhân viên "
        ]); 
        
        $nv= new nhanvien;
        $nv->id_loainv=$request->id_loainv;
        $nv->name=$request->name;
        $nv->email=$request->email;
        $nv->luong=$request->luong;
        $nv->diachi=$request->diachi;
        $nv->gioitinh=$request->gioitinh;
        $nv->ngaysinh=$request->ngaysinh;
        $nv->sdt=$request->sdt;
        $nv->save();

        return redirect('admin/nhanvien/add')->with('thongbao','Thêm thành công');  
    }

    public function getEdit($id)
    {
        $lnv= loainv::all();
        $nv= nhanvien::find($id);
    	return view('admin.nhanvien.Sua',compact('lnv','nv','id'));
    }
    public function postEdit(Request $request,$id)
    {
        $nv= nhanvien::find($id);
        $this->validate($request,[
          "name"=>"required|unique:nhanvien,name|min:3"
        
        ],[
          "name.required"=>"bạn chưa nhập tên",
           "name.unique"=>"tên trùng tên cũ",
           "name.min"=>"ên quá ngắn"
        ]);
        $nv->id_loainv=$request->id_loainv;
        $nv->name=$request->name;
        $nv->email=$request->email;
        $nv->luong=$request->luong;
        $nv->diachi=$request->diachi;
        $nv->gioitinh=$request->gioitinh;
        $nv->ngaysinh=$request->ngaysinh;
        $nv->std=$request->sdt;
        $nv->save();

        return redirect('admin/nhanvien/edit/'.$id)->with('thongbao','Sửa thành công');
    }
    public function getList() 
    {
     $nv=nhanvien::select(DB::raw('nhanvien.id,loainhanvien.chucvu,nhanvien.name,nhanvien.email,nhanvien.luong,nhanvien.diachi,nhanvien.sdt'))
        ->join('loainhanvien','nhanvien.id_loainv','loainhanvien.id')
        ->orderBy('id','DESC')->get();
	 return view('admin.nhanvien.Danhsach',compact('nv'));
    }
    public function getDelete($id)
    {
        $nv =nhanvien::find($id);
        $nv->delete();
        return redirect('admin/nhanvien/list')->with('thongbao','Xóa Thành Công');
    }
}
