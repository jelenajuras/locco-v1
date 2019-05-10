<!DOCTYPE html>
<html lang="hr">
	<head>
		<meta charset="utf-8">
	</head>
	<style>
	body { 
		font-family: DejaVu Sans, sans-serif;
		font-size: 10px;
	}
	.content {
		padding: 20px;
		width:auto;
		height: auto;
		margin:auto;
		text-align:left;
		font-size:16px;
	}
	</style>
	<body>
		<div class="content">
			<h3>Djelatnik {{ $user->first_name . ' ' . $user->last_name }} prijavio je kvar na vozilu {{ $car->registracija }}</h3>
			<p>Napomena: {{ $napomena }}</p>
		</div>
	</body>
</html>