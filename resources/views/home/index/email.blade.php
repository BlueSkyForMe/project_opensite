<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>邮箱验证码</title>
</head>
<body>
	<div style="height:200px;background:#ccc;">
		尊敬的用户您好，您本次的验证码为<u>{{ session('emailCode') }}</u>；有效期三十分钟，请尽快输入。
	</div>
</body>
</html>