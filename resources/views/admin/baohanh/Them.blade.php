@extends('admin.page.home')
@section('content')
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Bảo Hành
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
                        <form action="admin/baohanh/add" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                             <div class="form-group">
                                <label>Sản Phẩm</label>
                                <select class="form-control" name="id_sp">
                                    @foreach($sp as $ps)
                                    <option value="{{$ps->id}}">{{$ps->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Mô Tả</label>
                                <input class="form-control" name="mota"  placeholder="Nhập Mô Tả" />
                            </div>
                            <div class="form-group">
                                <label>Trạng Thái</label>
                                <input  class="form-control" name="trangthai"  placeholder="Vui Lòng Nhập Trạng Thái" />
                            </div>
                            <div class="form-group">
                                <label>Chi Phí</label>
                                <input class="form-control" name="chiphi"  placeholder="Vui lòng nhập Chi Phí" />
                            </div>
                            <div class="form-group">
                                <label>Ngày Bảo Hành</label>
                                <input type="date" class="form-control" name="ngaybaohanh"  placeholder="Vui Lòng nhập ngày bảo hành" />
                            </div>
                            <div class="form-group">
                                <label>Ngày Hẹn</label>
                                <input type="date" class="form-control" name="ngayhen"  placeholder="Vui Lòng Nhập ngày hẹn lấy máy" />
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
