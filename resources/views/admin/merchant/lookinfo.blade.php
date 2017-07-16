@extends('admin.layout')

@section('content')

	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        商户审核
        <small>查看列表</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
        <li><a href="#">商户审核</a></li>
        <li class="active">未通过审核列表</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">查看未通过商户信息</h3>
            </div>
            @if (session('info'))
                <div class="alert alert-danger">
                  {{ session('info') }}
                </div>
            @endif
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <tbody>
                  <tr>
                    <td width="200px">商户名称 :</td>
                    <td>{{ $data->userName }}</td>
                  </tr>
                  <tr>
                    <td>商户地址 :</td>
                    <td>{{ $data->address }}</td>
                  </tr>
                  <tr>
                    <td>联系方式 :</td>
                    <td>{{ $data->phone }}</td>
                  </tr>
                  <tr>
                    <td>场地类型 :</td>
                    <td>{{ $data->class }}</td>
                  </tr>
                  <tr>
                    <td>酒店星级 :</td>
                    <td>
                      @if ($data->star == "0")
                        无
                      @else
                        {{ $data->star }} 
                      @endif 
                    </td>
                  </tr>
                  <tr>
                    <td>租赁凭证 :</td>
                    <td>
                      <img width="100" height="110" src="{{ asset ('/uploads/img') }}/{{ $data->img }}">
                    </td>
                  </tr>
                  <tr>
                    <td>提供服务 :</td>
                    <td>
                      @if ($data->servers == null)
                        无
                      @else
                        {{ $data->servers }}  
                      @endif  
                    </td>
                  </tr>
                  <tr>
                    <td>客房 :</td>
                    <td>
                      @if ($data->room == 0)
                        无
                      @else
                        有
                      @endif  
                    </td>
                  </tr>
                  <tr>
                    <td>餐饮 :</td>
                    <td>
                      @if ($data->repast == 0)
                        无
                      @else
                        有
                      @endif 
                    </td>
                  </tr>
                  <tr>
                    <td>未通过原因</td>
                    <td>
                      {{ $data->content }}
                    </td>
                  </tr>
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

@section('js')
  
    <script type="text/javascript">

      // 单击不通过按钮事件
      $("#btn_no").on("click", function()
        {
            // 显示通不过的理由
            $(this).parent().next().css('display', 'block');

            // 隐藏当前
            $(this).parent().css('display', 'none');

            // 点击上一步事件
            $("#btn_back").on('click', function()
              {
                  // 显示按钮
                  $(this).parent().parent().prev().css('display', 'block');

                  // 隐藏当前
                  $(this).parent().parent().css('display', 'none');

                  return false;

              });
        });

      // 点击提交按钮
      $("#sub_reason").on('click', function()
        {
            // 文本域的值
            var val = $(this).parent().find('.form-control').val();

            // 判断
            if(!val)
            {
                // 提示
                $(this).next().css('display', 'block');
                // 阻止提交
                return false;
            }
        });

    </script>

@endsection