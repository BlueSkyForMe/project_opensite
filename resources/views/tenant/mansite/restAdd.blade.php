@extends('tenant.layout')

@section('content')

<div id="page-wrapper" style="min-height: 255px;">
    <div class="row">
        <div class="col-lg-12">
            <h4 class="page-header">其他服务</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    添加茶歇信息
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
                            <form role="form" action="{{ url('/tenant/mansite/restInsert') }}/{{ session('hmer')->id }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                            <label>*茶歇类型</label>
                                            <select id="rest_name" name="restType" class="form-control">
                                                <option value="0">请选择</option>
                                                <option value="1">中式</option>
                                                <option value="2">西式</option>
                                            </select>
                                            <span style="display:none;"></span>
                                        </div>
                                <div class="form-group">
                                    <label>*价格</label>
                                    <input id="rest_price" class="form-control" name="restPrice" placeholder="天/元">
                                    <span style="display:none;"></span>
                                </div>
                                <div class="form-group">
                                    <label>*上传照片</label>
                                    <input id="rest_img" type="file" name="restImg">
                                    <span style="display:none;"></span>
                                </div>
                                <button id="rest_sub" type="submit" class="btn btn-primary">添加</button>
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
        $("#rest_name").on("change", function()
            {
                $(this).next().css("display", "none");
            });

        // 获取焦点事件
        $("#rest_price").on("focus", function()
            {
                $(this).next().css("display", "none");
            });

        // 选择文件点击事件
        $("#rest_img").on("click", function()
            {
                $(this).next().css("display", "none");
            });

        // 点击添加事件
        $("#rest_sub").on("click", function()
            {
                // 判断是否选择茶歇类型
                var rname = $(this).parent().find("#rest_name").val();
                if(rname == 0)
                {
                    $(this).parent().find("#rest_name").next().html("×请选择茶歇类型");
                    $(this).parent().find("#rest_name").next().css("color", "red");
                    $(this).parent().find("#rest_name").next().css("display", "block");
                    return false;
                }

                // 判断是填写客房价格
                var rprice = $(this).parent().find("#rest_price").val();
                if(rprice == "")
                {
                    // 提示错误
                    $(this).parent().find("#rest_price").next().html("×请输入价格");
                    $(this).parent().find("#rest_price").next().css("display", "block");
                    $(this).parent().find("#rest_price").next().css("color", "red");

                    return false;
                }
                else
                {
                    // 正则匹配
                    var rreg = /^[0-9]{1,}$/;
                    var rres = rreg.test(rprice);

                    if(!rres)
                    {
                        // 提示错误
                        $(this).parent().find("#rest_price").next().html("×输入有误");
                        $(this).parent().find("#rest_price").next().css("display", "block");
                        $(this).parent().find("#rest_price").next().css("color", "red");
                        return false;
                    } 
                }

                // 获取图片val
                var rimg = $(this).parent().find("#rest_img").val();

                // 定义图片类型 
                var imgArr = ["bmp","jpg","gif","png"];

                // 判断
                if(rimg == "")
                {
                    // 提示错误信息
                    $(this).parent().find("#rest_img").next().css('display', 'block');
                    $(this).parent().find("#rest_img").next().css('color', 'red');
                    $(this).parent().find("#rest_img").next().html('×请上传图片');
                    // 阻止提交
                    return false;
                }
                else
                {
                    var len = rimg.length;
                    var ext = rimg.substring(len-3,len).toLowerCase();

                    // 判断是否为图片
                    if($.inArray(ext,imgArr) == -1)
                    {
                        // 提示错误信息
                        $(this).parent().find("#rest_img").next().css('display', 'block');
                        $(this).parent().find("#rest_img").next().css('color', 'red');
                        $(this).parent().find("#rest_img").next().html('×支持格式（jpg,gif,png）');

                        // 阻止提交
                        return false;
                    }
                } 
            });

    </script>

@endsection

