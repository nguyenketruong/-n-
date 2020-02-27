<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Hash;


class AdminController extends Controller
{
    public function getAdd()
    {

    	return view ('admin.user.Them');
    } 
    public function postAdd(Request $request)
    {
        $this->validate($request,
        [
         "name"=>"required",
         "password"=>"required"
        ],[
          "name.required"=>"bạn chưa nhâp tên ",
          "password.required"=>"bạn nhập sai mật khẩu "
        ]);   
        $us= new User;
        $us->name= $request->name;
        $us->fullname=$request->fullname;
        $us->email= $request->email;
        $us->password =Hash::make($request->password);
        $us->level=$request->level;
        $us->save();
        return redirect('admin/user/add')->with('thongbao','Thêm  Thành Công');
    }
    public function getEdit($id)
    {
        $us= User::find($id);
    	return view('admin.user.Sua',compact('us','id'));
    }
     public function postEdit(Request $request,$id)
     {
        $this->validate($request, 
            ["name"=>"required","password"=>"required"],
            ["name.required"=>"Vui Lòng Sửa Lại Tên","password.required"=>" vui lòng thay đổi mật khẩu"]
        ); 
        $us= User::find($id);
        $us->name= $request->name;
        $us->fullname=$request->fullname;
        $us->email= $request->email;
        $us->password =$request->password;
        $us->level=$request->level;
        $us->save();
         return redirect('admin/user/edit/'.$id)->with('thongbao','Sửa Thành Công');
     }

    public function getList()
    {
        $us=User::select('id','name','fullname','email','level')->orderBy('id','DESC')->get()->toArray();
    	return view('admin.user.Danhsach',compact('us'));
    }
    public function Delete($id)
    {
        $us=User::find($id);
        $us->delete();
        return redirect('admin/user/list')->with('thongbao','Xóa Thành Công');
    }
    public function getLogin()
    {
        return view ('admin.page.Dangnhap');
    }
    public function postLogin(Request $request)
    {
        $this->validate($request,[
             'email'=>'required|email',
            'password'=>'required|min:6|max:50'
          ],[
           'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Email không đúng định dạng',
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Mật khẩu ít nhất 6 kí tự',
                'password.max'=>'Mật khẩu không quá 50 kí tự'
          ]);
         $credentials = array('email'=>$request->email,'password'=>$request->password,'level'=>1);
            if(Auth::attempt($credentials))
        {
           return redirect('admin/user/list')->with('thongbao','đăng nhập thành công');
        }
        else
        {
            return redirect('admin/user/login')->with('thongbao','đăng nhập không thàng công');
        }
    }
    public function postLogout()
    {
        Auth::logout();
        return redirect('admin/user/login');
    }
}
