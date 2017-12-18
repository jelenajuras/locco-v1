@extends('layouts.admin')

@section('title', 'Projekti')

@section('content')
    <div class="page-header">
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
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Broj projekta</th>
							<th>Investitor</th>
                            <th>Naručitelj</th>
							<th>Naziv projekta</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
								<td>{{ $project->id }}</td>
                                <td>{{ $project->investitor['naziv'] }}</td>
                                <td>{{ $project->narucitelj['naziv'] }}</td>
								<td>{{ $project->naziv }}</td>
                                  <td>
                                    <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-default">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                        Edit
                                    </a>
                                    <a href="{{ route('admin.projects.destroy', $project->id) }}" class="btn btn-danger action_confirm" data-method="delete" data-token="{{ csrf_token() }}">
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
				@else
					{{'Nema unesenih projekata!'}}
				@endif
            </div>
			{!! $projects->render() !!}
        </div>
    </div>
@stop
