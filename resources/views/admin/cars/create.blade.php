@extends('layouts.admin')

@section('title', 'Dodaj novo vozilo')

<head>
  <!-- ... -->
  <script type="text/javascript" src="/bower_components/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="/bower_components/moment/min/moment.min.js"></script>
  <script type="text/javascript" src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
  <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
</head>

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading" id="nav">
                <h3 class="panel-title">Upiši novo vozilo</h3>
            </div>
            <div class="panel-body">
                <form accept-charset="UTF-8" role="form" method="post" action="{{ route('admin.cars.store') }}">
                <fieldset>
                    <div class="form-group {{ ($errors->has('proizvođač')) ? 'has-error' : '' }}">
                        <input class="form-control" placeholder="Proizvođač" name="proizvođač" type="text" value="{{ old('proizvođač') }}" />
                        {!! ($errors->has('proizvođač') ? $errors->first('proizvođač', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
					<div class="form-group">
                        <input class="form-control" placeholder="Model" name="model" type="text" value="{{ old('model') }}" />
						{!! ($errors->has('model') ? $errors->first('model', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
					<div class="form-group">
                        <input class="form-control" placeholder="Registracija" name="registracija" type="text" value="{{ old('registracija') }}" />
						{!! ($errors->has('registracija') ? $errors->first('registracija', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
					<div class="form-group">
                        <input class="form-control" placeholder="Broj šasije" name="šasija" type="text" value="{{ old('šasija') }}" />
						{!! ($errors->has('šasija') ? $errors->first('šasija', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
					<div class="form-group">
                        <input class="form-control" type="date" placeholder="Prva registracija" name="prva_registracija" type="text" value="{{ old('prva_registracija') }}" />
						{!! ($errors->has('prva_registracija') ? $errors->first('prva_registracija', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
					<div class="form-group">
                        <input class="form-control" type="date" placeholder="Zadnja registracija" name="zadnja_registracija" type="text" value="{{ old('zadnja_registracija') }}" />
						{!! ($errors->has('zadnja_registracija') ? $errors->first('zadnja_registracija', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
					<div class="form-group">
                        <input class="form-control" type="date" placeholder="Slijedeća registracija" name="slijedeća_registracija	" type="text" value="{{ old('slijedeća_registracija	') }}" />
						{!! ($errors->has('slijedeća_registracija	') ? $errors->first('slijedeća_registracija	', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
					<div class="form-group">
                        <input class="form-control" placeholder="Trenutni kilometri" name="trenutni_kilometri" type="text" value="{{ old('trenutni_kilometri') }}" />
						{!! ($errors->has('trenutni_kilometri') ? $errors->first('trenutni_kilometri', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
					<div class="form-group">
                        <input class="form-control" type="date" placeholder="Zadnji servis" name="zadnji_servis" type="text" value="{{ old('zadnji_servis') }}" />
						{!! ($errors->has('zadnji_servis') ? $errors->first('zadnji_servis', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
					<div class="form-group">
						<text>Odjel</text>
						<select class="form-control" name="department_id">
							<option disabled selected value> </option>
							@foreach (DB::table('departments')->get() as $odjel)
								<option name="department_id" value="{{ $odjel->id }} ">{{ $odjel->name }}</option>
							@endforeach
						</select>
                    </div>
					<div class="form-group">
						<text>Djelatnik</text>
						<select class="form-control" name="user_id">
							<option disabled selected value> </option>
							@foreach (DB::table('users')->get() as $user)
								<option name="customer_id" value="{{ $user->id }} ">{{ $user->first_name . " " . $user->last_name }}</option>
							@endforeach
						</select>
                    </div>
					
					
					
					<div class="form-group">
							<input type='text' class="form-control" id='datetimepicker4' />
						</div>
						<script type="text/javascript">
							$(function () {
								$('#datetimepicker4').datetimepicker();
							});
					</script>

                    <input name="_token" value="{{ csrf_token() }}" type="hidden">
                    <input class="btn btn-lg btn-primary btn-block" type="submit" value="Upiši" id="nav">
                </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
