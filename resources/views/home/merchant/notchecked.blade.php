@extends('home.layout')

@section('content')

	<!-- 主体main -->
	<div class="main">

		<div class="wrap_column">
			<div class="column">
				<span>商家中心 > 添加商户</span>
			</div>
		</div>
		
		<div class="info">
			<span>申请开场商户完全免费；一个企业只能开设一个账户；申请到正式开通预计需1~3个工作日。了解更多请查看<b><a href="#">《开场商户守则》</a></b></span>
		</div>

		<div class="flow"><img src="{{ asset ('/images/register3.png') }}"></div>

		<div class="shower">
			<div class="shanghu"><span>开场商户版</span></div>
			<div class="shuoming">
				<p style="color:red">尊敬的商户您好，您的审核信息未通过</p>
				<p style="color:red">原因：{{ $data->content }}！请重新上传审核</p>
			</div>
			<div class="upload">
				<a href="#">
					<img src="{{ asset ('/images/upload.png') }}">
				</a>
			</div>
		</div>

		<div style="display:none;height:500px;" class="show2">
			<div class="shanghu"><span>商户基本信息</span></div>
			<div class="shuoming2">
				<table style="height:400px;margin:0 auto;border:1px solid dodgerblue" border="1">
					<tr>
						<td align="center" width="100" height="30">单位名称 :&nbsp;&nbsp;</td>
						<td align="center" width="400" colspan="3">{{ $data->userName }}</td>
					</tr>
					<tr>
						<td align="center" width="100" height="30">地址 :&nbsp;&nbsp;</td>
						<td align="center" width="300" colspan="3">{{ $data->address }}</td>
					</tr>
					<tr>
						<td align="center" width="100" height="30">电话 :&nbsp;&nbsp;</td>
						<td align="center" width="300" colspan="3">{{ $data->phone }}</td>
					</tr>
					<tr>
						<td align="center" width="100" height="30">场地类型 :&nbsp;&nbsp;</td>
						<td align="center" width="100" height="30">{{ $data->class }}</td>
						<td align="center" width="100" height="30">酒店星级 :&nbsp;&nbsp;</td>
						<td align="center" width="100" height="30">
							@if($data->star == '0')
								无
							@else
								{{ $data->star }}
							@endif		
						</td>
					</tr>
					<tr>
						<td align="center" width="100">出租凭证 :&nbsp;&nbsp;</td>
						<td align="center" width="300" style="height:80px;" colspan="3">
							<img width="60" height="60" src="{{ asset('/uploads/img') }}/{{ $data->img }}"><br/>
							<a href="#">查看大图</a>
						</td>
					</tr>
					<tr>
						<td align="center" height="40" width="100">提供的免费服务 :&nbsp;&nbsp;</td>
						<td align="left" width="300" colspan="3">{{ $data->servers }}</td>
					</tr>
					<tr>
						<td align="center" width="100" height="30">客房 :&nbsp;&nbsp;</td>
						<td align="center" width="100" height="30">
							@if($data->room == 0)
								无
							@else
								有
							@endif
						</td>
						<td align="center" width="100" height="30">餐饮 :&nbsp;&nbsp;</td>
						<td align="center" width="100" height="30">
							@if($data->repast == 0)
								无
							@else
								有
							@endif
						</td>
					</tr>
					<tr>
						<td align="center" width="100">审核失败原因 :&nbsp;&nbsp;</td>
						<td align="center" width="300" style="height:50px;" colspan="3">
							<span style="color:red;">{{ $data->content }}</span>
						</td>
					</tr>
					<tr>
						<td align="center" colspan="4">
							<a href="#" id="back" class="btn btn-primary active" role="button">返回</a>
							<a href="{{ url('/home/merchant/fillEdit') }}/{{ $data->uid }}" class="btn btn-primary active" role="button">修改</a>
						</td>
					</tr>
				</table>
			</div>
		</div>

		<div class="big-img">sdfghjhgfd</div>
	</div>

@endsection

@section('js')

	<script type="text/javascript">

		// 点击查看信息事件
		$(".upload").on("click", function()
			{
				// 隐藏当前
				$(this).parents(".shower").css("display", "none");

				// 显示基本信息
				$(".show2").css("display", "block");
			});

		// 点击返回事件
		$("#back").on('click', function()
			{
				// 隐藏当前
				$(this).parents(".show2").css("display", "none");

				// 显示审核信息
				$(".shower").css("display", "block");
			});

	</script>	

@endsection