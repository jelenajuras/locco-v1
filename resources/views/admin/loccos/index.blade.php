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
			<a class="btn btn-primary btn-lg" href="{{ route('admin.showAll') }}"id="nav">
				
				Locco vožnje
			</a>
		</div>
		<h1>Locco vožnje</h1>
		<!--<input class="form-control" id="myInput" type="text" placeholder="Traži..">
		</br>
		<a href="{{URL::to('getExport')}}" class="btn btn-success">Export</a>*-->
		<!--<a href="{{URL::to('deleteAll')}}" class="btn btn-danger">Delete all</a>
		<a href="{{URL::to('getImport')}}" class="btn btn-success">Import</a>
		<div class="btn-group">
			<button type="button" class="btn btn-info">Export</button>
			<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
				<span class="caret"></span>
				<span class="sr-only">Toggle Dropdown</span>
			</button>
			<ul class="dropdown-menu" role="menu" id="export-menu">
				<li id="export-to-excel"><a href="{{URL::to('getExport')}}">Export to excel</a></li>
				<li class="divider"></li>
				<li><a href="#">Other</li>
				
			</ul>
		</div>-->
	</div>
		
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="table-responsive">
				<table id="table_id" class="display">
					@if(count($cars) > 0)
						<thead >
							<tr>
								<th>Proizovođač, model, Registracija</th>
							</tr>
							<div id="demo" class="collapse">
								<p>2018 g.</p>
							</div>
						</thead>
						<tbody id="myTable">
						@foreach ($cars as $car)
						<tr>
							<td><a href="{{ route('admin.loccos.show', $car->id) }}">{{ $car->proizvođač . ' ' . $car->model . ' ' . $car->registracija}}</a></td>

						</tr>
						@endforeach
					
							
						</tbody>
					@else
						{{'Nema unesenih vozila!'}}
					@endif
					
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
					
				</table>
				
							
			</div>
		</div>
	</div>
</div>
@stop
