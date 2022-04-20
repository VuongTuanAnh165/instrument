@extends('admin.layouts.app')

@section('title')
<title>Landing Page</title>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Landing Page <a href="{{ route('landingpages.create') }}" class="btn btn-success">Thêm mới</a></h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách Landing Page</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Tên Landing Page</th>
                                        <th>Hình ảnh</th>
                                        <th>Link học</th>
                                        <th>Người cập nhật cuối cùng</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($landingpages as $landingpage)
                                    <tr>
                                        <td>{{$landingpage->name}}</td>
                                        <td><a href="{{asset($landingpage->image)}}" target="_blank"><img width="100px" src="{{$landingpage->image}}"></a></td>
                                        <td>{{$landingpage->link}}</td>
                                        <td>{{optional($landingpage->user)->name}}</td>
                                        <td>
                                            <a class="btn btn-xs btn-info" href="{{ route('landingpages.edit', ['id' => $landingpage->id]) }}"><i class="fa fa-edit"></i>Sửa</a>
                                            <a class="btn btn-xs btn-danger" href="{{route('landingpages.destroy',['id'=>$landingpage->id])}}"><i class="fa fa-times"></i>Xóa</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Tên Landing Page</th>
                                        <th>Hình ảnh</th>
                                        <th>Link học</th>
                                        <th>Người cập nhật cuối cùng</th>
                                        <th>Hành động</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection