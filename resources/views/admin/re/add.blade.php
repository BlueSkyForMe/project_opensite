@extends('admin.layout')

@section('content')

	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        广告管理
        <small>添加热门排行</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
        <li><a href="#">广告管理</a></li>
        <li class="active">添加热门排行</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">快速添加</h3>
            </div>
            <!-- /.box-header -->
			@if (count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
			@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
			@endforeach
					</ul>
				</div>
			@endif
			@if (session('info'))
				<div class="alert alert-danger">
					{{ session('info') }}
				</div>
			@endif	
            <!-- form start -->
            <form role="form" action="{{ url ('/admin/re/insert') }}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">场地名称</label>
                  <input type="text" name="re_name" value="" class="form-control" id="exampleInputEmail1" placeholder="请填写场地名称">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">场地地址</label>
                  <input type="text" name="re_site" value="" class="form-control" id="exampleInputEmail1" placeholder="请填写场地地址">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">场地类型</label>
                  <input type="text" name="re_type" value="" class="form-control" id="exampleInputPassword1" placeholder="请填写场地类型">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputPassword1">链接地址</label>
                  <input type="text" name="re_url" value="" class="form-control" id="exampleInputPassword1" placeholder="请填写链接地址">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile"场地图片</label>
                  <input type="file" name="re_image" id="exampleInputFile">
                  <p class="help-block">请上传会场图片</p>
                </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">添加</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection