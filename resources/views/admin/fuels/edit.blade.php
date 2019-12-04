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
							<form accept-charset="UTF-8" role="form" method="post" action="{{ route('admin.fuels.update', $fuel->id ) }}">
							<fieldset>
								<div class="form-group {{ ($errors->has('date')) ? 'has-error' : '' }}">
									<text>Datum</text>
									<input class="date form-control" placeholder="Datum točenja" type="date" name="date" value ="{{ date("Y-m-d",strtotime($fuel->date)) }}" required>
									{!! ($errors->has('date') ? $errors->first('date', '<p class="text-danger">:message</p>') : '') !!}
								</div>
								<div class="form-group {{ ($errors->has('car_id')) ? 'has-error' : '' }}">
									<text>Vozilo</text>
									<select class="form-control" name="car_id" id="sel1" value="{{ old('car_id') }}" required>  
										<option name="car_id" value=""></option>
										@foreach (DB::table('cars')->orderBy('registracija','ASC')->get() as $car)
											<option name="car_id" value=" {{ $car->id }}" {!! $fuel->car_id == $car->id ? 'selected' : '' !!}>{{ $car->registracija }}</option>
										@endforeach
									</select>
									{!! ($errors->has('car_id') ? $errors->first('car_id', '<p class="text-danger">:message</p>') : '') !!}
								</div>
								<div class="servis form-group">
									<input class="form-control" type="text" placeholder="0,00" name="liters" min="0" value="{{ $fuel->liters }}" pattern="[0-9]+([\.,][0-9]+)?" required />
								</div>
								<div class="servis form-group">
									<input class="form-control" type="text" placeholder="Trenutni kilometri" name="km" value="{{ $fuel->km }}" pattern= "[0-9]+" required />
								</div>
								{{ csrf_field() }}
								{{ method_field('PUT') }}
								<input class="btn btn-lg btn-primary btn-block" type="submit" value="Ispravi" id="nav">
							</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
	</div>
</div>
@stop