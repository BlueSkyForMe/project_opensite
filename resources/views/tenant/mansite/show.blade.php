@extends('tenant.layout')

@section('content')

<div id="page-wrapper" style="min-height: 358px;">
    <div class="row">
        <div class="col-lg-12">
            <h4 class="page-header">场地信息</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    查看场地信息
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr align="center">
                                    <th style="text-align:center;">ID</th>
                                    <th>会场名称</th>
                                    <th>会场展示图</th>
                                    <th>会场面积</th>
                                    <th>最多容纳人数</th>
                                    <th>价格</th>
                                    <th style="width:140px ">曾举办活动</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $key => $val)
                                <tr align="center">
                                    <td>{{ $val->id }}</td>
                                    <td>{{ $val->meetName }}</td>
                                    <td>
                                    	<img width="50px" height="50px" src="{{ asset('/uploads/meetimg') }}/{{ $val->meetImg }}">
                                    	<a href="#">查看大图</a>
                                    </td>
                                    <td>{{ $val->meetArea }}</td>
                                    <td>{{ $val->meetPerson }}</td>
                                    <td>{{ $val->meetPrice }}元</td>
                                    <td>{{ $val->activity }}</td>
                                    <td>编辑 | 删除</td>
                                </tr>
                            @endforeach    
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>

@endsection