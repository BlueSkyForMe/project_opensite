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
                            <form role="form" action="{{ url('/tenant/mansite/restUpdate') }}/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="uid" value="{{ $data->uid }}">
                                <div class="form-group">
                                    <label>*茶歇类型</label>
                                    <select id="edit_resttype" name="restType" class="form-control">
                                        <option value="0">请选择</option>
                                        <option value="1" 
                                        @if($data->restType == 1)
                                            selected
                                        @endif   
                                        >中式</option>
                                        <option value="2" 
                                        @if($data->restType == 2)
                                            selected
                                        @endif 
                                        >西式</option>
                                    </select>
                                    <span style="display:none;"></span>
                                </div>
                                <div class="form-group">
                                    <label>*价格</label>
                                    <input id="edit_restprice" class="form-control" name="restPrice" value="{{ $data->restPrice }}" placeholder="天/元">
                                    <span style="display:none;"></span>
                                </div>
                                <div class="form-group">
                                    <label>更换照片</label>
                                    <input id="edit_restimg" type="file" name="restImg">
                                    <span style="display:none;"></span>
                                </div>
                                <button id="edit_restsub" type="submit" class="btn btn-primary">更新</button>
                            </form>
                            <div style="width:54px;height:34px;margin-top:-34px;margin-left:75px;">
                                <a href="{{ url('/tenant/mansite/restShow') }}/{{ $data->uid }}">
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
        $("#edit_resttype").on("change", function()
            {
                $(this).next().css("display", "none");
            });

        // 获取焦点事件
        $("#edit_restprice").on("focus", function()
            {
                $(this).next().css("display", "none");
            });

        // 选择文件点击事件
        $("#edit_restimg").on("click", function()
            {
                $(this).next().css("display", "none");
            });

        // 点击更新事件
        $("#edit_restsub").on("click", function()
            {
                // 判断是否选择客房类型
                var edit_resttype = $(this).parent().find("#edit_resttype").val();
                if(edit_resttype == 0)
                {
                    $(this).parent().find("#edit_resttype").next().html("×请选择客房类型");
                    $(this).parent().find("#edit_resttype").next().css("color", "red");
                    $(this).parent().find("#edit_resttype").next().css("display", "block");
                    return false;
                }

                // 判断是填写客房价格
                var edit_restprice = $(this).parent().find("#edit_restprice").val();
                if(edit_restprice == "")
                {
                    // 提示错误
                    $(this).parent().find("#edit_restprice").next().html("×请输入价格");
                    $(this).parent().find("#edit_restprice").next().css("display", "block");
                    $(this).parent().find("#edit_restprice").next().css("color", "red");

                    return false;
                }
                else
                {
                    // 正则匹配
                    var edit_restprice_reg = /^[0-9]{1,}$/;
                    var edit_restprice_res = edit_restprice_reg.test(edit_restprice);

                    if(!edit_restprice_res)
                    {
                        // 提示错误
                        $(this).parent().find("#edit_restprice").next().html("×输入有误");
                        $(this).parent().find("#edit_restprice").next().css("display", "block");
                        $(this).parent().find("#edit_restprice").next().css("color", "red");
                        return false;
                    } 
                }

                // 获取图片val
                var edit_restimg = $(this).parent().find("#edit_restimg").val();

                // 定义图片类型 
                var imgArr = ["bmp","jpg","gif","png"];

                // 判断
                if(edit_restimg != "")
                {
                    var len = edit_restimg.length;
                    var ext = edit_restimg.substring(len-3,len).toLowerCase();

                    // 判断是否为图片
                    if($.inArray(ext,imgArr) == -1)
                    {
                        // 提示错误信息
                        $(this).parent().find("#edit_restimg").next().css('display', 'block');
                        $(this).parent().find("#edit_restimg").next().css('color', 'red');
                        $(this).parent().find("#edit_restimg").next().html('×支持格式（jpg,gif,png）');

                        // 阻止提交
                        return false;
                    }
                }
            });

    </script>

@endsection

