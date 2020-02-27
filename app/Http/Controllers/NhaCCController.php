<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\nhacungcap;

class NhaCCController extends Controller
{
    public function getAdd()
    {
    	return view('admin.nhacc.Them');
    }
    public function postAdd(Request $request)
    {
    	$this->validate($request,
        [
         "name"=>"required"
        ],[
          "name.required"=>"bạn chưa nhâp tên nhà cung cấp"
        ]);
        $nha= new nhacungcap;
        $nha->name = $request->name;
        $nha->diachi= $request->diachi;
        $nha->sdt =$request->sdt;
        $nha->save();
         return redirect('admin/nhacc/add')->with('thongbao','Thêm  Thành Công');
    }
    public function getEdit($id)
    {
    	$nha= nhacungcap::find($id);
    	return view('admin.nhacc.Sua',compact('nha','id'));
    }
    public function postEdit(Request $request,$id)
    {
    	  $this->validate($request, 
            ["name"=>"required"],
            ["name.required"=>"Vui Lòng Sửa Lại Tên"]
        ); 
    	$nha=nhacungcap::find($id);
    	$nha->name = $request->name;
        $nha->diachi= $request->diachi;
        $nha->sdt =$request->sdt;
        $nha->save();
        return redirect('admin/nhacc/edit/'.$id)->with('thongbao','Sửa Thành Công');
    }
    public function getList()
    {
    $nha=nhacungcap::select('id','name','diachi','sdt')->orderBy('id','DESC')->get()->toArray();
	return view('admin.nhacc.Danhsach',compact('nha'));
    }
    public function getDelete($id)
    {
        $nha=nhacungcap::find($id);
        $nha->delete();
        return redirect('admin/nhacc/list')->with('thongbao','Xóa Thành Công');
    }
}
