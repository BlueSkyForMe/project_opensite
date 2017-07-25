@extends('tenant.layout')

@section('content')

<div id="page-wrapper" style="min-height: 255px;">
    <div class="row">
        <div class="col-lg-12">
            <h4 class="page-header">添加会场</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    添加会场信息
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
                            <form role="form" action="{{ url('/tenant/mansite/siteInsert') }}/{{ session('hmer')->id }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>*会场名称</label>
                                    <input id="site_name" class="form-control" name="meetName" placeholder="请填写会场名称">
                                    <span style="display:none;"></span>
                                </div>
                                <div class="form-group">
                                    <label>*会场面积</label>
                                    <input id="site_area" class="form-control" name="meetArea" placeholder="单位/平方米">
                                    <span style="color:green;">例：200</span>
                                </div>
                                <div class="form-group">
                                    <label>*长</label>
                                    <input id="site_long" style="width:50px" type="text" name="long" placeholder="长/米">
                                    <label>M</label>
                                    <label style="margin-left:30px;">*宽</label>
                                    <input id="site_width" style="width:50px" type="text" name="width" placeholder="宽/米">
                                    <label>M</label>
                                    <label style="margin-left:30px;">*高</label>
                                    <input id="site_height" style="width:50px" type="text" name="height" placeholder="高/米">
                                    <label>M</label>
                                    <label class="radio-inline">
                                        <span id="hint_bulk" style="color:green">例：40*20*9</span>
                                    </label>    
                                </div>
                                <div class="form-group">
                                    <label>*立柱</label>
                                    <label class="radio-inline">
                                        <input type="radio" name="pillar" id="optionsRadiosInline1" value="0">无
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="pillar" id="optionsRadiosInline2" value="1" checked >有
                                    </label>
                                    <label class="radio-inline">
                                        <span style="color:green;">默认有</span>
                                    </label>    
                                </div>
                                <div class="form-group">
                                    <label>*课桌式容纳人数</label>
                                    <input id="feast_num" style="width:100px" type="text" name="feast" placeholder="单位/人">
                                    <label style="margin-left:50px;">*宴会式容纳人数</label>
                                    <input id="desk_num" style="width:100px" type="text" name="desk" placeholder="单位/人">
                                    <span id="hint_num" style="display:none;"></span>
                                </div>
                                <div class="form-group">
                                    <label>*会场价格</label>
                                    <input id="site_price" class="form-control" name="meetPrice" placeholder="天/元">
                                    <span style="color:green">例：12500</span>
                                </div>
                                <div class="form-group">
                                    <label>*曾举办活动</label>
                                    <textarea id="acti" style="resize:none;" class="form-control" name="activity" rows="3" placeholder="例：互联网大会；创业者大会……"></textarea>
                                    <span style="display:none;"></span>
                                </div>
                                <div class="form-group">
                                    <label>*上传会场照片</label>
                                    <input id="img" type="file" name="meetImg">
                                    <span style="display:none;"></span>
                                </div>
                                <button id="sub" type="submit" class="btn btn-primary">添加</button>
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

        // 获取会场名称焦点事件
        $("#site_name").on("focus", function()
            {
                // 隐藏提示
                $(this).next().css("display", "none");
            });

        // 获取会场面积焦点事件
        $("#site_area").on("focus", function()
            {
                // 提示
                $(this).next().css("color", "green");
                $(this).next().html("例：200");
            });

        // 获取长焦点事件
        $("#site_long").on("focus", function()
            {
                // 提示
                $(this).parent().find("#hint_bulk").css("color", "green");
                $(this).parent().find("#hint_bulk").html("例：40*20*9");
            });

        // 获取宽焦点事件
        $("#site_width").on("focus", function()
            {
                // 提示
                $(this).parent().find("#hint_bulk").css("color", "green");
                $(this).parent().find("#hint_bulk").html("例：40*20*9");
            });

        // 获取高焦点事件
        $("#site_height").on("focus", function()
            {
                // 提示
                $(this).parent().find("#hint_bulk").css("color", "green");
                $(this).parent().find("#hint_bulk").html("例：40*20*9");
            });

        // 获取课桌容纳人数焦点事件
        $("#feast_num").on("focus", function()
            {
                // 隐藏提示
                $(this).parent().find("#hint_num").css("display", "none");
            });

         // 获取宴会容纳人数焦点事件
        $("#desk_num").on("focus", function()
            {
                // 隐藏提示
                $(this).parent().find("#hint_num").css("display", "none");
            });

        // 获取价格焦点事件
        $("#site_price").on("focus", function()
            {
                // 提示
                $(this).next().css("color", "green");
                $(this).next().html("例：12500");
            });

        // 获取曾举办活动焦点事件
        $("#acti").on("focus", function()
            {
                // 隐藏提示
                $(this).next().css("display", "none");
            });

        // 点击选择文件事件
        $("#img").on("click", function()
            {
                // 隐藏提示
                $(this).next().css("display", "none");
            });

        // 点击添加事件
        $("#sub").on("click", function()
            {
                // 定义$(this)
                var sub = $(this);

                // 获取会场名称
                var nameVal = sub.parent().find("#site_name").val();

                // 判断是否为空
                if(nameVal == "")
                {
                    // 提示错误
                    sub.parent().find("#site_name").next().html("×请输入会场名称");
                    sub.parent().find("#site_name").next().css("display", "block");
                    sub.parent().find("#site_name").next().css("color", "red");

                    return false;
                }

                // 获取会场面积
                var areaVal = sub.parent().find("#site_area").val();

                // 判断是否为空
                if(areaVal == "")
                {
                    // 提示错误
                    sub.parent().find("#site_area").next().html("×请输入会场面积");
                    sub.parent().find("#site_area").next().css("display", "block");
                    sub.parent().find("#site_area").next().css("color", "red");

                    return false;
                }
                else
                {
                    // 正则匹配
                    var areg = /^[0-9]{1,}$/;
                    var ares = areg.test(areaVal);

                    if(!ares)
                    {
                        // 提示错误
                        sub.parent().find("#site_area").next().html("×输入有误");
                        sub.parent().find("#site_area").next().css("display", "block");
                        sub.parent().find("#site_area").next().css("color", "red");
                        return false;
                    } 
                }

                // 获取长
                var longVal = sub.parent().find("#site_long").val();

                // 判断是否为空
                if(longVal == "")
                {
                    // 提示错误
                    sub.parent().find("#hint_bulk").html("×请输入长、宽、高");
                    sub.parent().find("#hint_bulk").css("display", "block");
                    sub.parent().find("#hint_bulk").css("color", "red");

                    return false;
                }
                else
                {
                    // 正则匹配
                    var lreg = /^[0-9]{1,}$/;
                    var lres = lreg.test(longVal);

                    if(!lres)
                    {
                        // 提示错误
                        sub.parent().find("#hint_bulk").html("×输入有误");
                        sub.parent().find("#hint_bulk").css("display", "block");
                        sub.parent().find("#hint_bulk").css("color", "red");
                        return false;
                    } 
                }

                // 获取宽
                var widthVal = sub.parent().find("#site_width").val();

                // 判断是否为空
                if(widthVal == "")
                {
                    // 提示错误
                    sub.parent().find("#hint_bulk").html("×请输入长、宽、高");
                    sub.parent().find("#hint_bulk").css("display", "block");
                    sub.parent().find("#hint_bulk").css("color", "red");

                    return false;
                }
                else
                {
                    // 正则匹配
                    var wreg = /^[0-9]{1,}$/;
                    var wres = wreg.test(widthVal);

                    if(!wres)
                    {
                        // 提示错误
                        sub.parent().find("#hint_bulk").html("×输入有误");
                        sub.parent().find("#hint_bulk").css("display", "block");
                        sub.parent().find("#hint_bulk").css("color", "red");
                        return false;
                    } 
                }

                // 获取高
                var heightVal = sub.parent().find("#site_height").val();

                // 判断是否为空
                if(heightVal == "")
                {
                    // 提示错误
                    sub.parent().find("#hint_bulk").html("×请输入长、宽、高");
                    sub.parent().find("#hint_bulk").css("display", "block");
                    sub.parent().find("#hint_bulk").css("color", "red");

                    return false;
                }
                else
                {
                    // 正则匹配
                    var hreg = /^[0-9]{1,}$/;
                    var hres = hreg.test(heightVal);

                    if(!hres)
                    {
                        // 提示错误
                        sub.parent().find("#hint_bulk").html("×输入有误");
                        sub.parent().find("#hint_bulk").css("display", "block");
                        sub.parent().find("#hint_bulk").css("color", "red");
                        return false;
                    } 
                }

                // 获取课桌式容纳人数
                var feastVal = sub.parent().find("#feast_num").val();

                // 判断是否为空
                if(feastVal == "")
                {
                    // 提示错误
                    sub.parent().find("#hint_num").html("×请输入容纳人数");
                    sub.parent().find("#hint_num").css("display", "block");
                    sub.parent().find("#hint_num").css("color", "red");

                    return false;
                }
                else
                {
                    // 正则匹配
                    var freg = /^[0-9]{1,}$/;
                    var fres = freg.test(feastVal);

                    if(!fres)
                    {
                        // 提示错误
                        sub.parent().find("#hint_num").html("×输入有误");
                        sub.parent().find("#hint_num").css("display", "block");
                        sub.parent().find("#hint_num").css("color", "red");
                        return false;
                    } 
                }

                // 获取宴会式容纳人数
                var deskVal = sub.parent().find("#desk_num").val();

                // 判断是否为空
                if(deskVal == "")
                {
                    // 提示错误
                    sub.parent().find("#hint_num").html("×请输入容纳人数");
                    sub.parent().find("#hint_num").css("display", "block");
                    sub.parent().find("#hint_num").css("color", "red");

                    return false;
                }
                else
                {
                    // 正则匹配
                    var dreg = /^[0-9]{1,}$/;
                    var dres = dreg.test(deskVal);

                    if(!dres)
                    {
                        // 提示错误
                        sub.parent().find("#hint_num").html("×输入有误");
                        sub.parent().find("#hint_num").css("display", "block");
                        sub.parent().find("#hint_num").css("color", "red");
                        return false;
                    } 
                }

                // 获取价格
                var priceVal = sub.parent().find("#site_price").val();

                // 判断是否为空
                if(priceVal == "")
                {
                    // 提示错误
                    sub.parent().find("#site_price").next().html("×请输入价格");
                    sub.parent().find("#site_price").next().css("display", "block");
                    sub.parent().find("#site_price").next().css("color", "red");

                    return false;
                }
                else
                {
                    // 正则匹配
                    var preg = /^[0-9]{1,}$/;
                    var pres = preg.test(priceVal);

                    if(!pres)
                    {
                        // 提示错误
                        sub.parent().find("#site_price").next().html("×输入有误");
                        sub.parent().find("#site_price").next().css("display", "block");
                        sub.parent().find("#site_price").next().css("color", "red");
                        return false;
                    } 
                }

                // 获取曾举办活动
                var actiVal = sub.parent().find("#acti").val();

                // 判断是否为空
                if(actiVal == "")
                {
                    // 提示错误
                    sub.parent().find("#acti").next().html("×请输入会场名称");
                    sub.parent().find("#acti").next().css("display", "block");
                    sub.parent().find("#acti").next().css("color", "red");

                    return false;
                }

                // 获取图片val
                var imgVal = sub.parent().find("#img").val();

                // 定义图片类型 
                var imgArr = ["bmp","jpg","gif","png"];

                // 判断
                if(imgVal == "")
                {
                    // 提示错误信息
                    sub.parent().find("#img").next().css('display', 'block');
                    sub.parent().find("#img").next().css('color', 'red');
                    sub.parent().find("#img").next().html('×请上传图片');
                    // 阻止提交
                    return false;
                }
                else
                {
                    var len = imgVal.length;
                    var ext = imgVal.substring(len-3,len).toLowerCase();

                    // 判断是否为图片
                    if($.inArray(ext,imgArr) == -1)
                    {
                        // 提示错误信息
                        sub.parent().find("#img").next().css('display', 'block');
                        sub.parent().find("#img").next().css('color', 'red');
                        sub.parent().find("#img").next().html('×支持格式（jpg,gif,png）');

                        // 阻止提交
                        return false;
                    }
                }   
            });

    </script>

@endsection

