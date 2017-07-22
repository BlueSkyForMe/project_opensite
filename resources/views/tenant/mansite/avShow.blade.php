@extends('tenant.layout')

@section('content')

<div id="page-wrapper" style="min-height: 358px;">
    <div class="row">
        <div class="col-lg-12">
            <h4 class="page-header">AV设备</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    查看AV设备
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
                                    <th>设备类型</th>
                                    <th>价格</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $key => $val)
                                <tr align="center">
                                    <td>
                                        @if($val->avType == 1)
                                            音响  
                                        @elseif($val->avType == 2)
                                            麦克风
                                        @else
                                            投影仪        
                                        @endif
                                    </td>
                                    <td>{{ $val->avPrice }}元</td>
                                    <td>
                                        <a href="{{ url('tenant/mansite/avEdit') }}/{{ $val->id }}">编辑</a> | 
                                        <a href="{{ url('tenant/mansite/avDelete') }}/{{ $val->id }}">删除</a>
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