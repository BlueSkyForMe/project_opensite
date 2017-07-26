@extends('tenant.layout')

@section('content')

<div id="page-wrapper" style="min-height: 255px;">
    <div class="row">
        <div class="col-lg-12">
            <h4 class="page-header">编辑会场</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    编辑会场信息
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
                            <form role="form" action="{{ url('/tenant/mansite/siteUpdate') }}/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="uid" value="{{ $data->uid }}">
                                <div class="form-group">
                                    <label>*会场名称</label>
                                    <input id="edit_meetname" class="form-control" name="meetName" value="{{ $data->meetName }}">
                                    <span style="display:none;"></span>
                                </div>
                                <div class="form-group">
                                    <label>*会场面积</label>
                                    <input class="form-control" id="disabledInput" type="text" name="meetArea" value="{{ $data->meetArea }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label>*最多容纳人数</label>
                                    <input class="form-control" id="disabledInput" type="text" name="meetArea" value="{{ $data->meetPerson }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label>*会场价格</label>
                                    <input id="edit_meetprice" class="form-control" name="meetPrice" value="{{ $data->meetPrice }}">
                                    <span style="display:none;"></span>
                                </div>
                                <div class="form-group">
                                    <label>*曾举办活动</label>
                                    <textarea id="activity" style="resize:none;" class="form-control" name="activity" rows="3" placeholder="例：互联网大会；创业者协会...">{{ $data->activity }}</textarea>
                                    <span style="display:none;"></span>
                                </div>
                                <div class="form-group">
                                    <label>更换会场照片</label>
                                    <input id="edit_img" type="file" name="meetImg">
                                    <span style="display:none;"></span>
                                </div>
                                <button id="renewal" type="submit" class="btn btn-primary">更新</button>
                            </form>
                            <div style="width:54px;height:34px;margin-top:-34px;margin-left:75px;">
                                <a href="{{ url('/tenant/mansite/siteShow') }}/{{ $data->uid }}">
                                    <button type="button" class="btn btn-default">放弃</button>
                                </a>
                            </div>
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

        // 获取焦点事件
        $("#edit_meetname").on("focus", function()
            {
                // 隐藏提示
                $(this).next().css("display", "none");
            });
        $("#edit_meetprice").on("focus", function()
            {
                // 隐藏提示
                $(this).next().css("display", "none");
            });
        $("#activity").on("focus", function()
            {
                // 隐藏提示
                $(this).next().css("display", "none");
            });
        $("#edit_img").on("click", function()
            {
                // 隐藏提示
                $(this).next().css("display", "none");
            });

        // 点击更新事件
        $("#renewal").on("click", function()
            {
                // 判断会场名称是否为空
                var nameVal = $(this).parent().find("#edit_meetname").val();
                if(nameVal == "")
                {
                    // 提示错误
                    $(this).parent().find("#edit_meetname").next().html("×请输入会场名称");
                    $(this).parent().find("#edit_meetname").next().css("display", "block");
                    $(this).parent().find("#edit_meetname").next().css("color", "red");
                    return false;
                }

                // 判断价格是否为空
                var priceVal = $(this).parent().find("#edit_meetprice").val();
                if(priceVal == "")
                {
                    // 提示错误
                    $(this).parent().find("#edit_meetprice").next().html("×请输入会场价格");
                    $(this).parent().find("#edit_meetprice").next().css("display", "block");
                    $(this).parent().find("#edit_meetprice").next().css("color", "red");
                    return false;
                }

                // 判断曾举办活动是否为空
                var actiVal = $(this).parent().find("#activity").val();
                if(actiVal == "")
                {
                    // 提示错误
                    $(this).parent().find("#activity").next().html("×请输入曾举办活动");
                    $(this).parent().find("#activity").next().css("display", "block");
                    $(this).parent().find("#activity").next().css("color", "red");
                    return false;
                }

                // 获取图片val
                var imgVal =$(this).parent().find("#edit_img").val();

                // 定义图片类型 
                var imgArr = ["bmp","jpg","gif","png"];

                // 判断
                if(imgVal != "")
                {
                    var len = imgVal.length;
                    var ext = imgVal.substring(len-3,len).toLowerCase();

                    // 判断是否为图片
                    if($.inArray(ext,imgArr) == -1)
                    {
                        // 提示错误信息
                        $(this).parent().find("#edit_img").next().css('display', 'block');
                        $(this).parent().find("#edit_img").next().css('color', 'red');
                        $(this).parent().find("#edit_img").next().html('×支持格式（jpg,gif,png）');

                        // 阻止提交
                        return false;
                    }
                }
            });

    </script>

@endsection

