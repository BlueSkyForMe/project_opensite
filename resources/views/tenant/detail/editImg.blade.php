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
                            更新商户展示图
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
                                	<span id="serror" style="color:red;">注意：至少选择一张图片（更新后所有原展示图将会被删除）</span>
                                    <form role="form" action="{{ url('/tenant/detail/updateImg') }}/{{ $uid }}" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label>商家展示图一</label>
                                            <input type="file" name="img[]">
                                        </div>
                                        <div class="form-group">
                                            <label>商家展示图二</label>
                                            <input type="file" name="img[]">
                                        </div>
                                        <div class="form-group">
                                            <label>商家展示图三</label>
                                            <input type="file" name="img[]">
                                        </div>
                                        <div class="form-group">
                                            <label>商家展示图四</label>
                                            <input type="file" name="img[]">
                                        </div>
                                        <button type="submit" class="btn btn-primary">更新</button>
                                    </form>
                                    <div style="width:54px;height:34px;margin-top:-34px;margin-left:75px;">
                                        <a href="{{ url('/tenant/index') }}">
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
    
  

@endsection