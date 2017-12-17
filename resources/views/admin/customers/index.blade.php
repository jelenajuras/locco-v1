@extends('layouts.admin')

@section('title', 'Naručitelji')

@section('content')
    <div class="page-header">
        <div class='btn-toolbar pull-right'>
            <a class="btn btn-primary btn-lg" href="{{ route('admin.customers.create') }}">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                Dodaj naručitelja
            </a>
        </div>
        <h1>Naručitelji</h1>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="table-responsive">
			@if(count($customers) > 0)
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Firma</th>
                            <th>Adresa</th>
							<th>Grad</th>
                            <th>Opcije</th>
                        </tr>
                    </thead>
                    <tbody>
					@foreach ($customers as $customer)
                        <tr>
							<td>{{ $customer->naziv }}</td>
							<td>{{ $customer->adresa}}	</td>
							<td value="{{ $customer->grad_id}}">{{ $customer->city['grad']}}	</td>
                            <td>
                                <a href="{{ route('admin.customers.edit', $customer->id) }}" class="btn btn-default ">
                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                        Edit
                                </a>
                                <a href="{{ route('admin.customers.destroy', $customer->id) }}" class="btn btn-danger action_confirm" data-method="delete" data-token="{{ csrf_token() }}">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                        Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
				@else
					<td>{{'Nema unesenih naručitelja!'}}</td>
				@endif
            </div>

        </div>
    </div>
@stop
