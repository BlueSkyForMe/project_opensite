@extends('admin.layout')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        评论管理
        <small>列表</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>主页</a></li>
        <li><a href="#">评论管理</a></li>
        <li class="active">列表</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">快速查询</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

       <form action="{{ url('/admin/comment/index') }}" method="get">
       <div class="row">
       <div class="col-md-2">
                <div class="form-group">
           
                  <select name="num" class="form-control">
                    <option value="10"
          @if(!empty($request['num']) && $request['num'] == '10')
            selected="selected" 
          @endif
                    >10</option>
                    <option value="30"
          @if(!empty($request['num']) && $request['num'] == '30')
            selected="selected" 
          @endif
                    >30</option>
                    <option value="50"
          @if(!empty($request['num']) && $request['num'] == '50')
            selected="selected" 
          @endif
                    >50</option>
                    <option value="100"
          @if(!empty($request['num']) && $request['num'] == '100')
            selected="selected" 
          @endif
                    >100</option>
                  </select>
                </div>
        </div>

        <div class="col-md-4 col-md-offset-6">
                   <div class="input-group input-group-sm">
                    <input value="{{ $request['keywords'] or '' }}" name="keywords" type="text" class="form-control">
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-info btn-flat">搜索</button>
                      </span>
                   </div>
        </div>
        </div>
      </form>
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>商户ID</th>
                  <th>所用场地</th>
                  <th>会议人数</th>
                  <th>评论图片</th>
                  <th>评论内容</th>
                  <th>会议类型</th>
                  <th>操作</th>
                </tr>
                </thead>
                <tbody>

                @foreach($data as $key=>$values)
                <tr class="parent">
                  <td >{{$values->id}}</td>
                  <td >{{$values->mid}}</td>
                  <td>{{$values->pl_site}}</td>
                  <td>{{$values->pl_rencount}}</td>
                  <td>
                  @if($values->pl_image)
                  <img style="width:50px;height:50px; " src="{{ asset('/uploads/photo') }}/{{ $values->pl_image }}" >
                  @endif

                  </td>
                  <td>{{$values->pl_content}}</td>
                  <td>{{$values->pl_type}}</td>
                  <!-- <td><a href="{{ url('/admin/comment/delete') }}/{{ $values->id }}">删除</a></td> -->
                </tr>
                
                @endforeach
                </tbody>
              </table>
              {{ $data->appends($request)->links() }}
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

@endsection


