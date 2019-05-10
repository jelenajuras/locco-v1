<!DOCTYPE html>
<html lang="hr">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<div class="content">
			<h3>Locco izvještaj</h3>
		</div>
		
		<div>
		<p>Za vozilo {{ $registracija }} danas je upisano locco vožnja</p>
		<p>početni kilometri ne odgovaraju prošlim završnim kilometrima</p>
		<p>prošla vožnja - završni km: {{ $locco_prethodni }}</p>
		<p>današnja vožnja - početni km: {{ $locco_pocetni }}</p>
		</div>
	</body>
</html>