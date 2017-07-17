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
                            <form role="form" action="{{ url('/tenant/mansite/insert') }}/{{ session('hmer')->id }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>*会场名称</label>
                                    <input class="form-control" name="meetName" placeholder="请填写会场名称">
                                </div>
                                <div class="form-group">
                                    <label>*会场面积</label>
                                    <input class="form-control" name="meetArea" placeholder="单位/平方米">
                                </div>
                                <div class="form-group">
                                    <label>*长</label>
                                    <input style="width:50px" type="text" name="long" placeholder="长/米">
                                    <label>M</label>
                                    <label style="margin-left:50px;">*宽</label>
                                    <input style="width:50px" type="text" name="width" placeholder="宽/米">
                                    <label>M</label>
                                    <label style="margin-left:50px;">*高</label>
                                    <input style="width:50px" type="text" name="height" placeholder="高/米">
                                    <label>M</label>
                                </div>
                                <div class="form-group">
                                    <label>*立柱</label>
                                    <label class="radio-inline">
                                        <input type="radio" name="pillar" id="optionsRadiosInline1" value="0">无
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="pillar" id="optionsRadiosInline2" value="1" checked >有
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>*课桌式容纳人数</label>
                                    <input style="width:100px" type="text" name="feast" placeholder="单位/人">
                                    <label style="margin-left:50px;">*宴会式容纳人数</label>
                                    <input style="width:100px" type="text" name="desk" placeholder="单位/人">
                                </div>
                                <div class="form-group">
                                    <label>*会场价格</label>
                                    <input class="form-control" name="meetPrice" placeholder="天/元">
                                </div>
                                <div class="form-group">
                                    <label>*曾举办活动</label>
                                    <textarea style="resize:none;" class="form-control" name="activity" rows="3" placeholder="例：1、互联网大会；2、创业者大会……"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>上传场地照片</label>
                                    <input type="file" name="meetImg">
                                </div>
                                <button type="submit" class="btn btn-primary">添加</button>
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

