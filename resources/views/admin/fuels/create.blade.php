@extends('layouts.admin')

@section('title', 'Dashboard')
<link rel="stylesheet" href="{{ URL::asset('css/servis.css') }}"/>
@section('content')
<div class="Jmain">
	<div class="row" style="margin-top:80px">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="panel panel-default">
						<div class="panel-heading" id="nav">
							<h3 class="panel-title">Upiši točenje goriva</h3>
						</div>
						<div class="panel-body">
							<form accept-charset="UTF-8" role="form" method="post" action="{{ route('admin.fuels.store') }}">
							<fieldset>
								<div class="form-group {{ ($errors->has('date')) ? 'has-error' : '' }}">
									<text>Datum</text>
									<input class="date form-control" placeholder="Datum točenja" type="date" name="date" value = "{{ Carbon\Carbon::now()->format('Y-m-d') }}" required>
									{!! ($errors->has('date') ? $errors->first('date', '<p class="text-danger">:message</p>') : '') !!}
								</div>
								<div class="form-group {{ ($errors->has('car_id')) ? 'has-error' : '' }}">
									<text>Vozilo</text>
									<select class="form-control" name="car_id" id="sel1" value="{{ old('car_id') }}" required>  
										<option name="car_id" value=""></option>
										@foreach (DB::table('cars')->orderBy('registracija','ASC')->get() as $car)
											<option name="car_id" value=" {{ $car->id }}">{{ $car->registracija }}</option>
										@endforeach
									</select>
									{!! ($errors->has('car_id') ? $errors->first('car_id', '<p class="text-danger">:message</p>') : '') !!}
								</div>
								<div class="servis form-group">
									<input class="form-control" type="text" placeholder="0,00" name="liters" min="0" value="{{ old('liters')}}" pattern="[0-9]+([\.,][0-9]+)?" required />
								</div>
								<div class="servis form-group">
									<input class="form-control" type="text" placeholder="Trenutni kilometri" name="km" value="{{ old('km')}}" pattern= "[0-9]+" required />
								</div>
								<input name="_token" value="{{ csrf_token() }}" type="hidden">
								<input class="btn btn-lg btn-primary btn-block" type="submit" value="Upiši" id="nav">
							</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
	</div>
</div>
@stop