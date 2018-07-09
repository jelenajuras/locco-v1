@extends('layouts.admin')

@section('title', 'Vozila')

@section('content')
<div class="Jmain">
    <div class="page-header" style="margin-top:80px">
        <div class='btn-toolbar pull-right'>
            <a class="btn btn-primary btn-lg" href="{{ route('admin.cars.create') }}"id="nav">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                Dodaj vozilo
            </a>
        </div>
        <h1>Vozila</h1>
		<input class="form-control" id="myInput" type="text" placeholder="Traži..">
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="table-responsive">
			@if(count($vozila) > 0)
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Registracija</th>
                            <th>Proizvođač, model</th>
							<th>Šasija</th>
							<th>Prva registracija</th>
							<th>Zadnja registracija</th>
							<th>Trenutni kilometri</th>
							<th>Zadnji servis</th>
							<th>Djelatnik</th>
                            <th>Odjel</th>
							<th>Opcije</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
					@foreach ($vozila as $vozilo) 
                        <tr>
							<td>{{ $vozilo->registracija }}</td>
							<td>{{ $vozilo->proizvođač .' - '. $vozilo->model }} </td>
							<td>{{ $vozilo->šasija }} </td>
							<td>{{ $vozilo->prva_registracija }} </td>
							<td>{{ $vozilo->zadnja_registracija }} </td>
							<td>{{ $vozilo->trenutni_kilometri }} </td>
							<td>{{ $vozilo->zadnji_servis }} </td>
							<td>{{ $vozilo->user['first_name'] . " " . $vozilo->user['last_name'] }} </td>
							<td>{{ $vozilo->department['name'] }} </td>
                            <td>
                                <a href="{{ route('admin.cars.edit', $vozilo->id) }}" class="btn btn-default ">
                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                        Edit
                                </a>
                                <!--<a href="{{ route('admin.cars.destroy', $vozilo->id) }}" class="btn btn-danger action_confirm" data-method="delete" data-token="{{ csrf_token() }}">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                        Delete
                                </a>-->
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
				{{'Nema unesenih vozila!'}}
			@endif
            </div>

        </div>
    </div>
</div>

@stop
