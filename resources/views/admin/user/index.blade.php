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

            @if (session('userInfo'))
                <div class="alert alert-danger">
                  {{ session('userInfo') }}
                </div>
            @endif

            <form action="/admin/user/index" method="GET">
                <div class="col-md-2">
                  <div class="form-group">
                    <select name="num" class="form-control">
                      <option value="10" 

                        @if(!empty($request['num']) && $request['num'] == '10')
                          selected="selected" 
                        @endif
                      >10页</option>
                      <option value="20"
                        @if(!empty($request['num']) && $request['num'] == '20')
                          selected="selected" 
                        @endif

                      >20页</option>
                    </select>
                  </div>
              </div>
              <div class="col-md-6"></div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="text" placeholder="请输入要搜索的用户名" name="keywords" value="{{ $request['keywords'] or '' }}" class="form-control">
                  <span class="input-group-btn">
                    <button type="submit" class="btn btn-info btn-flat">搜索</button>
                  </span>
                </div>
              </div>
            </form>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>用户ID</th>
                  <th>用户名</th>
                  <th>手机号</th>                  
                  <th>邮箱</th>
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
                  <td>
                      @if($val->phone)
                          {{ $val->phone }}
                      @else
                          无
                      @endif
                  </td>
                  <td>
                      @if($val->email)
                          {{ $val->email }}
                      @else
                          无
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
                    @if ($val->status == 1)
                    <a href="{{ url('/admin/user/state') }}/{{ $val->id }}/{{ $val->status }}">禁用</a>
                    @else
                    <a href="{{ url('/admin/user/state') }}/{{ $val->id }}/{{ $val->status }}">启用</a>
                    @endif
                  </td>
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
  <!-- /.content-wrapper -->
@endsection

@section('js')

  <script type="text/javascript">

    // 获取要删除的id
    var id = 0;

    $('.del').on('click', function()
      {
        // 获取id
        id = $(this).parents('tr').find('.uid').html();
      });

    // 确认删除事件
    $('#delete').on('click', function()
      {
        location.href='/admin/manage/delete/' + id;
      });

  </script>

@endsection