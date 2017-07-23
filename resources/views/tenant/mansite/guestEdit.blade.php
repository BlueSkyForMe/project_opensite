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
                                    <select name="guestType" class="form-control">
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
                                </div>
                                <div class="form-group">
                                    <label>*客房价格</label>
                                    <input class="form-control" name="guestPrice" value="{{ $data->guestPrice }}" placeholder="天/元">
                                </div>
                                <div class="form-group">
                                    <label>更改客房照片</label>
                                    <input type="file" name="guestImg">
                                </div>
                                <button type="submit" class="btn btn-primary">更新</button>
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

