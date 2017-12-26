@extends('layouts.admin')

@section('title', 'Locco')
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
@section('content')
    <div class="page-header">
        <div class='btn-toolbar pull-right'>
            <a class="btn btn-primary btn-lg" href="{{ route('admin.loccos.create') }}"id="nav">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                Dodaj locco vožnju
            </a>
        </div>
        <h1>Locco vožnje</h1>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<input class="form-control" id="myInput" type="text" placeholder="Traži..">
		<br>
            <div class="table-responsive">
			@if(count($locco_vožnje) > 0)
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Datum</th>
                            <th>Vozilo</th>
							<th>Vozač</th>
							<th>Relacija</th>
							<th>Projekt</th>
							<th>Razlog puta</th>
							<th>Početni kilometri</th>
							<th>Završni kilometri</th>
							<th>Prijeđeni kilometri</th>
							<th>Komentar</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
					@foreach ($locco_vožnje as $locco)
                        <tr>
							<td>{{ $locco->datum}} </td>
							<td>{{ $locco->car['registracija']}}	</td>
							<td>{{ $locco->user['first_name'] . " " . $locco->user['last_name'] }}</td>
							<td>{{ $locco->relacija}} </td>
							<td>{{ $locco->project['id']}} </td>
							<td>{{ $locco->razlog_puta }} </td>
							<td>{{ $locco->početni_kilometri }} </td>
							<td>{{ $locco->završni_kilometri }} </td>
							<td>{{ $locco->prijeđeni_kilometri }} </td>
							<td>{{ $locco->Komentar }} </td>
							
                            <td>
                                <a href="{{ route('admin.loccos.edit', $locco->id) }}" class="btn btn-default ">
                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                        Edit
                                </a>
                                <a href="{{ route('admin.loccos.destroy', $locco->id) }}" class="btn btn-danger action_confirm" data-method="delete" data-token="{{ csrf_token() }}">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                        Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
				<p></p>
				</div>

				<script>
					$(document).ready(function(){
					  $("#myInput").on("keyup", function() {
						var value = $(this).val().toLowerCase();
						$("#myTable tr").filter(function() {
						  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
						});
					  });
					});
				</script>
</body>

				@else
					{{'Nema unesenih locco vožnji!'}}
				@endif
            </div>

        </div>
    </div>
@stop
