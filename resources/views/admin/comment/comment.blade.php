@extends('admin.layout')

@section('content')

	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        评论管理
        <small>查看列表</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
        <li><a href="#">评论管理</a></li>
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

            <form action="/admin/order/index" method="GET">
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
                  <input type="text" placeholder="请输入要搜索的酒店名" name="keywords" value="{{ $request['keywords'] or '' }}" class="form-control">
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
                  <th>评论ID</th>
                  <th>用户名</th>
                  <th>酒店名</th>                  
                  <th>会场名</th>
                  <th>会议人数</th>
                  <th>会议类型</th>
        
                </tr>
                </thead>
                <tbody>

              @foreach ($data as $key => $val)
                <tr>
                  <td>{{ $val->id }}</td>
                  <td>{{ $val->userName }}</td>
                  <td>{{ $val->merchantName }}</td>
                  <td>{{ $val->meetName }}</td>
                  <td>
                      @if($val->time_quantum)
                          {{ $val->time_quantum }}
                      @else
                          无
                      @endif

                  </td>
                  <td>{{ $val->money }}</td>
               
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