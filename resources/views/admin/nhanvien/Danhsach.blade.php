@extends('admin.page.home')
@section('content')
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">NHÂN VIÊN
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
                                <th>Name</th>
                                <th>Chức Vụ</th>
                                <th>Email</th>
                                <th>Lương</th>
                                <th>Địa Chỉ</th>
                                <th>SỐ ĐT</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt = 0 ?>
                            @foreach($nv as $vn)
                            <?php $stt=$stt+1 ?>
                            <tr class="odd gradeX" align="center">
                                <td>{!!$stt!!}</td>
                                <td>{!!$vn["name"]!!}</td>
                                <td>{!!$vn["chucvu"]!!}</td>
                                <td>{!!$vn["email"]!!}</td>
                                <td>{!!$vn["luong"]!!}VNĐ</td>
                                <td>{!!$vn["diachi"]!!}</td>
                                <td>{!!$vn["sdt"]!!}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/nhanvien/delete/{{$vn['id']}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/nhanvien/edit/{{$vn['id']}}">Edit</a></td>
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