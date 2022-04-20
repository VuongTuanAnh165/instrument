@extends('admin.layouts.app')

@section('title')
<title>Thêm mới landing page</title>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm mới landing page</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form class="form-horizontal" action="{{route('landingpages.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-2 control-lable">Tên landing page</label>
                            <div class="col-sm-8">
                                <input type="text" name="name" class="form-control" placeholder="Tên landing page" value="{{old('name')}}">
                                @error('name')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <div class="col-sm-8">
                                <input type="file" name="image" class='form-control-file' onchange="preview_thumbail(this);">
                                <img id="img" src="#" alt="your image">
                                @error('image')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-lable">Link học</label>
                            <div class="col-sm-8">
                                <input type="text" name="link" class="form-control" placeholder="Link học" value="{{old('link')}}">
                                @error('link')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="from-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success">Lưu</button>
                            </div>
                        </div>
                    </form>
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