@extends('admin.page.home')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Loại Nhân Viên
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
                        <form action="admin/loainv/edit/{{$lnv->id}}" method="POST">
                             <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group"> 
                                <label>Tên Phòng Ban</label>
                                <input class="form-control" name="tenphongban" value="{{$lnv->tenphongban}}" placeholder="Vui Lòng Nhập Tên Phòng Ban" />
                            </div>
                            <div class="form-group">
                                <label>Chúc Vụ</label>
                                <input  class="form-control" name="chucvu" value="{{$lnv->chucvu}}" placeholder="vui lòng nhập  chức Vụ" />
                            </div>
                            <button type="submit" class="btn btn-default">ADD </button>
                            <button type="reset" class="btn btn-default">Quay Lại</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection