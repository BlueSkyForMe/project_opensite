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
                                    <input class="form-control" name="meetName" value="{{ $data->meetName }}">
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
                                    <input class="form-control" name="meetPrice" value="{{ $data->meetPrice }}">
                                </div>
                                <div class="form-group">
                                    <label>*曾举办活动</label>
                                    <textarea style="resize:none;" class="form-control" name="activity" rows="3">{{ $data->activity }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>更换会场照片</label>
                                    <input type="file" name="meetImg">
                                </div>
                                <button type="submit" class="btn btn-primary">更新</button>
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

