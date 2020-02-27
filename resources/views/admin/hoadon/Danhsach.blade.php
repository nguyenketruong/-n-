@extends('admin.page.home')
@section('content')
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Hóa ĐƠN
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
                                <th>Tên KHách Hàng</th>
                                <th>Sản Phẩm</th>
                                <th>Số Lượng</th>
                                <th>Ngày</th>
                                <th>Tổng Tiền</th>
                                <th>Hình Thức</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt = 0 ?>
                            @foreach($hd as $dh)
                            <?php $stt=$stt+1 ?>
                            <tr class="odd gradeX" align="center">
                                <td>{!!$stt!!}</td>
                                <td>{!!$dh["hoten"]!!}</td>
                                <td>{!!$dh["name"]!!}</td>
                                <td>{!!$dh["soluong"]!!}</td>
                                <td>{!!$dh["ngay"]!!}</td>
                                <td>{!!$dh["tongtien"]!!}</td>
                                <td>{!!$dh["hinhthucthanhtoan"]!!}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/hoadon/delete/{{$dh['id']}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/hoadon/edit/{{$dh['id']}}">Edit</a></td>
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