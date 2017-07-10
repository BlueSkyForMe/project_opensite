@extends('admin.layout')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        友情链接
        <small>preview of simple tables</small>
      </h1>
     
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a href="{{ url('admin/ad/add') }}"><h4 class="box-title label label-primary">添加友情链接</h4></a>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>广告名称</th>
                  <th>公司地址</th>
                  <th>会场图片</th>
                  <th>会场数量</th>
                  <th>面积</th>
                  <th>容纳人数</th>
                  <th>联系电话</th>
                  <th>链接地址</th>
                  <th>操作</th>
                </tr>

                @foreach ($data as $key => $val)
                <tr>
                  <td>{{ $val->id }}</td>
                  <td>{{ $val->ad_name }}</td>
                  <td>{{ $val->ad_site }}</td>
                  <td><img src="{{ asset('/uploads/photo') }}/{{ $val->ad_image }}" width="50px" height="50px"></td>
                  <td>{{ $val->ad_count }}</td>
                  <td><span class="label label-success">{{ $val->ad_area }}平方米</span></td>
                  <td>{{ $val->ad_rencount }}</td>
                  <td>{{ $val->ad_phone }}</td>
                  <td>{{ $val->ad_url }}</td>
                  <td><a href="{{ url('/admin/ad/edit') }}/{{ $val->id }}">修改</a>&nbsp;|&nbsp;
                  <a href="{{ url('/admin/ad/delete') }}/{{ $val->id }}">删除</a></td>
                </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

@endsection