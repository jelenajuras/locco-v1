@extends('layouts.admin')

@section('title', 'Locco')

@section('content')
<div class="Jmain">
	<div class="page-header" style="margin-top:80px">
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
			<div class="table-responsive">
				<table id="table_id" class="display">
					@if(count($loccos) > 0)
						<thead >
							<tr>
								<th>Datum</th>
								<th>Vozilo</th>
								<th>Vozač</th>
								<th>Relacija</th>
								<th>Projekt</th>
								<!--<th>Razlog puta</th>-->
								<th>Početni kilometri</th>
								<th>Završni kilometri</th>
								<th>Prijeđeni kilometri</th>
								<th>Komentar</th>
								<th class="not-export-column">Opcije</th>
							</tr>
						</thead>
						<tbody id="table_id">
						@foreach ($loccos as $locco)
							<tr>
								<td>{{ $locco->datum}} </td>
								<td>{{ $locco->car['registracija']}}	</td>
								<td>{{ $locco->user['first_name'] . " " . $locco->user['last_name'] }}</td>
								<td>{{ $locco->relacija}} </td>
								<td>{{ $locco->project['id']}} </td>
								<!--<td>{{ $locco->razlog_puta }} </td>-->
								<td>{{ $locco->pocetni_kilometri }} </td>
								<td>{{ $locco->zavrsni_kilometri }} </td>
								<td>{{ $locco->prijedeni_kilometri }} </td>
								<td>{{ $locco->Komentar }} </td>
								
								<td>
										<a href="{{ route('admin.loccos.edit', $locco->id) }}" class="btn btn-default">
											<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
												Edit
										</a>
										<a href="{{ route('admin.loccos.destroy', $locco->id) }}" class="btn btn-danger action_confirm {{ Request::is('admin') ? 'disabled' : '' }}" data-method="delete" data-token="{{ csrf_token() }}">
											<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
												Delete
										</a>
								</td>
							</tr>
							@endforeach
							
						</tbody>
					@else
						{{'Nema unesenih locco vožnji!'}}
					@endif
					
					<script>
						$(document).ready(function(){
						  $("#myInput").on("keyup", function() {
							var value = $(this).val().toLowerCase();
							$("#table_id tr").filter(function() {
							  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
							});
						  });
						});
					</script>
					
				</table>
				
							
			</div>
		</div>
	</div>
</div>
@stop
