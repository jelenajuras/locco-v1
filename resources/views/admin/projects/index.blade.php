@extends('layouts.admin')

@section('title', 'Projekti')

@section('content')
<div class="Jmain">
    <div class="page-header" style="margin-top:80px">
        <div class='btn-toolbar pull-right'>
            <a class="btn btn-primary btn-lg" href="{{ route('admin.projects.create') }}" id="nav">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                Dodaj projekt
            </a>
        </div>
        <h1>Projekti</h1>
		
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="table-responsive">
			@if(count($projects) > 0)
               <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>Broj projekta</th>
							<th>Naručitelj</th>
							<th>Investitor</th>
							<th>Naziv projekta</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody id="table_id">
                        @foreach ($projects as $project)
                            <tr>
								<td>{{ $project->id }}</td>                            
                                <td>{{ $project->narucitelj['naziv'] }}</td>
								<td>{{ $project->investitor['naziv'] }}</td>
								<td>{{ $project->naziv }}</td>
                                  <td id="td1">
                                    <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-default">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                        Edit
                                    </a>
                                    <!--<a href="{{ route('admin.projects.destroy', $project->id) }}" class="btn btn-danger action_confirm" data-method="delete" data-token="{{ csrf_token() }}">
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                        Delete
                                    </a>-->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
				</body>
				@else
					{{'Nema unesenih projekata!'}}
				@endif
            </div>
			
        </div>
    </div>
</div>

@stop
