<?php                                                                                                                       
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\slide;
use App\sanpham;
use App\loaisp;
use App\thanhvien;
use App\khachhang;
use App\hoadon;
use App\chitietdh;
use App\User;
use Hash;
use Session;
use Auth;
use Cart;
class PageController extends Controller
{
	public function getIndex()
	{
		$slide =slide::all();
		$maymoi=sanpham::where('trangthai','máy mới')->paginate(4);
    	$khuyenmai=sanpham::where('giasale','<>',0)->paginate(4);
        $loai_sp = loaisp::all();
		return view ('computer.layout.home.index',compact('slide','maymoi','khuyenmai','loai_sp'));
	}
	public function getLoaiSP($type)
    {   
    	$sp_theoloai=sanpham::where('id_loaisp',$type)->get();
    	$sp_khac=sanpham::where('id_loaisp','<>',$type)->paginate(9);
    	$loai=loaisp::all();
    	$loai_sp=loaisp::where('id',$type)->first();  
        return view ('computer.layout.home.loaisp',compact('sp_theoloai','sp_khac','loai','loai_sp'));
    }
    public function getChiTietSP(Request $req)
    {
        $sanpham=sanpham::where('id',$req->id)->first();
        $sp_tuongtu=sanpham::where('id_loaisp',$sanpham->id_loaisp)->paginate(3);
        $sp_banchay=sanpham::where('id_loaisp','<>',$sanpham->id_loaisp)->paginate(4);
        $maymoi=sanpham::where('trangthai','máy mới')->paginate(4);
    	return view ('computer.layout.home.chitietsanpham',compact('sanpham','sp_tuongtu','sp_banchay','maymoi'));
    }
    public function getGioiThieu()
    {
        return view('computer.layout.home.gioithieu');
    }
    public function Muahang($id, Request $request)
    {
        $sp_cart=sanpham::find($id);
        if($request->qty)
        {
            $qty=$request->qty;
        }else 
        {
            $qty=1;
            
        }
        if($sp_cart->giasale>0)
        {
            $price=$sp_cart->giasale;
        }
        else
        {
            $price=$sp_cart->giatien;
        }
        $cart=(['id'=>$id,'name'=>$sp_cart->name,'qty'=>$qty,'price'=>$price,'options' => ['img' =>$sp_cart->img]]);

        Cart::add($cart);
        return redirect()->route('gio-hang');
    }
    public function getDatHang()
    {
        $content=Cart::content();
        $total =Cart::total();
        return view ('computer.layout.home.dathang',compact('content','total'));
    }
    public function postDatHang(Request $req)
    {
        $total =Cart::total();
        $kh= new khachhang;
        $kh->name = $req->name;
        $kh->email =$req->email;
        $kh->diachi=$req->diachi;
        $kh->gioitinh=$req->gioitinh;
        $kh->ngaysinh =$req->ngaysinh;
        $kh->sdt =$req->sdt;
        $kh->save();
        if($kh)
        {
        $content=Cart::content();
    foreach ($content as $pro) {
        $hd = new hoadon;
        $hd->id_kh=$kh->id;
        $hd->soluong = $pro->qty;
        $hd->tongtien = $total;
        $hd->ngay=$req->ngay=date('y-m-d');
        $hd->hinhthucthanhtoan =$req->hinhthucthanhtoan;
        $hd->id_sp=$pro->id;
        $hd->save();
        }
        }
        $ct= new chitietdh;
        $ct->id_hd=$hd->id;
        $ct->tenkhachhang=$kh->name;
        $ct->sdt=$kh->sdt;
        $ct->diachi=$kh->diachi;
        $ct->email=$kh->email;
        $ct->ngaysinh=$kh->ngaysinh=date('y-m-d');
        $ct->save();
        return redirect('Front_End/homepage/index');
    }
    public function GioHang()
    {
        $content=Cart::content();
        $total =Cart::total();
        return view('computer.layout.home.giohang',compact('content','total'));
    }
    public function Capnhat()
    {
        Cart::update($id, $sanpham);
    }
    public function Delete_Cart($id)
    {
        if ($id=='all') {
        Cart::destroy();
        }
        else{
        Cart::remove($id);
        }
        return redirect()->route('gio-hang'); 
    }
    public function getLogin()
    {
        return view('computer.layout.home.dangnhap');
    }
    public function postLogin(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email',
                'password'=>'required|min:6|max:50'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Email không đúng định dạng',
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Mật khẩu ít nhất 6 kí tự',
                'password.max'=>'Mật khẩu không quá 50 kí tự'
            ]
        );
        $credentials = array('email'=>$req->email,'password'=>$req->password,'level'=>2);
            if(Auth::attempt($credentials))
        {  

           return redirect('Front_End/homepage/index');
        }
        else
        {
            return redirect('Front_End/homepage/dang-nhap')->with('thongbao','đăng nhập  không thành công');
        }
        }
    public function postLogout(){
        Auth::logout();
        return redirect('Front_End/homepage/index');
    }
    public function getSigup()
    {
        return view('computer.layout.home.dangki');
    }
    public function postSigup(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|max:20',
                'fullname'=>'required',
                're_password'=>'required|same:password'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Không đúng định dạng email',
                'email.unique'=>'Email đã có người sử dụng',
                'password.required'=>'Vui lòng nhập mật khẩu',
                're_password.same'=>'Mật khẩu không giống nhau',
                'password.min'=>'Mật khẩu ít nhất 6 kí tự'
            ]);
        $us= new User();
        $us->name= $req->name;
        $us->fullname=$req->fullname;
        $us->email= $req->email;
        $us->password = Hash::make($req->password);
        $us->level=2;
        $us->save();
        return redirect()->back()->with('thongbao','Tạo tài khoản thành công');
    }
    public function getTimkiem(Request $req){
        $pro =sanpham::where('name','like', '%'.$req->key.'%')->orWhere('giasale',$req->key)->get();
        return view ('computer.layout.home.timkiem',compact('pro'));
    }
}
