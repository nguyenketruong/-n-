@extends('admin.page.home')
@section('content')
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Chi Tiết ĐƠN HÀNG
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
                        <form action="admin/chitiet/add" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                             <div class="form-group">
                                <label>Má Hóa Đơn</label>
                                <select class="form-control"  name="id_hd">
                                @foreach($hd as $dh)
                                <option value="{{$dh->id}}">{{$dh->id}}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tên Khách Hàng</label>
                                <input class="form-control" name="tenkhachhang" placeholder="Vui Lòng Nhập Tên Khách Hàng" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" placeholder="Vui lòng nhâp email" />
                            </div>
                            <div class="form-group">
                                <label>Địa Chỉ</label>
                                <input class="form-control" name="diachi" placeholder="Vui Lòng Nhập Địa Chỉ" />
                            </div>
                            <div class="form-group">
                                <label>Ngày Sinh</label>
                                <input type="date" class="form-control" name="ngaysinh" placeholder="" />
                            </div>
                            <div class="form-group">
                                <label>Số ĐT</label>
                                <input class="form-control" name="sdt" placeholder="Vui Lòng Nhập Số ĐT" />
                            </div>
                            <button type="submit" class="btn btn-default">Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection
