@extends('layouts.admin')

@section('title', 'Ispravi korisnika')

@section('content')
<div class="row" style="margin-top:80px">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading" id="nav">
                <h3 class="panel-title">Promjeni podatke o korisniku</h3>
            </div>
            <div class="panel-body">
                <form accept-charset="UTF-8" role="form" method="post" action="{{ route('users.update', $user->id) }}">
                <fieldset>
                    <div class="form-group {{ ($errors->has('first_name')) ? 'has-error' : '' }}">
                        <input class="form-control" placeholder="Ime" name="first_name" type="text" value="{{ $user->first_name }}" />
                        {!! ($errors->has('first_name') ? $errors->first('first_name', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
                    <div class="form-group {{ ($errors->has('last_name')) ? 'has-error' : '' }}">
                        <input class="form-control" placeholder="Prezime" name="last_name" type="text" value="{{ $user->last_name }}" />
                        {!! ($errors->has('last_name') ? $errors->first('last_name', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
                    <div class="form-group {{ ($errors->has('email')) ? 'has-error' : '' }}">
                        <input class="form-control" placeholder="E-mail" name="email" type="text" value="{{ $user->email }}">
                        {!! ($errors->has('email') ? $errors->first('email', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
                    <h5>Uloge</h5>
                    @foreach ($roles as $role)
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="roles[{{ $role->slug }}]" value="{{ $role->id }}" {{ $user->inRole($role) ? 'checked' : '' }}>
                                {{ $role->name }}
                            </label>
                        </div>
                    @endforeach
                    <hr />
					<!--<div class="form-group">
						<text>Odjel</text>
                        <select class="form-control" name="department_id" id="sel1" >
							@if($user->department_id)
							<option selected="selected" name="department_id" value="{{ $user->department_id }}">
							{{ $user->department['name'] }}
							</option>
							<option value="0"></option>
							@else
							<option value="0"></option>
							@endif
							@foreach (DB::table('departments')->get() as $odjel)
							<option name="department_id" value=" {{ $odjel->id }} ">{{ $odjel->name }}</option>
							@endforeach
							
						</select>
                    </div>
					 <div class="form-group">
						<text>Vozilo</text>
                        <select class="form-control" name="car_id" id="sel1" >
							<option disabled selected value></option>
							@foreach (DB::table('cars')->get() as $vozilo)
							<option name="car_id" value=" {{ $vozilo->id }} ">{{ $vozilo->registracija }}</option>
							@endforeach
							<option selected="selected" name="car_id" value="{{ $user->car_id }}">
								{{ $user->car['registracija'] }}
							</option>
						</select>
                    </div>-->
				
                    <div class="form-group  {{ ($errors->has('password')) ? 'has-error' : '' }}">
                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                        {!! ($errors->has('password') ? $errors->first('password', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
                    <div class="form-group {{ ($errors->has('password_confirmation')) ? 'has-error' : '' }}">
                        <input class="form-control" placeholder="Potvrdi Password" name="password_confirmation" type="password" value="{{ old('password_confirmation') }}" />
                        {!! ($errors->has('password_confirmation') ? $errors->first('password_confirmation', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
                    <input name="_token" value="{{ csrf_token() }}" type="hidden">
                    <input name="_method" value="PUT" type="hidden">
                    <input class="btn btn-lg btn-primary btn-block" type="submit" value="Promjeni" id="nav">
                </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
