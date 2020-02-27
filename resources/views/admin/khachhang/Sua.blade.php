@extends('admin.page.home')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Khách Hàng
                            <small>Sửa</small>
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
                        <form action="admin/khachhang/edit/{{$kh->id}}" method="POST">
                             <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group"> 
                                <label>Username</label>
                                <input class="form-control" name="name" placeholder="Vui Lòng Nhập Tên Người Dùng" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password"  value="{{$kh->name}}" placeholder="vui lòng nhập mật khẩu" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="{{$kh->email}}" placeholder="vui kong nhập email" />
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input  class="form-control" name="diachi" value="{{$kh->diachi}}" placeholder="vui lòng nhập " />
                            </div>
                            <div class="form-group">
                                <label>Giới Tính</label>
                                <input  class="form-control" name="gioitinh" value="{{$kh->gioitinh}}" placeholder="vui lòng nhập " />
                            </div>
                            <div class="form-group">
                                <label>Ngày Sinh</label>
                                <input type="date" class="form-control" name="ngaysinh" value="{{$kh->ngaysinh}}" placeholder="vui lòng nhập " />
                            </div>
                            <div class="form-group">
                                <label>SỐ ĐT</label>
                                <input  class="form-control" name="sdt" value="{{$kh->sdt}}" placeholder="vui lòng nhập " />
                            </div>
                            <button type="submit" class="btn btn-default">User Edit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection