@extends('admin.layout')

@section('content')

	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        用户管理
        <small>编辑用户</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
        <li><a href="#">用户管理</a></li>
        <li class="active">编辑用户</li>
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
              <h3 class="box-title">快速编辑</h3>
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
            <form role="form" action="{{ url ('/admin/manage/update') }}/{{ $data->id }}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">用户名</label>
                  <input type="text" name="userName" value="{{ $data->userName }}" class="form-control" id="exampleInputEmail1" disabled />
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">邮箱</label>
                  <input type="email" name="email" value="{{ $data->email }}" class="form-control" id="exampleInputEmail1" placeholder="请输入邮箱">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">密码</label>
                  <input type="password" name="password" value="{{ $data->password }}" class="form-control" id="exampleInputPassword1" placeholder="请填写密码">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">密码</label>
                  <input type="password" name="re_password" value="" class="form-control" id="exampleInputPassword1" placeholder="请填写密码">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">头像</label>
                  <input type="file" name="photo" id="exampleInputFile">
                  <p class="help-block">请上传你的大头贴</p>
                </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">更新</button>
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