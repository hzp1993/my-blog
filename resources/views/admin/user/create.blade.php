<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="/admin/user/store" method="POST" >
		{{ method_field('PUT') }}
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="text" name="title" value="{{ old('title') }}"><br/>
		<input type="text" name="desc"><br/><br/>
		<input type="submit" value="提交">
	</form>
</body>
</html>