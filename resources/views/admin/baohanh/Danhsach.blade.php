@extends('admin.page.home')
@section('content')
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Bảo Hành
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
                                <th> Tên Sản Phẩm</th>
                                <th>Mô Tả</th>
                                <th>Trạng Thái</th>
                                <th>Chi Phí</th>
                                <th>Ngày Bảo Hành</th>
                                <th>Ngày Hẹn</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt = 0 ?>
                            @foreach($bh as $hb)
                            <?php $stt=$stt+1 ?>
                            <tr class="odd gradeX" align="center">
                                <td>{!!$stt!!}</td>
                                <td>{!!$hb["name"]!!}</td>
                                <td>{!!$hb["mota"]!!}</td>
                                <td>{!!$hb["trangthai"]!!}</td>
                                <td>{!!$hb["chiphi"]!!}VNĐ</td>
                                <td>{!!$hb["ngaybaohanh"]!!}</td>
                                <td>{!!$hb["ngayhen"]!!}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/baohanh/delete/{{$hb['id']}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/baohanh/edit/{{$hb['id']}}">Edit</a></td>
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