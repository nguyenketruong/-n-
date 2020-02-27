<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('home',function()
{
	return view ('admin.page.home');
});
Route::group(['prefix'=>'admin'],function()
{

	Route::group(['prefix'=>'user'],function()
	{
		Route::get('add',['as'=>'themtaikhoan','uses'=>'AdminController@getAdd']);
		Route::post('add',['as'=>'themtaikhoan','uses'=>'AdminController@postAdd']);
		Route::get('edit/{id}',['as'=>'suataikhoan','uses'=>'AdminController@getEdit']);
		Route::post('edit/{id}',['as'=>'suataikhoan','uses'=>'AdminController@postEdit']);
		Route::get('list',['as'=>'danhsachtaikhoan','uses'=>'AdminController@getList']);
		Route::get('delete/{id}',['as'=>'delete','uses'=>'AdminController@Delete']);
		Route::get('login',['as'=>'login','uses'=>'AdminController@getLogin']);
		Route::post('login',['as'=>'login','uses'=>'AdminController@postLogin']);
		Route::get('logout',['as'=>'logout','uses'=>'AdminController@postLogout']);

	});
	Route::group(['prefix'=>'sanpham'],function()
	{
		Route::get('add',['as'=>'themsanpham','uses'=>'SanphamController@getAdd']);
		Route::post('add',['as'=>'themsanpham','uses'=>'SanphamController@postAdd']);
		Route::get('edit/{id}',['as'=>'edit','uses'=>'SanphamController@getEdit']);
		Route::post('edit/{id}',['as'=>'edit','uses'=>'SanphamController@postEdit']);
		Route::get('list',['as'=>'danhsachsanpham','uses'=>'SanphamController@getSPlist']);
		Route::get('delete/{id}',['as'=>'delete','uses'=>'SanphamController@getDelete']);
	});
	Route::group(['prefix'=>'danhmuc'],function()
	{
		Route::get('add',['as'=>'themloaisanpham','uses'=>'DanhMucController@getLoaiSPadd']);
		Route::post('add',['as'=>'themloaisanpham1','uses'=>'DanhMucController@postLoaiSPadd']);
		Route::get('edit/{id}',['as'=>'edit','uses'=>'DanhMucController@getEdit']);
		Route::post('edit/{id}',['as'=>'edit','uses'=>'DanhMucController@postEdit']);
		Route::get('list',['as'=>'danhsachloaisanpham','uses'=>'DanhMucController@getList']);
		Route::get('delete/{id}',['as'=>'delete','uses'=>'DanhMucController@getDelete']);
		
	});
	Route::group(['prefix'=>'khachhang'],function()
	{
		Route::get('add',['as'=>'themtaikhoannguoidung','uses'=>'KhachHangController@getKhachhangadd']);
		Route::post('add',['as'=>'themtaikhoannguoidung','uses'=>'KhachHangController@postKhachhangadd']);
		Route::get('edit/{id}',['as'=>'suataikhoannguoidung','uses'=>'KhachHangController@getKhachhangedit']);
		Route::post('edit/{id}',['as'=>'suataikhoannguoidung','uses'=>'KhachHangController@postKhachhangedit']);
		Route::get('list',['as'=>'danhsachtaikhoannguoidung','uses'=>'KhachHangController@getKhachhanglist']);
		Route::get('delete/{id}',['as'=>'delete','uses'=>'KhachHangController@getDelete']);
	});
	Route::group(['prefix'=>'hoadon'],function()
	{
		Route::get('add',['as'=>'themhoadon','uses'=>'HoaDonController@getHoadonadd']);
		Route::post('add',['as'=>'themhoadon','uses'=>'HoaDonController@postHoadonadd']);
		Route::get('edit/{id}',['as'=>'suahoadon','uses'=>'HoaDonController@getHoadonedit']);
		Route::post('edit/{id}',['as'=>'suahoadon','uses'=>'HoaDonController@postHoadonedit']);
		Route::get('list',['as'=>'danhsachhoadon','uses'=>'HoaDonController@getHoadonlist']);
		Route::get('delete/{id}',['as'=>'delete','uses'=>'HoaDonController@getDelete']);
	});
	Route::group(['prefix'=>'nhacc'],function()
	{
		Route::get('add',['as'=>'themnhacc','uses'=>'NhaCCController@getAdd']);
		Route::post('add',['as'=>'themnhacc','uses'=>'NhaCCController@postAdd']);
		Route::get('edit/{id}',['as'=>'suanhacc','uses'=>'NhaCCController@getEdit']);
		Route::post('edit/{id}',['as'=>'suanhacc','uses'=>'NhaCCController@postEdit']);
		Route::get('list',['as'=>'danhsachnhacc','uses'=>'NhaCCController@getList']);
		Route::get('delete/{id}',['as'=>'delete','uses'=>'NhaCCController@getDelete']);

	});
	Route::group(['prefix'=>'loainv'],function()
	{
		Route::get('add',['as'=>'themloainv','uses'=>'LoaiNVController@getAdd']);
		Route::post('add',['as'=>'themloianv','uses'=>'LoaiNVController@postAdd']);
		Route::get('edit/{id}',['as'=>'sualoainv','uses'=>'LoaiNVController@getEdit']);
		Route::post('edit/{id}',['as'=>'sualoainv','uses'=>'LoaiNVController@postEdit']);
		Route::get('list',['as'=>'danhsachloainv','uses'=>'LoaiNVController@getList']);
		Route::get('delete/{id}',['as'=>'delete','uses'=>'LoaiNVController@getDelete']);
	});
	Route::group(['prefix'=>'nhanvien'],function()
	{
		Route::get('add',['as'=>'themnhanvien','uses'=>'NhanvienController@getAdd']);
		Route::post('add',['as'=>'themnhanvien','uses'=>'NhanvienController@postAdd']);
		Route::get('edit/{id}',['as'=>'suanhanvien','uses'=>'NhanvienController@getEdit']);
		Route::post('edit/{id}',['as'=>'suanhanvien','uses'=>'NhanvienController@postEdit']);
		Route::get('list',['as'=>'danhsachnhanvien','uses'=>'NhanvienController@getList']);
		Route::get('delete/{id}',['as'=>'delete','uses'=>'NhanvienController@getDelete']);
	});
	Route::group(['prefix'=>'chitiet'],function()
	{
		Route::get('add',['as'=>'themchitiet','uses'=>'ChitietController@getAdd']);
		Route::post('add',['as'=>'themchitiet','uses'=>'ChitietController@postAdd']);
		Route::get('edit/{id}',['as'=>'suachitiet','uses'=>'ChitietController@getEdit']);
		Route::post('edit/{id}',['as'=>'suachitiet','uses'=>'ChitietController@postEdit']);
		Route::get('list',['as'=>'danhsachchitiet','uses'=>'ChitietController@getList']);
		Route::get('delete/{id}',['as'=>'delete','uses'=>'ChitietController@getDelete']);
	});
	Route::group(['prefix'=>'baohanh'],function()
	{
		Route::get('add',['as'=>'thembaohanh','uses'=>'BaoHanhController@getAdd']);
		Route::post('add',['as'=>'thembaohanh','uses'=>'BaoHanhController@postAdd']);
		Route::get('edit/{id}',['as'=>'suabaohanh','uses'=>'BaoHanhController@getEdit']);
		Route::post('edit/{id}',['as'=>'suabaohanh','uses'=>'BaoHanhController@postEdit']);
		Route::get('list',['as'=>'danhsachbaohanh','uses'=>'BaoHanhController@getList']);
		Route::get('delete/{id}',['as'=>'delete','uses'=>'BaoHanhController@getDelete']);
	});
	Route::group(['prefix'=>'nhaphang'],function()
	{
		Route::get('add',['as'=>'themnhaphang','uses'=>'NhapHangController@getAdd']);
		Route::post('add',['as'=>'themnhaphang','uses'=>'NhapHangController@postAdd']);
		Route::get('edit/{id}',['as'=>'suanhaphang','uses'=>'NhapHangController@getEdit']);
		Route::post('edit/{id}',['as'=>'suanhaphang','uses'=>'NhapHangController@postEdit']);
		Route::get('list',['as'=>'danhsachnhaphang','uses'=>'NhapHangController@getList']);
		Route::get('delete/{id}',['as'=>'delete','uses'=>'NhapHangController@getDelete']);
	});
	Route::group(['prefix'=>'thongke'],function()
	{
	Route::get('chart',['as'=>'chart','uses'=>'ChartController@sanpham']);
	Route::get('chart1',['as'=>'chart1','uses'=>'ChartController@thongke']);
	});
}); 

Route::group(['prefix'=>'Front_End'],function()
{
	Route::group(['prefix'=>'homepage'],function()
	{
		Route::get('index',['as'=>'trangchu','uses'=>'PageController@getIndex']);
		Route::get('danhmuc/{type}',['as'=>'danhmucsanpham','uses'=>'PageController@getLoaiSP']);
		Route::get('sanpham/{id}',['as'=>'chitietsanpham','uses'=>'PageController@getChiTietSP']);
		Route::get('lienhe',['as'=>'lienhe','uses'=>'LienheController@getLienhe']);
		Route::post('lienhe',['as'=>'lienhe','uses'=>'LienheController@postLienhe']);
		Route::get('mua-hang/{id}',['as'=>'mua-hang','uses'=>'PageController@Muahang']);
		Route::get('dat-hang',['as'=>'dat-hang','uses'=>'PageController@getDathang']);
		Route::post('dat-hang',['as'=>'dat-hang','uses'=>'PageController@postDathang']);
		Route::get('gio-hang',['as'=>'gio-hang','uses'=>'PageController@GioHang']);
		Route::get('cap-nhat',['as'=>'cap-nhat','uses'=>'PageController@Catnhat']);
		Route::get('delete_cart/{id}',['as'=>'delete_cart','uses'=>'PageController@Delete_Cart']);
		Route::get('dang-nhap',['as'=>'dang-nhap','uses'=>'PageController@getLogin']);
		Route::post('dang-nhap',['as'=>'dang-nhap','uses'=>'PageController@postLogin']);
		Route::get('dang-ki',['as'=>'dang-ki','uses'=>'PageController@getSigup']);
		Route::post('dang-ki',['as'=>'dang-ki','uses'=>'PageController@postSigup']);
		Route::get('dang-xuat',['as'=>'logout','uses'=>'PageController@postLogout']);
		Route::get('gioithieu',['as'=>'gioithieu','uses'=>'PageController@getGioiThieu']);
		Route::get('Tim-Kiếm',['as'=>'timkiem','uses'=>'PageController@getTimkiem']);

	});

});
