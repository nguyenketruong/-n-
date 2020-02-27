@extends('admin.page.home')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Khách Hàng
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
                        <form action="admin/khachhang/add" method="POST">
                             <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group"> 
                                <label>Username</label>
                                <input class="form-control" name="name" placeholder="Vui Lòng Nhập Tên Người Dùng" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Vui lòng nhập mật khẩu" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Vui lòng nhập email" />
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input  class="form-control" name="diachi" placeholder="vui lòng nhập Địa Chỉ " />
                            </div>
                            <div class="form-group">
                                <label>Giới Tính</label>
                                <input  class="form-control" name="gioitinh" placeholder="vui lòng nhập Giới Tính " />
                            </div>
                            <div class="form-group">
                                <label>Ngày Sinh</label>
                                <input type="date" class="form-control" name="ngaysinh" placeholder=" " />
                            </div>
                            <div class="form-group">
                                <label>SỐ ĐT</label>
                                <input  class="form-control" name="sdt" placeholder="vui lòng nhập  Số Điện Thoại" />
                            </div>
                            <button type="submit" class="btn btn-default">Add</button>
                            <button type="reset" class="btn btn-default">Quay Lại</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection