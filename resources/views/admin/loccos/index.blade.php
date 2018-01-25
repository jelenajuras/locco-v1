@extends('layouts.admin')

@section('title', 'Locco')

@section('content')
    <div class="page-header" style="margin-top:80px">
        <div class='btn-toolbar pull-right'>
            <a class="btn btn-primary btn-lg" href="{{ route('admin.loccos.create') }}"id="nav">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                Dodaj locco vožnju
            </a>
        </div>
        <h1>Locco vožnje</h1>
		<input class="form-control" id="myInput" type="text" placeholder="Traži..">
		</br>
		<a href="{{URL::to('getExport')}}" class="btn btn-success">Export</a>
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
			<table class="table table-hover">
			@if(count($locco_vožnje) > 0)
                    <thead >
                        <tr >
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
							<!--<td>{{ $locco->razlog_puta }} </td>-->
							<td>{{ $locco->početni_kilometri }} </td>
							<td>{{ $locco->završni_kilometri }} </td>
							<td>{{ $locco->prijeđeni_kilometri }} </td>
							<td>{{ $locco->Komentar }} </td>
							
                            <td>
                                @if (Sentinel::check() && Sentinel::inRole('administrator'))
									<a href="{{ route('admin.loccos.edit', $locco->id) }}" class="btn btn-default">
                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                        Edit
									</a>
									<a href="{{ route('admin.loccos.destroy', $locco->id) }}" class="btn btn-danger action_confirm" data-method="delete" data-token="{{ csrf_token() }}">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                        Delete
									</a>
								@else
									<a href="{{ route('admin.loccos.edit', $locco->id) }}" class="btn btn-default {{ Sentinel::getUser()->id != $locco->user_id ? 'disabled' : '' }}">
										<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
											Edit
									</a>
									<a href="{{ route('admin.loccos.destroy', $locco->id) }}" class="btn btn-danger action_confirm {{ Sentinel::getUser()->id != $locco->user_id ? 'disabled' : '' }}" data-method="delete" data-token="{{ csrf_token() }}">
										<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
											Delete
									</a>
								@endif
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
