@extends('admin.layout')

@section('content')

	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        用户管理
        <small>查看列表</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
        <li><a href="#">用户管理</a></li>
        <li class="active">查看列表</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">快速查看列表</h3>
            </div>
            @if (session('info'))
                <div class="alert alert-danger">
                  {{ session('info') }}
                </div>
            @endif
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>用户ID</th>
                  <th>用户名</th>
                  <th>邮箱</th>
                  <th>手机号</th>
                  <th>用户组</th>
                  <th>状态</th>
                  <th>创建时间</th>
                  <th>最后登录时间</th>
                  <th>操作</th>
                </tr>
                </thead>
                <tbody>
              @foreach ($data as $key => $val)
                <tr>
                  <td>{{ $val->id }}</td>
                  <td>{{ $val->userName }}</td>
                  <td>{{ $val->email }}</td>
                  <td>{{ $val->phone }}</td>
                  <td>
                    @if ($val->auth == 2)
                      超级管理员
                    @elseif ($val->auth == 1)
                      管理员 
                    @else
                      普通用户  
                    @endif
                  </td>
                  <td>
                    @if ($val->status == 1)
                      正常
                    @else
                      禁用  
                    @endif
                  </td>
                  <td>{{ $val->created_at }}</td>
                  <td>
                    @if ($val->lastTime == 0)
                      尚未登陆过
                    @else
                      {{ $val->lastTime }}
                    @endif
                  </td>
                  <td>
                    <a href="{{ url('/admin/user/edit') }}/{{ $val->id }}">编辑</a>|
                    <a href="{{ url('/admin/user/updata') }}">禁用</a>|
                    <a href="{{ url('/admin/user/updata') }}">启用</a>|
                    <a href="{{ url('/admin/user/updata') }}">删除</a>
                  </td>
                </tr>
              @endforeach  
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection