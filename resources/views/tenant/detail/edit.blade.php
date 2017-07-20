@extends('tenant.layout')

@section('content')

<div id="page-wrapper" style="min-height: 255px;">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-header">修改信息</h4>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            修改基本信息
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
                                    <form role="form" action="{{ url('/tenant/detail/update') }}/{{ $data->uid }}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label>*开业时间</label>
                                            <input id="ot" class="form-control" name="openTime" value="{{ $data->openTime }}" placeholder="开业时间:单位/年">
                                            <span style="color:green;">例：1998</span>
                                        </div>
                                        <div class="form-group">
                                            <label>*最近装修时间</label>
                                            <input id="ft" class="form-control" name="fitmentTime" value="{{ $data->fitmentTime }}" placeholder="最近装修时间:单位/年">
                                            <span style="color:green;">例：2010</span>
                                        </div>
                                        <div class="form-group">
                                            <label>*会场数量</label>
                                            <input id="sn" class="form-control" name="siteNumber" value="{{ $data->siteNumber }}" placeholder="会场数量:单位/个">
                                            <span style="color:green;">例：5</span>
                                        </div>
                                        <div class="form-group">
                                            <label>*客房数量</label>
                                            <input id="gr" class="form-control" name="guestRoom" value="{{ $data->guestRoom }}" placeholder="客房数量:单位/个">
                                            <span style="color:green;">例：200</span>
                                        </div>
                                        <div class="form-group">
                                            <label>*最大会场面积</label>
                                            <input id="maa" class="form-control" name="maxArea" value="{{ $data->maxArea }}" placeholder="最大会场面积:单位/平方米">
                                            <span style="color:green;">例：2000</span>
                                        </div>
                                        <div class="form-group">
                                            <label>*最多容纳人数</label>
                                            <input id="map" class="form-control" name="maxPerson" value="{{ $data->maxPerson }}" placeholder="最多容纳人数:单位/人">
                                            <span style="color:green;">例：20000</span>
                                        </div>
                                        <div class="form-group">
                                            <label>可提供配套服务</label>
                                            <label class="checkbox-inline">
                                                <input class="sup" type="checkbox" name="support[]" value="0" 
                                                 @if(array_key_exists('0', $support))
                                                   checked="checked" 
                                                 @endif   
                                                >茶歇
                                            </label>
                                            <label class="checkbox-inline">
                                                <input class="sup" type="checkbox" name="support[]" value="1"
                                                @if(array_key_exists('1', $support))
                                                   checked="checked" 
                                                 @endif 
                                                >客房
                                            </label>
                                            <label class="checkbox-inline">
                                                <input class="sup" type="checkbox" name="support[]" value="2"
                                                @if(array_key_exists('2', $support))
                                                   checked="checked" 
                                                 @endif 
                                                >AV设备
                                            </label>
                                            <label class="checkbox-inline">
                                                <input class="sup" type="checkbox" name="support[]" value="3"
                                                @if(array_key_exists('3', $support))
                                                   checked="checked" 
                                                 @endif 
                                                >停车场
                                            </label>
                                            <label style="color:green;" class="checkbox-inline">
                                                可多选
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>停车场</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="carNumber" id="optionsRadiosInline2" value="1" 
                                                @if($data->carNumber == 1)
                                                checked
                                                @endif
                                                >有
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="carNumber" id="optionsRadiosInline1" value="0"
                                                @if($data->carNumber == 0)
                                                checked
                                                @endif
                                                >无
                                            </label>
                                        </div>
                                        <button type="submit" class="btn btn-primary">更新</button>
                                    </form>
                                    <div style="width:54px;height:34px;margin-top:-34px;margin-left:66px">
                                        <a href="{{ url('/tenant/index') }}"><button class="btn btn-default">放弃</button></a>
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

        // 获取开业时间input焦点事件
        $("#ot").on("focus", function()
            {
                // 给予提示
                $(this).next().html("例：1998");
                $(this).next().css("color", "green");
            });
        // 开业时间input失去焦点事件
        $("#ot").on("blur", function()
            {
                // 正则匹配
                var val = $(this).val();
                var reg = /^[0-9]{4,4}$/;
                var res = reg.test(val);
                // 判断
                if(res)
                {
                    // 正确提示
                    $(this).next().html("√输入正确");
                    $(this).next().css("color", "green");
                    // 标识
                    otCode = 1;
                }
                else
                {
                    // 错误提示
                    $(this).next().html("×输入有误，例：1998");
                    $(this).next().css("color", "red");
                }
            });

        // 获取最近装修时间input焦点事件
        $("#ft").on("focus", function()
            {
                // 给予提示
                $(this).next().html("例：2010");
                $(this).next().css("color", "green");
            });
        // 最近装修时间input失去焦点事件
        $("#ft").on("blur", function()
            {
                // 正则匹配
                var val = $(this).val();
                var reg = /^[0-9]{4,4}$/;
                var res = reg.test(val);
                // 判断
                if(res)
                {
                    // 正确提示
                    $(this).next().html("√输入正确");
                    $(this).next().css("color", "green");
                    // 标识
                    ftCode = 1;
                }
                else
                {
                    // 错误提示
                    $(this).next().html("×输入有误，例：2010");
                    $(this).next().css("color", "red");
                }
            });

        // 获取会场数量input焦点事件
        $("#sn").on("focus", function()
            {
                // 给予提示
                $(this).next().html("例：5");
                $(this).next().css("color", "green");
            });
        // 会场数量input失去焦点事件
        $("#sn").on("blur", function()
            {
                // 正则匹配
                var val = $(this).val();
                var reg = /^[0-9]{1,}$/;
                var res = reg.test(val);
                // 判断
                if(res)
                {
                    // 正确提示
                    $(this).next().html("√输入正确");
                    $(this).next().css("color", "green");
                    // 标识
                    snCode = 1;
                }
                else
                {
                    // 错误提示
                    $(this).next().html("×输入有误，例：5");
                    $(this).next().css("color", "red");
                }
            });

        // 获取客房数量input焦点事件
        $("#gr").on("focus", function()
            {
                // 给予提示
                $(this).next().html("例：200");
                $(this).next().css("color", "green");
            });
        // 客房数量input失去焦点事件
        $("#gr").on("blur", function()
            {
                // 正则匹配
                var val = $(this).val();
                var reg = /^[0-9]{1,}$/;
                var res = reg.test(val);
                // 判断
                if(res)
                {
                    // 正确提示
                    $(this).next().html("√输入正确");
                    $(this).next().css("color", "green");
                    // 标识
                    grCode = 1;
                }
                else
                {
                    // 错误提示
                    $(this).next().html("×输入有误，例：200");
                    $(this).next().css("color", "red");
                }
            });

        // 获取最大会场面积input焦点事件
        $("#maa").on("focus", function()
            {
                // 给予提示
                $(this).next().html("例：2000");
                $(this).next().css("color", "green");
            });
        // 最大会场面积input失去焦点事件
        $("#maa").on("blur", function()
            {
                // 正则匹配
                var val = $(this).val();
                var reg = /^[0-9]{1,}$/;
                var res = reg.test(val);
                // 判断
                if(res)
                {
                    // 正确提示
                    $(this).next().html("√输入正确");
                    $(this).next().css("color", "green");
                    // 标识
                    maaCode = 1;
                }
                else
                {
                    // 错误提示
                    $(this).next().html("×输入有误，例：2000");
                    $(this).next().css("color", "red");
                }
            });

        // 获取最多容纳人数input焦点事件
        $("#map").on("focus", function()
            {
                // 给予提示
                $(this).next().html("例：20000");
                $(this).next().css("color", "green");
            });
        // 最多容纳人数input失去焦点事件
        $("#map").on("blur", function()
            {
                // 正则匹配
                var val = $(this).val();
                var reg = /^[0-9]{1,}$/;
                var res = reg.test(val);
                // 判断
                if(res)
                {
                    // 正确提示
                    $(this).next().html("√输入正确");
                    $(this).next().css("color", "green");
                    // 标识
                    mapCode = 1;
                }
                else
                {
                    // 错误提示
                    $(this).next().html("×输入有误，例：20000");
                    $(this).next().css("color", "red");
                }
            });


        // 提交表单事件
        $(".btn-primary").on("click", function()
            {   
                // 定义$(this)
                var sub = $(this);

                // 获取开业时间value值
                var otVal = sub.parent().find("#ot").val();
                // 判断
                if(!otVal)
                {   
                    // 提示
                    sub.parent().find("#ot").next().html("×请填写开业时间");
                    sub.parent().find("#ot").next().css("color", "red");
                    // 阻止默认行为
                    return false;
                }

                // 获取最近装修时间value值
                var ftVal = sub.parent().find("#ft").val();
                // 判断
                if(!ftVal)
                {   
                    // 提示
                    sub.parent().find("#ft").next().html("×请填写最近装修时间");
                    sub.parent().find("#ft").next().css("color", "red");
                    // 阻止默认行为
                    return false;
                }

                // 获取会场数量value值
                var snVal = sub.parent().find("#sn").val();
                // 判断
                if(!snVal)
                {   
                    // 提示
                    sub.parent().find("#sn").next().html("×请填写会场数量");
                    sub.parent().find("#sn").next().css("color", "red");
                    // 阻止默认行为
                    return false;
                }

                // 获取客房数量value值
                var grVal = sub.parent().find("#gr").val();
                // 判断
                if(!grVal)
                {   
                    // 提示
                    sub.parent().find("#gr").next().html("×请填写客房数量");
                    sub.parent().find("#gr").next().css("color", "red");
                    // 阻止默认行为
                    return false;
                }

                // 获取最大会场面积value值
                var maaVal = sub.parent().find("#maa").val();
                // 判断
                if(!maaVal)
                {   
                    // 提示
                    sub.parent().find("#maa").next().html("×请填写大会场面积");
                    sub.parent().find("#maa").next().css("color", "red");
                    // 阻止默认行为
                    return false;
                }

                // 获取最多容纳人数value值
                var mapVal = sub.parent().find("#map").val();
                // 判断
                if(!mapVal)
                {   
                    // 提示
                    sub.parent().find("#map").next().html("×请填大会场面积");
                    sub.parent().find("#map").next().css("color", "red");
                    // 阻止默认行为
                    return false;
                }

            });

    </script>

@endsection