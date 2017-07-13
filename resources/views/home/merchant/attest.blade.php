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

		<div class="show">
			<div class="shanghu"><span>开场商户版</span></div>
			<div class="shuoming">
				<p>开场正在对您上传的相关信息进行审核</p>
				<p>一般需要1~3个工作日，请稍后登录查看</p>
			</div>
			<div class="upload"><a href="#"><img src="{{ asset ('/images/upload.png') }}"></a></div>
		</div>

	</div>

@endsection