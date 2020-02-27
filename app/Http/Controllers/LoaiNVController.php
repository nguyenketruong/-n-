<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\loainv;

class LoaiNVController extends Controller
{
    public function getAdd()
    {
    	return view('admin.loainv.Them');
    }
    public function postAdd(Request $request)
    {
    	$this->validate($request,
        [
         "tenphongban"=>"required"
        ],[
          "tenphongban.required"=>"bạn chưa nhâp tên"
        ]);
        $lnv= new loainv;
        $lnv->tenphongban = $request->tenphongban;
        $lnv->chucvu= $request->chucvu;
        $lnv->save();
         return redirect('admin/loainv/add')->with('thongbao','Thêm  Thành Công');
    }
    public function getEdit($id)
    {
    	$lnv= loainv::find($id);
    	return view('admin.loainv.Sua',compact('lnv','id'));
    }
    public function postEdit(Request $request,$id)
    {
    	  $this->validate($request, 
            ["tenphongban"=>"required"],
            ["tenphongban.required"=>"Vui Lòng Sửa Lại Tên"]
        ); 
    	$lnv=loainv::find($id);
    	$lnv->tenphongban = $request->tenphongban;
        $lnv->chucvu= $request->chucvu;
        $lnv->save();
        return redirect('admin/loainv/edit/'.$id)->with('thongbao','Sửa Thành Công');
    }
    public function getList()
    {
    $lnv=loainv::select('id','tenphongban','chucvu')->orderBy('id','DESC')->get()->toArray();
	return view('admin.loainv.Danhsach',compact('lnv'));
    }
    public function getDelete($id)
    {
        $lnv=loainv::find($id);
        $lnv->delete();
        return redirect('admin/loainv/list')->with('thongbao','Xóa Thành Công');
    }
}
