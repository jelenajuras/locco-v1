@extends('layouts.admin')

@section('title', 'Users')

@section('content')
    <div class="page-header">
        <div class='btn-toolbar pull-right'>
            <a class="btn btn-primary btn-lg" href="{{ route('users.create') }}" id="nav">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                Dodaj novog korisnika
            </a>
        </div>
        <h1>Users</h1>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="table-responsive">
				
				<table class="table table-hover">
						<thead>
							<tr>
								<th>Avatar</th>
								<th>Ime i prezime</th>
								<th>email</th>
								<th>Odjel</th>
								<th>Vozilo</th>
								<th>Uloge</th>
								<th>Opcije</th>
							</tr>
						</thead>
					<tbody>
						@foreach ($users as $user)
							<tr>
								<td><img src="//www.gravatar.com/avatar/{{ md5($user->email) }}?d=mm" alt="{{ $user->email }}" class="img-circle"></td>
								<td>{{ $user->first_name . " ". $user->last_name }}</td>
								<td>{{ $user->email }}</td>
								<td value="{{ $user->department_id}}">{{ $user->department['name'] }}</td>
								<td value="{{ $user->car_id}}">{{ $user->car['registracija']}}</td>
								<td>@if ($user->roles->count() > 0)
									{{ $user->roles->implode('name', ', ') }}
								@else
									<em>No Assigned Role</em>
								@endif</td>
								
							
								<td><a href="{{ route('users.edit', $user->id) }}" class="btn btn-default">
									<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
									Edit
								</a>
								<a href="{{ route('users.destroy', $user->id) }}" class="btn btn-danger action_confirm" data-method="delete" data-token="{{ csrf_token() }}">
									<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
									Delete
								</a></td>
								
							</tr>
						@endforeach
					</tbody>
                </table>
			</div>
        </div>
    </div>
    {!! $users->render() !!}
@stop
