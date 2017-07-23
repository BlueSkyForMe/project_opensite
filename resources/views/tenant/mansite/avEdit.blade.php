@extends('tenant.layout')

@section('content')

<div id="page-wrapper" style="min-height: 255px;">
    <div class="row">
        <div class="col-lg-12">
            <h4 class="page-header">编辑设备</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    编辑AV设备
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
                            <form role="form" action="{{ url('/tenant/mansite/avUpdate') }}/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="uid" value="{{ $data->uid }}">
                                <div class="form-group">
                                    <label>*设备类型</label>
                                    <select name="avType" class="form-control">
                                        <option value="0">请选择</option>
                                        <option value="1" 
                                        @if($data->avType == 1)
                                            selected
                                        @endif   
                                        >音响</option>
                                        <option value="2" 
                                        @if($data->avType == 2)
                                            selected
                                        @endif 
                                        >麦克风</option>
                                        <option value="2" 
                                        @if($data->avType == 3)
                                            selected
                                        @endif 
                                        >投影仪</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>*价格</label>
                                    <input class="form-control" name="avPrice" value="{{ $data->avPrice }}" placeholder="天/元">
                                </div>
                                <button type="submit" class="btn btn-primary">更新</button>
                            </form>
                            <div style="width:54px;height:34px;margin-top:-34px;margin-left:75px;">
                                <a href="{{ url('/tenant/mansite/avShow') }}/{{ $data->uid }}">
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

