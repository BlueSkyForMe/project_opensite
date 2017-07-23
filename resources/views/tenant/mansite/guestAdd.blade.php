@extends('tenant.layout')

@section('content')

<div id="page-wrapper" style="min-height: 255px;">
    <div class="row">
        <div class="col-lg-12">
            <h4 class="page-header">添加客房</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    添加客房信息
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
                            <form role="form" action="{{ url('/tenant/mansite/guestInsert') }}/{{ session('hmer')->id }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                            <label>*客房类型</label>
                                            <select name="guestType" class="form-control">
                                                <option value="0">请选择</option>
                                                <option value="1">单人间</option>
                                                <option value="2">标准间</option>
                                                <option value="3">双人间</option>
                                                <option value="4">套间客房</option>
                                                <option value="5">特色客房</option>
                                                <option value="6">公寓式客房</option>
                                                <option value="7">总统套房</option>
                                            </select>
                                        </div>
                                <div class="form-group">
                                    <label>*客房价格</label>
                                    <input class="form-control" name="guestPrice" placeholder="天/元">
                                </div>
                                <div class="form-group">
                                    <label>*上传客房照片</label>
                                    <input type="file" name="guestImg">
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

