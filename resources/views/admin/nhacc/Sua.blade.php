@extends('admin.page.home')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Nhà Cung Cấp
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
                        <form action="admin/nhacc/edit/{{$nha->id}}" method="POST">
                             <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group"> 
                                <label>Username</label>
                                <input class="form-control" name="name" value="{{$nha->name}}" placeholder="Vui Lòng Nhập Tên Nhà Cung Cấp" />
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input  class="form-control" name="diachi" value="{{$nha->diachi}}" placeholder="vui lòng nhập địa chỉ " />
                            </div>
                            <div class="form-group">
                                <label>SỐ ĐT</label>
                                <input  class="form-control" name="sdt" value="{{$nha->sdt}}" placeholder="vui lòng nhập  số điện thoại" />
                            </div>
                            <button type="submit" class="btn btn-default">Cập Nhật</button>
                            <button type="reset" class="btn btn-default">Quay Lại</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection