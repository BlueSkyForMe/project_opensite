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
				<p>开场正在对您上传的相关信息进行审核</p>
				<p>一般需要1~3个工作日，请稍后登录查看</p>
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
							<a id="show-big-img" href="#">查看大图</a>
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
						<td align="center" colspan="4">
							<a href="#" id="back" class="btn btn-primary active" role="button">返回</a>
							<a href="{{ url('/home/merchant/fillEdit') }}/{{ $data->uid }}" class="btn btn-primary active" role="button">修改</a>
						</td>
					</tr>
				</table>
			</div>
		</div>

		<div class="big-img">
			<div class="occlude">
				<span>×</span>
			</div>
			<img id="show-images" width="498" height="598" src="">
		</div>
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

		// 点击查看大图事件
		$("#show-big-img").on("click", function()
			{	
				// 获取当前图片的src
				var imgSrc = $(this).prev().prev().attr("src");

				// 设置图片路径
				$(".big-img").find("#show-images").attr("src", imgSrc);

				// 显示大图
				$(".big-img").css("display", "block");

				// 禁止文档滚动
				$(document.body).css(
					{
						"overflow-x":"hidden",
						"overflow-y":"hidden"
					});
			});

		// 点击关闭大图
		$(".occlude").on("click", function()
			{
				// 关闭显示
				$(".big-img").css("display", "none");

				// 启用滚动条
				$(document.body).css(
					{
					   "overflow-x":"auto",
					   "overflow-y":"auto"
					});
			});

	</script>	

@endsection