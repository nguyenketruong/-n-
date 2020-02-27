@extends('admin.page.home')
@section('content')
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Danh Mục
                            <small>Danh Sach</small>
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
                                <th>Mô Tả</th>
                                <th>Notes</th>
                                <th>Xóa</th>
                                <th>sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt = 0 ?>
                            @foreach($loai as $item)
                            <?php $stt=$stt+1 ?>
                            <tr class="odd gradeX" align="center">
                                <td>{!!$stt!!}</td>
                                <td>{!!$item["name"]!!}</td>
                                <td>{!!$item["descution"]!!}</td>
                                <td>{!!$item["notes"]!!}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/danhmuc/delete/{{$item['id']}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/danhmuc/edit/{{$item['id']}}">Edit</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
    </div>
@endsection