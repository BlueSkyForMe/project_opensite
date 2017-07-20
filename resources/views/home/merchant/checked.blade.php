@extends('home.layout')

@section('content')

<!-- 主体main -->
<div class="main">

	<div class="wrap_column">
		<div class="column">
			<span>商家中心 > 添加商户</span>
		</div>
	</div>
	
	<!--\\\\\\\\\\\\\\\\\在这之间写你的HTNL代码\\\\\\\\\\\\\\\\\\\\\\\\\-->
	<div class="info">
		<span>申请开场商户完全免费；一个企业只能开设一个账户；申请到正式开通预计需1~3个工作日。了解更多请查看<b><a href="#">《开场商户守则》</a></b></span>
	</div>

	<div class="flow"><img src="{{ asset ('/images/register4.png') }}"></div>

	<div class="show4">
		<div class="shanghu4"><span>开场商户版</span></div>
		<div class="shuoming4 ">
			<p>您的商户已经审核完成，快来完善自己的店铺吧！</p>
		</div>
		<div class="final"><a href="{{ url ('/tenant/index') }}"><img src="{{ asset ('/images/final.png') }}"></a></div>
	</div>


	<!--\\\\\\\\\\\\\\\\\在这之间写你的HTNL代码\\\\\\\\\\\\\\\\\\\\\\\\\-->

</div>

@endsection