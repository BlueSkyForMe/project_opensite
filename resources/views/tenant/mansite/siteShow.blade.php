@extends('tenant.layout')

@section('content')

<div id="page-wrapper" style="min-height: 358px;">
    <div class="row">
        <div class="col-lg-12">
            <h4 class="page-header">会场信息</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    查看会场信息
                </div>
                @if (session('info'))
                <div class="alert alert-danger">
                    {{ session('info') }}
                </div>
                @endif
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr align="center">
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
                                    <td>{{ $val->meetName }}</td>
                                    <td>
                                    	<img width="60px" height="50px" src="{{ asset('/uploads/meetimg') }}/{{ $val->meetImg }}"><br/>
                                    	<a href="#">查看大图</a>
                                    </td>
                                    <td>{{ $val->meetArea }}</td>
                                    <td>{{ $val->meetPerson }}</td>
                                    <td>{{ $val->meetPrice }}元</td>
                                    <td>{{ $val->activity }}</td>
                                    <td>
                                        <a href="{{ url('tenant/mansite/siteEdit') }}/{{ $val->id }}">编辑</a> | 
                                        <a href="{{ url('tenant/mansite/siteDelete') }}/{{ $val->id }}">删除</a>
                                    </td>
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