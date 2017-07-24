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
                            上传商户展示图
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
                                	<span id="serror" style="color:red;">注意：商户要添加四张图片</span>
                                    <form role="form" action="{{ url('/tenant/detail/insertImg') }}/{{ $uid }}" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label>商家展示图一</label>
                                            <input id="img_one" type="file" name="img[]">
                                            <span style="display:none;"></span>
                                        </div>
                                        <div class="form-group">
                                            <label>商家展示图二</label>
                                            <input id="img_two" type="file" name="img[]">
                                            <span style="display:none;"></span>
                                        </div>
                                        <div class="form-group">
                                            <label>商家展示图三</label>
                                            <input id="img_three" type="file" name="img[]">
                                            <span style="display:none;"></span>
                                        </div>
                                        <div class="form-group">
                                            <label>商家展示图四</label>
                                            <input id="img_four" type="file" name="img[]">
                                            <span style="display:none;"></span>
                                        </div>
                                        <button id="sub" type="submit" class="btn btn-primary">提交</button>
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

    // 定义图片类型 
    var imgArr = ["bmp","jpg","gif","png"];

    // img_one 点击事件
    $("#img_one").on("click", function()
        {
            // 隐藏错误提示
            $(this).next().css("display", "none");
        });

    // img_two 点击事件
    $("#img_two").on("click", function()
        {
            // 隐藏错误提示
            $(this).next().css("display", "none");
        });

    // img_three 点击事件
    $("#img_three").on("click", function()
        {
            // 隐藏错误提示
            $(this).next().css("display", "none");
        });

    // img_four 点击事件
    $("#img_four").on("click", function()
        {
            // 隐藏错误提示
            $(this).next().css("display", "none");
        });

    // 点击提交时间
    $("#sub").on('click', function()
        {
            // 定义$(this)
            var sub = $(this);

            // 获取第一张图片val
            var oneVal = sub.parent().find("#img_one").val();

            // 判断
            if(oneVal == "")
            {
                // 提示错误信息
                sub.parent().find("#img_one").next().css('display', 'block');
                sub.parent().find("#img_one").next().css('color', 'red');
                sub.parent().find("#img_one").next().html('×请上传图片');
                // 阻止提交
                return false;
            }else
            {
                var len = oneVal.length;
                var ext = oneVal.substring(len-3,len).toLowerCase();

                // 判断是否为图片
                if($.inArray(ext,imgArr) == -1)
                {
                    // 提示错误信息
                    sub.parent().find("#img_one").next().css('display', 'block');
                    sub.parent().find("#img_one").next().css('color', 'red');
                    sub.parent().find("#img_one").next().html('×请正确上传图片');

                    // 阻止提交
                    return false;
                }
            }

            // 获取第二张图片val
            var twoVal = sub.parent().find("#img_two").val();

            // 判断
            if(twoVal == "")
            {
                // 提示错误信息
                sub.parent().find("#img_two").next().css('display', 'block');
                sub.parent().find("#img_two").next().css('color', 'red');
                sub.parent().find("#img_two").next().html('×请上传图片');
                // 阻止提交
                return false;
            }else
            {
                var len = twoVal.length;
                var ext = twoVal.substring(len-3,len).toLowerCase();

                // 判断是否为图片
                if($.inArray(ext,imgArr) == -1)
                {
                    // 提示错误信息
                    sub.parent().find("#img_two").next().css('display', 'block');
                    sub.parent().find("#img_two").next().css('color', 'red');
                    sub.parent().find("#img_two").next().html('×请正确上传图片');

                    // 阻止提交
                    return false;
                }
            }

            // 获取第三张图片val
            var threeVal = sub.parent().find("#img_three").val();

            // 判断
            if(threeVal == "")
            {
                // 提示错误信息
                sub.parent().find("#img_three").next().css('display', 'block');
                sub.parent().find("#img_three").next().css('color', 'red');
                sub.parent().find("#img_three").next().html('×请上传图片');
                // 阻止提交
                return false;
            }else
            {
                var len = threeVal.length;
                var ext = threeVal.substring(len-3,len).toLowerCase();

                // 判断是否为图片
                if($.inArray(ext,imgArr) == -1)
                {
                    // 提示错误信息
                    sub.parent().find("#img_three").next().css('display', 'block');
                    sub.parent().find("#img_three").next().css('color', 'red');
                    sub.parent().find("#img_three").next().html('×请正确上传图片');

                    // 阻止提交
                    return false;
                }
            }

            // 获取第四张图片val
            var fourVal = sub.parent().find("#img_four").val();

            // 判断
            if(fourVal == "")
            {
                // 提示错误信息
                sub.parent().find("#img_four").next().css('display', 'block');
                sub.parent().find("#img_four").next().css('color', 'red');
                sub.parent().find("#img_four").next().html('×请上传图片');
                // 阻止提交
                return false;
            }else
            {
                var len = fourVal.length;
                var ext = fourVal.substring(len-3,len).toLowerCase();

                // 判断是否为图片
                if($.inArray(ext,imgArr) == -1)
                {
                    // 提示错误信息
                    sub.parent().find("#img_four").next().css('display', 'block');
                    sub.parent().find("#img_four").next().css('color', 'red');
                    sub.parent().find("#img_four").next().html('×请正确上传图片');

                    // 阻止提交
                    return false;
                }
            }

        });

  </script>

@endsection