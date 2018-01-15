<!DOCTYPE html>

<html>
    <head>
		<title>Locco info</title>
	</head>

<body>
<form action="postImport" method="post" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<input type="file" name="locco">
	<input type="submit" value="Import"></input>
</form>
<a href="{{URL::to('/admin')}}">Natrag</a>
</body>

</html>