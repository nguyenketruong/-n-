@extends('admin.page.home')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Khách Hàng
                            <small>List</small>
                        </h1>
                    </div>
                    <div class="col-lg-12" style="padding-bottom:30px">
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
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Địa Chỉ</th>
                                <th>Ngày Sinh</th>
                                <th>SỐ ĐT</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt = 0 ?>
                            @foreach($kh as $em)
                            <?php $stt=$stt+1 ?>
                            <tr class="odd gradeX" align="center">
                                <td>{!!$stt!!}</td>
                                <td>{!!$em["name"]!!}</td>
                                <td>{!!$em["email"]!!}</td>
                                <td>{!!$em["diachi"]!!}</td>
                                <td>{!!$em["ngaysinh"]!!}</td>
                                <td>{!!$em["sdt"]!!}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/khachhang/delete/{{$em['id']}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/khachhang/edit/{{$em['id']}}">Edit</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection