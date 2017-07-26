@extends('tenant.layout')

@section('content')

<div id="page-wrapper" style="min-height: 255px;">
	<div class="row">
        <div class="col-lg-12">
            <h4 class="page-header">订单详情</h4>
        </div>
    </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            @if (session('info'))
                <div class="alert alert-danger">
                  {{ session('info') }}
                </div>
            @endif
            <form action="{{ url('/tenant/trade/order') }}" method="GET">
                <div class="col-md-2">
                  <div class="form-group">
                    <select name="num" class="form-control">
                      <option value="2" 
                        @if(!empty($request['num']) && $request['num'] == '2')
                          selected="selected" 
                        @endif
                      >2页</option>
                      <option value="10"
                        @if(!empty($request['num']) && $request['num'] == '0')
                          selected="selected" 
                        @endif
                      >10页</option>
                    </select>
                  </div>
              </div>
              <div class="col-md-6"></div>
              <div class="col-md-4">
                <div class="input-group">
                  <input type="text" name="keywords" value="" class="form-control"  placeholder="会场名称">
                  <span class="input-group-btn">
                    <button type="submit" class="btn btn-info btn-flat">搜索</button>
                  </span>
                </div>
              </div>
            </form>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>用户</th>
                  <th>联系方式</th>
                  <th>会场名称</th>                  
                  <th>使用日期</th>                  
                  <th>会场价格</th>
                  <th>茶歇</th>
                  <th>数量</th>
                  <th>价格</th>
                  <th>客房</th>
                  <th>数量</th>
                  <th>价格</th>
                  <th>AV设备</th>
                  <th>数量</th>
                  <th>价格</th>
                  <th>总价</th>
                  <th>状态</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $key => $val)
                <tr>
                  <td>{{ $val->userName }}</td>
                  <td>
                  	@if ($val->phone && $val->email)
                  		{{ $val->phone }}
                  	@elseif ($val->phone)
                  		{{ $val->phone }}
                  	@else
                  		{{ $val->email }}
                  	@endif			
                  </td>
                  <td>{{ $val->meetName }}</td>
                  <td>{{ $val->time_quantum }}</td>
                  <td>{{ $val->hallmoney }}</td>
                  <td>
                  @if ($val->rest_Type == 1)
                  	    中式
                  @elseif ($val->rest_Type == 2)
                  		西式
                  @else
                  		无
                  @endif					    
                  </td>
                  <td>
                  @if ($val->rest_Type == null)
						无
				  @else
				  		{{ $val->restcount }}
				  @endif				
                  </td>
                  <td>
                  @if ($val->restmoney == null)
						无
				  @else
				  		{{ $val->restmoney }}
				  @endif	
                  </td>
                  <td>
                  @if ($val->guest_Type == 1)
                  	    单人间
                  @elseif ($val->guest_Type == 2)
                  		标准间
                  @elseif ($val->guest_Type == 3)
                  		双人间
                  @elseif ($val->guest_Type == 4)
                  		套间客房
                  @elseif ($val->guest_Type == 5)
                  		公寓式客房
                  @elseif ($val->guest_Type == 6)
                  		总统套房
                  @elseif ($val->guest_Type == 7)
                  		特色客房									
                  @else
                  		无
                  @endif					    
                  </td>
                  <td>
                  @if ($val->guest_Type == null)
						无
				  @else
				  		{{ $val->guestcount }}
				  @endif				
                  </td>
                  <td>
                  @if ($val->guestmoney == null)
						无
				  @else
				  		{{ $val->guestmoney }}
				  @endif	
                  </td>
                  <td>
                  @if ($val->av_Type == 1)
                  	    音响
                  @elseif ($val->av_Type == 2)
                  		麦克风
                  @elseif ($val->av_Type == 3)
                  		投影仪									
                  @else
                  		无
                  @endif					    
                  </td>
                  <td>
                  @if ($val->av_Type == null)
						无
				  @else
				  		{{ $val->avcount }}
				  @endif				
                  </td>
                  <td>
                  @if ($val->avmoney == null)
						无
				  @else
				  		{{ $val->avmoney }}
				  @endif	
                  </td>
                  <td>{{ $val->money }}</td>
                  <td>
                  @if ($val->pay == 0)
                  		待支付
                  @else
                  		已支付
                  @endif					
                  </td>
                </tr>
                @endforeach 
                </tbody>
              </table>
              {{ $data->appends($request)->links() }}
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
  </div>
  <!-- /.content-wrapper -->
@endsection