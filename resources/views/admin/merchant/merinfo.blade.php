@extends('admin.layout')

@section('content')

	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- 显示大图模态框 -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <img id="show_mer_bigimg" style="margin-left:215px;" width="450px" height="600px" src="">
        </div>
      </div>
    </div>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        商户审核
        <small>查看列表</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
        <li><a href="#">商户审核</a></li>
        <li class="active">查看列表</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">查看商户信息</h3>
            </div>
            @if (session('info'))
                <div class="alert alert-danger">
                  {{ session('info') }}
                </div>
            @endif
            <!-- /.box-header -->
            <div class="box-body">
              <span style="color:red"> * 请仔细核对商户信息</span>
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
                      <img width="100" height="110" src="{{ asset ('/uploads/img') }}/{{ $data->img }}"><br/>
                      <a id="mer_bigimg" style="margin-left:20px;" data-toggle="modal" data-target=".bs-example-modal-lg" href="javascrpt:">查看大图</a>
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
                </tbody>
              </table>
              <hr/>
              <div>
                <a href="{{ url ('/admin/merchant/pass') }}/{{ $data->uid }}" class="btn btn-primary active" role="button"> 通过</a>
                <button id="btn_no" type="button" class="btn btn-primary active"> 不通过</button>
                <span style="color:red">注意：不予通过要说明其原因</span>
              </div>
              <div class="col-xs-6" style="display:none; margin-left:-15px; margin-top:15px;">
                <form action="{{ url ('/admin/merchant/noreason') }} " method="POST">
                  {{ csrf_field() }}
                  <input type="hidden" name="uid" value="{{ $data->uid }}">
                  <textarea name="content" class="form-control" rows="3" placeholder="请填写不予通过的原因"></textarea><br/>
                  <button id="btn_back" type="button" class="btn btn-primary active"> 上一步</button>
                  <button id="sub_reason" type="submit" class="btn btn-primary active"> 提交</button>
                  <span style="display:none; color:red;">* 请填写不予通过的原因</span>
                </form>
              </div>   
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

      // 点击查看大图事件
      $("#mer_bigimg").on("click", function()
        {
          var bigimg = $(this).prev().prev().attr("src");
          $("#show_mer_bigimg").attr("src", bigimg);
        });

    </script>

@endsection