<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use\App\Http\Requests\DanhMucRequest;
use\App\loaisp;

class DanhMucController extends Controller
{
    public function getLoaiSPadd()
    {
    	return view('admin.loaisp.Them');
    }
    public function postLoaiSPadd(DanhMucRequest $request)
    {
        $loai = new loaisp;
        $loai->name = $request->name;
        $loai->descution = $request->descution;
        $loai->img =$request->img;
        $loai->notes =$request->notes;
        $loai->save();
        return redirect('admin/danhmuc/add')->with('thongbao','Thêm  Thành Công');
    }
    public function getEdit($id)
    {
        $loai= loaisp::find($id);
        return view('admin.loaisp.Sua',compact('loai','id'));

    }
    public function postEdit(Request $request,$id)
    {
        $this->validate($request, 
            ["name"=>"required"],
            ["name.required"=>"Vui Lòng Sửa Lại Tên"]
        ); 
        $loai =loaisp::find($id);
        $loai->name = $request->name;
        $loai->descution = $request->descution;
        $loai->img =$request->img;
        $loai->notes =$request->notes;
        $loai->save();
        return redirect('admin/danhmuc/edit/'.$id)->with('thongbao','Sửa Thành Công');
    }
    public function getList()
    {
    $loai=loaisp::select('id','name','descution','notes')->orderBy('id','DESC')->get()->toArray();
	return view('admin.loaisp.Danhsach',compact('loai'));
    }
    public function getDelete($id)
    {
        $loai =loaisp::find($id);
        $loai->delete();
        return redirect('admin/danhmuc/list')->with('thongbao','Xóa Thành Công');
    }
}