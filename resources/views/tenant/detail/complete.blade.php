@extends('tenant.layout')

@section('content')

<div id="page-wrapper" style="min-height: 255px;">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-header">完善信息</h4>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            完善商户信息
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
                                    <form role="form" action="{{ url('/tenant/detail/add') }}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label>*开业时间</label>
                                            <input id="ot" class="form-control" name="openTime" placeholder="开业时间:单位/年">
                                            <span style="color:green;">例：1998</span>
                                        </div>
                                        <div class="form-group">
                                            <label>最近装修时间（如无可不填）</label>
                                            <input id="ft" class="form-control" name="fitmentTime" placeholder="最近装修时间:单位/年">
                                            <span style="color:green;">选填！例：2010</span>
                                        </div>
                                        <div class="form-group">
                                            <label>*会场数量</label>
                                            <input id="sn" class="form-control" name="siteNumber" placeholder="会场数量:单位/个">
                                            <span style="color:green;">例：5</span>
                                        </div>
                                        <div class="form-group">
                                            <label>客房数量（如无可不填）</label>
                                            <input id="gr" class="form-control" name="guestRoom" placeholder="客房数量:单位/个">
                                            <span style="color:green;">选填！例：200</span>
                                        </div>
                                        <div class="form-group">
                                            <label>*最大会场面积</label>
                                            <input id="maa" class="form-control" name="maxArea" placeholder="最大会场面积:单位/平方米">
                                            <span style="color:green;">例：2000</span>
                                        </div>
                                        <div class="form-group">
                                            <label>*最多容纳人数</label>
                                            <input id="map" class="form-control" name="maxPerson" placeholder="最多容纳人数:单位/人">
                                            <span style="color:green;">例：20000</span>
                                        </div>
                                        <div class="form-group">
                                            <label>可提供配套服务</label>
                                            <label class="checkbox-inline">
                                                <input class="sup" type="checkbox" name="support[]" value="茶歇">茶歇
                                            </label>
                                            <label class="checkbox-inline">
                                                <input class="sup" type="checkbox" name="support[]" value="客房">客房
                                            </label>
                                            <label class="checkbox-inline">
                                                <input class="sup" type="checkbox" name="support[]" value="AV设备">AV设备
                                            </label>
                                            <label class="checkbox-inline">
                                                <input class="sup" type="checkbox" name="support[]" value="停车场">停车场
                                            </label>
                                            <label style="color:green;" class="checkbox-inline">
                                            	可多选可不选
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>停车场</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="carNumber" id="optionsRadiosInline2" value="1" checked>有
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="carNumber" id="optionsRadiosInline1" value="0">无
                                            </label>
                                            <label style="color:green;" class="radio-inline">
                                                默认有
                                            </label>
                                        </div>
                                        <button type="submit" class="btn btn-primary">提交</button>
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

        // 定义全局变量用于标识
        var otCode = 0;
        var ftCode = 1;
        var snCode = 0;
        var grCode = 1;
        var maaCode = 0;
        var mapCode = 0;

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
                // 判断是否填写信息
                var val = $(this).val();
                if(!val)
                {
                    return;
                }

                // 正则匹配
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
                    // 标识
                    ftCode = 0;
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
                // 判断是否填写信息
                var val = $(this).val();
                if(!val)
                {
                    return;
                }

                // 正则匹配
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
                    // 标识
                    grCode = 0;
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

                // 判断标识
                if(otCode == 1 && ftCode == 1 && snCode == 1 && grCode == 1 && maaCode == 1 && mapCode == 1)
                {
                    return true;
                }
                else
                {
                    // 提示填写信息有误
                    alert("输入信息有误，请仔细核对");
                    return false;
                }

            });

    </script>

@endsection