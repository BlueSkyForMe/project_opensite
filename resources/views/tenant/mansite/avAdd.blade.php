@extends('tenant.layout')

@section('content')

<div id="page-wrapper" style="min-height: 255px;">
    <div class="row">
        <div class="col-lg-12">
            <h4 class="page-header">AV设备</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    添加AV设备
                </div>
                @if (session('info'))
                <div class="alert alert-danger">
                    {{ session('info') }}
                </div>
                @endif
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-6">
                            <span id="serror" style="color:red;">注意：带*的信息为必填项</span>
                            <form role="form" action="{{ url('/tenant/mansite/avInsert') }}/{{ session('hmer')->id }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                            <label>*选择设备</label>
                                            <select id="av_name" name="avType" class="form-control">
                                                <option value="0">请选择</option>
                                                <option value="1">音响</option>
                                                <option value="2">麦克风</option>
                                                <option value="3">投影仪</option>
                                            </select>
                                            <span style="display:none;"></span>
                                        </div>
                                <div class="form-group">
                                    <label>*价格</label>
                                    <input id="av_price" class="form-control" name="avPrice" placeholder="天/元">
                                    <span style="display:none;"></span>
                                </div>
                                <button id="av_sub" type="submit" class="btn btn-primary">添加</button>
                                <button type="reset" class="btn btn-default">重置</button>
                            </form>
                        </div>
                        <div class="col-lg-5"></div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
@endsection

@section('js')
    
    <script type="text/javascript">

        // 下拉框事件
        $("#av_name").on("change", function()
            {
                $(this).next().css("display", "none");
            });

        // 获取焦点事件
        $("#av_price").on("focus", function()
            {
                $(this).next().css("display", "none");
            });

        // 点击添加事件
        $("#av_sub").on("click", function()
            {
                // 判断是否选择客房类型
                var avname = $(this).parent().find("#av_name").val();
                if(avname == 0)
                {
                    $(this).parent().find("#av_name").next().html("×请选择设备类型");
                    $(this).parent().find("#av_name").next().css("color", "red");
                    $(this).parent().find("#av_name").next().css("display", "block");
                    return false;
                }

                // 判断是填写客房价格
                var avprice = $(this).parent().find("#av_price").val();
                if(avprice == "")
                {
                    // 提示错误
                    $(this).parent().find("#av_price").next().html("×请输入价格");
                    $(this).parent().find("#av_price").next().css("display", "block");
                    $(this).parent().find("#av_price").next().css("color", "red");

                    return false;
                }
                else
                {
                    // 正则匹配
                    var avreg = /^[0-9]{1,}$/;
                    var avres = avreg.test(avprice);

                    if(!avres)
                    {
                        // 提示错误
                        $(this).parent().find("#av_price").next().html("×输入有误");
                        $(this).parent().find("#av_price").next().css("display", "block");
                        $(this).parent().find("#av_price").next().css("color", "red");
                        return false;
                    } 
                }
            });

    </script>

@endsection


