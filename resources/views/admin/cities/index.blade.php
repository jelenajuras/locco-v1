@extends('layouts.admin')

@section('title', 'Gradovi')

@section('content')
    <div class="page-header">
        <div class='btn-toolbar pull-right'>
            <a class="btn btn-primary btn-lg" href="{{ route('admin.cities.create') }}">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                Dodaj grad
            </a>
        </div>
        <h1>Gradovi</h1>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="table-responsive">
			@if(count($gradovi) > 0)
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Grad</th>
                            <th>Poštanski broj</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
					@foreach ($gradovi as $grad)
                        <tr>
							<td>{{ $grad->grad }}</td>
							<td>{{ $grad->id}}	</td>
                            <td>
                                <a href="{{ route('admin.cities.edit', $grad->id) }}" class="btn btn-default ">
                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                        Edit
                                </a>
                                <a href="{{ route('admin.cities.destroy', $grad->id) }}" class="btn btn-danger action_confirm" data-method="delete" data-token="{{ csrf_token() }}">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                        Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
				@else
					{{'Nema unesenih gradova!'}}
				@endif
            </div>

        </div>
    </div>
@stop
