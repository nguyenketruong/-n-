@extends('admin.page.home')
@section('content')
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Hóa Đơn
                            <small>Thêm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                         @if(count($errors)>0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $err)
                                    <li> {!! $err !!}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if(Session('thongbao'))
                            <div  class="alert alert-danger" >
                            {{session('thongbao')}}

                            </div>

                         @endif
                        <form action="admin/hoadon/add" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label> Tên Khach Hàng</label>
                                <select class="form-control" name="id_kh">
                                    @foreach($kh as $ha)
                                    <option value="{{$ha->id}}">{{$ha->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Sản Phẩm</label>
                                <select class="form-control" name="id_sp">
                                    @foreach($sp as $aa)
                                    <option value="{{$aa->id}}">{{$aa->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group"> 
                                <label>Số Lượng </label>
                                <input class="form-control" name="soluong" placeholder="Vui Lòng Nhập Số Lượng" />
                            </div>
                            <div class="form-group">
                                <label>Tổng Tiền</label>
                                <input class="form-control" name="tongtien" placeholder="Vui Lòng Nhập Tổng Tiền" />
                            </div>
                            <div class="form-group">
                                <label>Ngày</label>
                                <input type="date" class="form-control" name="ngay" placeholder="" />
                            </div>
                            <div class="form-group">
                                <label>Hình Thức</label>
                                <label class="radio-inline">
                                    <input name="hinhthucthanhtoan" value="Tiền Mặt" checked="" type="radio">Tiền Mặt
                                </label>
                                <label class="radio-inline">
                                    <input name="hinhthucthanhtoan" value="Dùng Thẻ" type="radio">Dùng Thẻ
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default"> Thêm Hóa Đơn </button>
                            <button type="reset" class="btn btn-default">Quay Lại</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection
