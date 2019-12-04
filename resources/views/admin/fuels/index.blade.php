@extends('layouts.admin')

@section('title', 'Potrošnja goriva')

@section('content')
<div class="Jmain">
    <div class="page-header" style="margin-top:80px">
        <div class='btn-toolbar pull-right'>
            <a class="btn btn-primary btn-lg" href="{{ route('admin.fuels.create') }}"id="nav">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                Dodaj točenje goriva
            </a>
        </div>
        <h1>Potrošnja goriva</h1>
		<a href="{{URL::to('getImport_fuel')}}" class="btn btn-success">Import</a>
		@if(Sentinel::inRole('administrator'))
			<div class="btn-group">
				<button type="button" class="btn btn-info">Export</button>
				<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
					<span class="caret"></span>
					<span class="sr-only">Toggle Dropdown</span>
				</button>
				<ul class="dropdown-menu" role="menu" id="export-menu">
					<li id="export-to-excel"><a href="{{URL::to('getExport_fuel')}}">Export to excel</a></li>
					<li class="divider"></li>
					<li><a href="#">Other</li>
					
				</ul>
			</div>
		@endif
		<input class="form-control" id="myInput" type="text" placeholder="Traži..">
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="table-responsive">
			@if(count($fuels) > 0)
                <table class="table table-hover" id="table_id">
                    <thead>
                        <tr>
                            <th>Vozilo</th>
                            <th>Korisnik</th>
                            <th>Količina goriva</th>
                            <th>Stanje kilometara</th>
                            <th>Datum</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
					@foreach ($fuels as $fuel)
                        <tr>
							<td>{{ $fuel->car['registracija'] }}</td>
							<td>{{ $fuel->user['first_name'] . ' ' . $fuel->user['last_name'] }}	</td>
							<td>{{ $fuel->liters }}	</td>
							<?php 
								$km = '';
								if($fuel->km) {
									$km = $fuel->km;
								} else {
									$locco = $loccos->where('vozilo_id',$fuel->car_id)->where('datum',$fuel->date)->first();
									if($locco) {
										$km = $locco->pocetni_kilometri;
									} else {
										$km = '';
									}
								}
							?>
							<td>{{ $km }}	</td>
							<td>{{ date('Y-m-d',strtotime($fuel->date)) }}	</td>
                            <td id="td1">
                                <a href="{{ route('admin.fuels.edit', $fuel->id) }}" class="btn btn-default ">
                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                        Edit
                                </a>
                                <a href="{{ route('admin.fuels.destroy', $fuel->id) }}" class="btn btn-danger action_confirm" data-method="delete" data-token="{{ csrf_token() }}">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                        Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
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
                    </tbody>
                </table>
				@else
					{{'Nema unesenih gradova!'}}
				@endif
            </div>

        </div>
    </div>
</div>
@stop
