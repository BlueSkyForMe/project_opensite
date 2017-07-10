<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>请输入新密码</title>
	<link rel="stylesheet" href="{{ asset ('/admin/adminlte/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset ('/admin/adminlte/bootstrap/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset ('/admin/adminlte/bootstrap/css/ionicons.min.css') }}">
	<link rel="stylesheet" href="{{ asset ('/admin/adminlte/bootstrap/css/postbox.css') }}">
</head>
<body>

	<h1 ><p class="bg-primary" >
	&nbsp;&nbsp;&nbsp;&nbsp;开场&nbsp;|&nbsp;
	<span class="span">请输入新密码</span>
	<a href="{{ url('/admin/login') }}" class="fan"> 返回登录</a>
	</p></h1>
	<hr>
	<br><br>
	<br><br>
	<form class="form-horizontal" action="{{ url('/admin/updatepass') }}" method="post">
	{{ csrf_field() }}
		<input type="hidden" name="id" value="{{ $id }}">

	  <div class="form-group">
	    <label for="inputEmail3" class="col-sm-3 control-label">密码</label>
	    <div class="col-sm-4">
	      <input type="password" name="password" class="form-control" id="inputEmail3" placeholder="请输入密码">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="inputPassword3" class="col-sm-3 control-label">确认密码</label>
	    <div class="col-sm-4">
	      <input type="password" name="repassword" class="form-control" id="inputPassword3" placeholder="请确认密码">
	    </div>
	  </div>
	  <div class="form-group">
	    
	  </div>
	  <div class="form-group">
	    <div class="col-sm-offset-3 col-sm-4">
	      <button type="submit" class="btn btn-default btn-primary btn-lg active">更改密码</button>
	    </div>
	  </div>
	</form>

</body>
</html>