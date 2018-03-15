<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title></title>
</head>
<body>
	<form action="/pages/20" method="POST">
		@csrf
		Name: <input type="text" name="name" value="" placeholder="Enter Name"> 
		<br />
		Comment: <textarea name="text"></textarea>
		<br />
		<input type="hidden" name="_method" value="PUT">
		<input type="submit" name="" value="Add it">
	</form>
</body>
</html>