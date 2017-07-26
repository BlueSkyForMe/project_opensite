@extends('tenant.layout')

@section('content')

<div id="page-wrapper" style="min-height: 255px;">
    <div class="row">
        <div class="col-lg-12">
            <h4 class="page-header">编辑客房</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    编辑客房信息
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
                            <form role="form" action="{{ url('/tenant/mansite/guestUpdate') }}/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="uid" value="{{ $data->uid }}">
                                <div class="form-group">
                                    <label>*客房类型</label>
                                    <select id="edit_name" name="guestType" class="form-control">
                                        <option value="0">请选择</option>
                                        <option value="1" 
                                        @if($data->guestType == 1)
                                            selected
                                        @endif   
                                        >单人间</option>
                                        <option value="2" 
                                        @if($data->guestType == 2)
                                            selected
                                        @endif 
                                        >标准间</option>
                                        <option value="3" 
                                        @if($data->guestType == 3)
                                            selected
                                        @endif 
                                        >双人间</option>
                                        <option value="4" 
                                        @if($data->guestType == 4)
                                            selected
                                        @endif 
                                        >套间客房</option>
                                        <option value="5" 
                                        @if($data->guestType == 5)
                                            selected
                                        @endif     
                                        >特色客房</option>
                                        <option value="6" 
                                        @if($data->guestType == 6)
                                            selected
                                        @endif 
                                        >公寓式客房</option>
                                        <option value="7" 
                                        @if($data->guestType == 7)
                                            selected
                                        @endif 
                                        >总统套房</option>
                                    </select>
                                    <span style="display:noe;"></span>
                                </div>
                                <div class="form-group">
                                    <label>*客房价格</label>
                                    <input id="edit_price" class="form-control" name="guestPrice" value="{{ $data->guestPrice }}" placeholder="天/元">
                                    <span style="display:none;"></span>
                                </div>
                                <div class="form-group">
                                    <label>更改客房照片</label>
                                    <input id="edit_img" type="file" name="guestImg">
                                    <span style="display:none;"></span>
                                </div>
                                <button id="edit_up" type="submit" class="btn btn-primary">更新</button>
                            </form>
                            <div style="width:54px;height:34px;margin-top:-34px;margin-left:75px;">
                                <a href="{{ url('/tenant/mansite/guestShow') }}/{{ $data->uid }}">
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

        // 下拉框事件
        $("#edit_name").on("change", function()
            {
                $(this).next().css("display", "none");
            });

        // 获取焦点事件
        $("#edit_price").on("focus", function()
            {
                $(this).next().css("display", "none");
            });

        // 选择文件点击事件
        $("#edit_img").on("click", function()
            {
                $(this).next().css("display", "none");
            });

        // 点击更新事件
        $("#edit_up").on("click", function()
            {
                // 判断是否选择客房类型
                var ename = $(this).parent().find("#edit_name").val();
                if(ename == 0)
                {
                    $(this).parent().find("#edit_name").next().html("×请选择客房类型");
                    $(this).parent().find("#edit_name").next().css("color", "red");
                    $(this).parent().find("#edit_name").next().css("display", "block");
                    return false;
                }

                // 判断是填写客房价格
                var eprice = $(this).parent().find("#edit_price").val();
                if(eprice == "")
                {
                    // 提示错误
                    $(this).parent().find("#edit_price").next().html("×请输入价格");
                    $(this).parent().find("#edit_price").next().css("display", "block");
                    $(this).parent().find("#edit_price").next().css("color", "red");

                    return false;
                }
                else
                {
                    // 正则匹配
                    var ereg = /^[0-9]{1,}$/;
                    var eres = ereg.test(eprice);

                    if(!eres)
                    {
                        // 提示错误
                        $(this).parent().find("#edit_price").next().html("×输入有误");
                        $(this).parent().find("#edit_price").next().css("display", "block");
                        $(this).parent().find("#edit_price").next().css("color", "red");
                        return false;
                    } 
                }

                // 获取图片val
                var eimg = $(this).parent().find("#edit_img").val();

                // 定义图片类型 
                var imgArr = ["bmp","jpg","gif","png"];

                // 判断
                if(eimg != "")
                {
                    var len = eimg.length;
                    var ext = eimg.substring(len-3,len).toLowerCase();

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

