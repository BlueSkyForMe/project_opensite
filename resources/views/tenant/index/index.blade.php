@extends('tenant.layout')

@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h4 class="page-header">商户信息</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            @if (session('info'))
            <div class="alert alert-danger">
                {{ session('info') }}
            </div>
            @endif
            <div class="panel panel-default">
                <!-- /.panel-heading -->
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr class="success">
                                <td width="150px">场地名称：</td>
                                <td width="450px">{{ session('hmer')->userName }}</td>
                                <td width="150px">场地类型：</td>
                                <td>{{ $mer->class }}</td>
                            </tr>
                            <tr class="warning">
                                <td>地址：</td>
                                <td>{{ $mer->address }}</td>
                                <td>开业时间：</td>
                                @if (isset($site))
                                <td>{{ $site->openTime }}年</td>
                                @else
                                <td></td>
                                @endif
                            </tr>
                            <tr class="danger">
                                <td width="200px">最近装修时间：</td>
                                @if (isset($site))
                                <td>
                                    @if ($site->fitmentTime == null)
                                      无
                                    @else
                                      {{ $site->fitmentTime }}年
                                    @endif    
                                </td>
                                @else
                                <td></td>
                                @endif
                                <td>会场数量：</td>
                                @if (isset($site))
                                <td>{{ $site->siteNumber }}个</td>
                                @else
                                <td></td>
                                @endif
                            </tr>
                            <tr class="success">
                                <td>客房数量：</td>
                                @if (isset($site))
                                <td>
                                    @if ($site->guestRoom == null)
                                      无
                                    @else
                                      {{ $site->guestRoom }}个
                                    @endif  
                                </td>
                                @else
                                <td></td>
                                @endif
                                <td>最大会场面积：</td>
                                @if (isset($site))
                                <td>{{ $site->maxArea }}平方米</td>
                                @else
                                <td></td>
                                @endif
                            </tr>
                            <tr class="warning">
                                <td>最多容纳人数：</td>
                                @if (isset($site))
                                <td>{{ $site->maxPerson }}人</td>
                                @else
                                <td></td>
                                @endif
                                <td>可提供的配套服务：</td>
                                @if (isset($site))
                                <td>{{ $site->support }}</td>
                                @else
                                <td></td>
                                @endif
                            </tr>
                            <tr class="danger">
                                <td>可提供的免费服务：</td>
                                <td>{{ $mer->servers }}</td>
                                <td>停车位：</td>
                                @if (isset($site))
                                <td>
                                    @if ($site->carNumber == 0)
                                    无
                                    @else
                                    有
                                    @endif
                                </td>
                                @else
                                <td></td>
                                @endif
                            </tr>
                            <tr class="warning">
                                <td>轮播图：</td>
                                @if (isset($merimg))
                                <td>
                                @foreach ($merimg as $key => $val)
                                  <img class="show_bigimg" data-toggle="modal" data-target=".bs-example-modal-sm" style="margin-left:10px;" width="60px" height="50px" src="{{ asset('/uploads/merimg') }}/{{ $val->img }}" title="点击查看大图">
                                @endforeach
                                </td>
                                <td></td>
                                <td></td>
                                @else
                                <td></td>
                                <td></td>
                                <td></td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>
<!-- /#page-wrapper -->

@endsection

@section('js')

    <script type="text/javascript">

        // 点击查看大图
        $(".show_bigimg").on("click", function()
            {
                // 获取图片路径
                var bigimg = $(this).attr("src");

                // 找到模态框赋值路径
                $(this).parents("body").find("#modal_reveal_bigimg").attr("src", bigimg);
            });

    </script>

@endsection