<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>请输入您的邮箱</title>
	<link rel="stylesheet" href="{{ asset ('/admin/adminlte/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset ('/admin/adminlte/bootstrap/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset ('/admin/adminlte/bootstrap/css/ionicons.min.css') }}">
	<link rel="stylesheet" href="{{ asset ('/admin/adminlte/bootstrap/css/postbox.css') }}">
	<!-- <link rel="stylesheet" href="{{ asset ('/admin/adminlte/bootstrap/css/header.css') }}"> -->
</head>
<body>
	<h1 ><p class="bg-primary" >
	&nbsp;&nbsp;&nbsp;&nbsp;开场&nbsp;|&nbsp;
	<span class="span">找回密码</span>
	<a href="{{ url('/admin/login') }}" class="fan"> 返回登录</a>
	</p></h1>
	
	<hr>
	
	@if(session('info'))
		<p>{{ session('info') }}</p>
	@endif
<div class="col-md-4 col-md-offset-3">
	<div class="email">
		<div class="hezi">
			
			<form class="form-horizontal" action="{{ url('/admin/sendEmail') }}" method="post">
			{{ csrf_field() }}
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-3 control-label">邮箱</label>
			    <div class="col-sm-7">
			      <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-3 col-sm-9">
			      <button type="submit" class="btn btn-default btn-primary btn-lg active">找回密码</button>
			    </div>
			  </div>
			</form>

			
		</div>
	</div>
</div>



</body>
</html>











