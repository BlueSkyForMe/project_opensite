@extends('tenant.layout')

@section('content')

<div id="page-wrapper" style="min-height: 358px;">
    <div class="row">
        <div class="col-lg-12">
            <h4 class="page-header">客房信息</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    查看客房信息
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
                                    <th>客房类型</th>
                                    <th>客房展示图</th>
                                    <th>价格</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $key => $val)
                                <tr align="center">
                                    <td>
                                        @if($val->guestType == 1)
                                            单人间
                                        @elseif($val->guestType == 2)
                                            标准间    
                                        @elseif($val->guestType == 3)
                                            双人间    
                                        @elseif($val->guestType == 4)
                                            套间客房    
                                        @elseif($val->guestType == 5)
                                            特色客房    
                                        @elseif($val->guestType == 6)
                                            公寓式客房    
                                        @else
                                            总统套房    
                                        @endif
                                    </td>
                                    <td>
                                    	<img width="60px" height="50px" src="{{ asset('/uploads/guestimg') }}/{{ $val->guestImg }}"><br/>
                                    	<a href="#">查看大图</a>
                                    </td>
                                    <td>{{ $val->guestPrice }}元</td>
                                    <td>
                                        <a href="{{ url('tenant/mansite/guestEdit') }}/{{ $val->id }}">编辑</a> | 
                                        <a href="{{ url('tenant/mansite/guestDelete') }}/{{ $val->id }}">删除</a>
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