@extends('layouts.admin')

@section('title', 'Ispravi vozilo')

<head>
  <title></title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
</head>

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading" id="nav">
                <h3 class="panel-title">Ispravi podatke vozila</h3>
            </div>
            <div class="panel-body">
                <form accept-charset="UTF-8" role="form" method="post" action="{{ route('admin.cars.update', $vozilo->id) }}">
                <fieldset>
                    <div class="form-group {{ ($errors->has('proizvođač')) ? 'has-error' : '' }}">
                        <input class="form-control" placeholder="Proizvođač" name="proizvođač" type="text" value="{{ $vozilo->proizvođač }}" />
                        {!! ($errors->has('proizvođač') ? $errors->first('proizvođač', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
					<div class="form-group">
                        <input class="form-control" placeholder="Model" name="model" type="text" value="{{ $vozilo->model }}" />
						{!! ($errors->has('model') ? $errors->first('model', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
					<div class="form-group">
                        <input class="form-control" placeholder="Registracija" name="registracija" type="text" value="{{ $vozilo->registracija }}" />
						{!! ($errors->has('registracija') ? $errors->first('registracija', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
					<div class="form-group">
                        <input class="form-control" placeholder="Broj šasije" name="šasija" type="text" value="{{ $vozilo->šasija }}" />
						{!! ($errors->has('šasija') ? $errors->first('šasija', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
					<div class="form-group">
						<input class="date form-control" placeholder="Prva registracija" type="text" name="prva_registracija" value="{{ $vozilo->prva_registracija }}">
						{!! ($errors->has('prva_registracija') ? $errors->first('prva_registracija', '<p class="text-danger">:message</p>') : '') !!}
					</div>
					<script type="text/javascript">
						$('.date').datepicker({  
						   format: 'yyyy-mm-dd'
						 });  
					</script>  
					<div class="form-group">
						<input class="date form-control" placeholder="Zadnja registracija" type="text" name="zadnja_registracija" value="{{ $vozilo->zadnja_registracija }}">
						{!! ($errors->has('zadnja_registracija') ? $errors->first('zadnja_registracija', '<p class="text-danger">:message</p>') : '') !!}
					</div>
					<script type="text/javascript">
						$('.date').datepicker({  
						   format: 'yyyy-mm-dd'
						 });  
					</script> 
					<div class="form-group">
						<input class="date form-control" placeholder="Zadnji servis" type="text" name="zadnji_servis" value="{{ $vozilo->zadnji_servis }}">
						{!! ($errors->has('zadnji_servis') ? $errors->first('zadnji_servis', '<p class="text-danger">:message</p>') : '') !!}
					</div>
					<script type="text/javascript">
						$('.date').datepicker({  
						   format: 'yyyy-mm-dd'
						 });  
					</script> 
					<div class="form-group">
                        <input class="form-control" placeholder="Trenutni kilometri" name="trenutni_kilometri" type="text" value="{{ $vozilo->trenutni_kilometri }}" />
                    </div>
				<!--	<div class="form-group">
                        <input class="form-control" type="date" placeholder="Zadnji servis" name="zadnji_servis" value="{{ $vozilo->zadnji_servis }}" />
                    </div> -->
					<div class="form-group">
						<text>Odjel</text>
						<select class="form-control" name="department_id" value="0">
							<option disabled selected value></option>
							@foreach (DB::table('departments')->get() as $odjel)
								<option name="department_id" value="{{ $odjel->id }} ">{{ $odjel->name }}</option>
							@endforeach
							<option selected="selected" value="{{  $vozilo->department_id }}">
								{{ $vozilo->department['name'] }}
							</option>
						</select>
                    </div>
					<div class="form-group">
						<text>Djelatnik</text>
						<select class="form-control" name="user_id" value="0">
							<option disabled selected value></option>
							@foreach (DB::table('users')->get() as $user)
								<option name="user_id" value="{{ $user->id }} ">{{ $user->first_name . " " . $user->last_name }}</option>
							@endforeach
							
							<option selected="selected" value="{{ $vozilo->user_id }}">
								{{ $vozilo->user['first_name'] . " " . $vozilo->user['last_name'] }}
							</option>
							
							
						</select>
                    </div>
					
					
					{{ csrf_field() }}
					{{ method_field('PUT') }}
                    <input name="_token" value="{{ csrf_token() }}" type="hidden">
                    <input class="btn btn-lg btn-primary btn-block" type="submit" value="Upiši" id="nav">
                </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
