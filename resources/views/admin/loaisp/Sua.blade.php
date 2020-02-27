@extends('admin.page.home')
@section('content')
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Danh MỤC
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
                        <form action="admin/danhmuc/edit/{{$loai->id}}" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label> Name</label>
                                <input class="form-control" name="name" placeholder="Please Enter Category Name" value="{{$loai->name}}" />
                            </div>
                           <div class="form-group">
                                <label>Images</label>
                                <input type="file" name="img"  value="{{$loai->img}}" />
                            </div>
                            <div class="form-group">
                                <label>Mô Tả</label>
                                <textarea class="form-control" name="descution" value="{{$loai->descution}}"rows="3"  ></textarea>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <label class="radio-inline">
                                    <input name="notes"   checked="" value="{{$loai->notes}}" type="radio">Máy Tính Mới
                                </label>
                                <label class="radio-inline">
                                    <input name="notes" value="{{$loai->notes}}" type="radio">Máy Tính Cũ
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Category Edit</button>
                            <button type="reset" class="btn btn-default">Reset</button>

                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection