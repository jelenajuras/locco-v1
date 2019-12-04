<!DOCTYPE html>

<html>
    <head>
		<title>Gorivo</title>
	</head>

<body>
<form action="postImport_fuel" method="post" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<input type="file" name="fuel">
	<input type="submit" value="Import"></input>
</form>
<a href="{{URL::to('/admin')}}">Natrag</a>
</body>

</html>