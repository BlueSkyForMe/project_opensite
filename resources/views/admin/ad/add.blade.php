@extends('admin.layout')

@section('content')

	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        广告管理
        <small>添加友情链接</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
        <li><a href="#">广告管理</a></li>
        <li class="active">添加友情链接</li>
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
            <form role="form" action="{{ url ('/admin/ad/insert') }}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">广告名称</label>
                  <input type="text" name="ad_name" value="" class="form-control" id="exampleInputEmail1" placeholder="请填写公司名称">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">公司地址</label>
                  <input type="text" name="ad_site" value="" class="form-control" id="exampleInputEmail1" placeholder="请填写公司地址">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">会场数量</label>
                  <input type="text" name="ad_count" value="" class="form-control" id="exampleInputPassword1" placeholder="请填写会场数量">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">会场面积</label>
                  <input type="text" name="ad_area" value="" class="form-control" id="exampleInputPassword1" placeholder="请填写会场面积">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">容纳人数</label>
                  <input type="text" name="ad_rencount" value="" class="form-control" id="exampleInputPassword1" placeholder="请填写会场面积">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">联系电话</label>
                  <input type="text" name="ad_phone" value="" class="form-control" id="exampleInputPassword1" placeholder="请填写会场面积">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">链接地址</label>
                  <input type="text" name="ad_url" value="" class="form-control" id="exampleInputPassword1" placeholder="请填写会场面积">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">会场图片</label>
                  <input type="file" name="ad_image" id="exampleInputFile">
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