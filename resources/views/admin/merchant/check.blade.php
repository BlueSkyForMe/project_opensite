@extends('admin.layout')

@section('content')

	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        商户审核
        <small>待审核商户</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
        <li><a href="#">商户审核</a></li>
        <li class="active">待审核商户</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">待审核列表</h3>
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
                  <th>商户ID</th>
                  <th>商户名</th>
                  <th>地址</th>                  
                  <th>联系方式</th>
                  <th>提交时间</th>
                  <th>操作</th>
                </tr>
                </thead>
                <tbody>
              @foreach ($data as $key => $val)
                <tr>
                  <td>{{ $val->id }}</td>
                  <td>{{ $val->userName }}</td>
                  <td>{{ $val->address }}</td>
                  <td>{{ $val->phone }}</td>
                  <td>{{ $val->created_at }}</td>
                  <td>
                    <a href="{{ url ('/admin/merchant/merinfo') }}/{{ $val->id }}">审核信息</a>
                  </td>
                </tr>
              @endforeach  
                </tbody>
              </table>
              {{ $data->links() }}
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