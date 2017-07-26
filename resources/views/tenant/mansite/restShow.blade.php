@extends('tenant.layout')

@section('content')

<div id="page-wrapper" style="min-height: 358px;">
    <div class="row">
        <div class="col-lg-12">
            <h4 class="page-header">茶歇信息</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    查看客房信息
                </div>
                @if (session('info'))
                <div class="alert alert-danger">
                    {{ session('info') }}
                </div>
                @endif
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr align="center">
                                    <th>茶歇类型</th>
                                    <th>价格</th>
                                    <th>展示图</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $key => $val)
                                <tr align="center">
                                    <td>
                                        @if($val->restType == 1)
                                            中式  
                                        @else
                                            西式    
                                        @endif
                                    </td>
                                    <td>{{ $val->restPrice }}元</td>
                                    <td>
                                        <img width="60px" height="50px" src="{{ asset('/uploads/restimg') }}/{{ $val->restImg }}"><br/>
                                        <a class="show_rest_bigimg" href="javascript:" data-toggle="modal" data-target=".bs-example-modal-sm">查看大图</a>
                                    </td>
                                    <td>
                                        <a href="{{ url('tenant/mansite/restEdit') }}/{{ $val->id }}">编辑</a> | 
                                        <a href="{{ url('tenant/mansite/restDelete') }}/{{ $val->id }}">删除</a>
                                    </td>
                                </tr>
                            @endforeach    
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>

@endsection

@section('js')

    <script type="text/javascript">

        // 点击查看大图
        $(".show_rest_bigimg").on("click", function()
            {
                // 获取图片路径
                var rest_bigimg = $(this).prev().prev().attr("src");

                // 找到模态框赋值路径
                $(this).parents("body").find("#modal_reveal_bigimg").attr("src", rest_bigimg);
            });

    </script>

@endsection