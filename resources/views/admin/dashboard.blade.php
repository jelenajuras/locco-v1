@extends('layouts.admin')

@section('title', 'Dashboard')
<link rel="stylesheet" href="{{ URL::asset('css/servis.css') }}"/>
<?php
	$registracija = '';
	$vozilo_id = '';
	$vozilo_user = '';
	$vozilo = '';
	if(isset($reg)) {
		$registracija = $reg;
		$vozilo_user = $cars->where('registracija',$reg)->first();
		$vozilo_id = $vozilo_user->id;
	} else {
		$vozilo_user = $cars->where('user_id',Sentinel::getUser()->id)->first();
		if(isset($vozilo_user)) {
			$registracija = $vozilo_user->registracija;
			$vozilo_id = $vozilo_user->id; 
		}
	}
?>
@section('content')
<div class="Jmain">
	<div class="row" style="margin-top:80px">
		@if (Sentinel::check())
			@if(Sentinel::getUser()->first_name)
				<h2>Bok, {{ Sentinel::getUser()->first_name }}! Prijavljen/a si!</h2>
			@else
				<h2>Bok, {{ Sentinel::getUser()->email }}! Prijavljen/a si!</h2>
			@endif
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="panel panel-default">
						<div class="panel-heading" id="nav">
							<h3 class="panel-title">Upiši novu locco vožnju</h3>
						</div>
						<div class="panel-body">
							<form accept-charset="UTF-8" role="form" method="post" action="{{ route('admin.loccos.store') }}">
							<fieldset>
								<div class="form-group {{ ($errors->has('vozilo_id')) ? 'has-error' : '' }}">
									<text>Vozilo</text>
									<select class="form-control" name="vozilo_id" id="sel1" value="{{ old('vozilo_id') }}" required>  
										<option name="vozilo_id" value=""></option>
										@foreach (DB::table('cars')->orderBy('registracija','ASC')->get() as $car)
											<option name="vozilo_id" value=" {{ $car->id }}" {!! $vozilo_id == $car->id  ? 'selected' : '' !!}>{{ $car->registracija }}</option>
										@endforeach
									</select>
									{!! ($errors->has('vozilo_id') ? $errors->first('vozilo_id', '<p class="text-danger">:message</p>') : '') !!}
								</div>
								<div class="form-group {{ ($errors->has('datum')) ? 'has-error' : '' }}">
									<text>Datum vožnje</text>
									<input class="date form-control" placeholder="Datum vožnje" type="date" name="datum" value = "{{ Carbon\Carbon::now()->format('Y-m-d') }}" required>
									{!! ($errors->has('datum') ? $errors->first('datum', '<p class="text-danger">:message</p>') : '') !!}
								</div>
								<div class="form-group {{ ($errors->has('user_id'))  ? 'has-error' : '' }}">
									<text>Vozač</text>
									<select class="form-control" name="user_id" id="sel1" value="{{ old('user_id') }}" required>
										@foreach ($users as $user)
											<option name="user_id" value="{{ $user->id }}" {!! Sentinel::getUser()->id == $user->id ? 'selected' : '' !!}>{{ $user->first_name . ' ' . $user->last_name }}</option>
										@endforeach	
									</select>
								</div>
								<div class="form-group {{ ($errors->has('relacija')) ? 'has-error' : '' }}">
									<text>Relacija</text>
									<input class="form-control" placeholder="Relacija" name="relacija" type="text" value="{{ old('relacija') }}" required autofocus />
									{!! ($errors->has('relacija') ? $errors->first('relacija', '<p class="text-danger">:message</p>') : '') !!}
								</div>
								<!--<div class="form-group">
								<text>Razlog puta</text>
									<input class="form-control" placeholder="Razlog puta" name="razlog" type="text" value="{{ old('razlog') }}" />
								</div> -->
								<div class="form-group">
									<text>Projekt</text>
									  <input class="form-control" list="projekti" name="projekt_id"  value="0"/>
									  <datalist id="projekti">
										@foreach ($projects as $project)
											<option name="projekt_id" value="{{ $project->id }} ">{{ $project->id . " - " . $project->naziv }}</option>
										@endforeach	
									  </datalist>
								 </div>
								<!--<div class="form-group">
									<text>Projekt</text>
									<select class="form-control" name="projekt_id" id="myTable" value="{{ old('projekt_id') }}">
										<option value="0"></option>
										@foreach (DB::table('projects')->orderBy('id','ASC')->get() as $project)
											<option name="projekt_id" value=" {{ $project->id }} ">{{ $project->id . " - " . $project->naziv }}</option>
										@endforeach	
									</select>
								</div>-->
								<div class="form-group {{ ($errors->has('početni_kilometri'))  ? 'has-error' : '' }}">
									<text>Početni kilometri</text>
									<input class="form-control" placeholder="Početni kilometri" name="početni_kilometri" type="text" required value="{!! isset($vozilo_user) ? $vozilo_user->trenutni_kilometri : '' !!}"/>	
									{!! ($errors->has('početni_kilometri') ? $errors->first('početni_kilometri', '<p class="text-danger">:message</p>') : '') !!}
								</div>
								<div class="form-group  {{ ($errors->has('završni_kilometri'))  ? 'has-error' : '' }}">
									<text>Završni kilometri</text>
									<input class="form-control" placeholder="Završni kilometri" name="završni_kilometri" type="text" value="{{ old('završni_kilometri') }}" required />
									{!! ($errors->has('završni_kilometri') ? $errors->first('završni_kilometri', '<p class="text-danger">:message</p>') : '') !!}
								</div>
								<div class="form-group">
									<textarea class="form-control" placeholder="Komentar" name="Komentar" value="{{ old('Komentar') }}"></textarea>
								</div>
								<div class="servis form-group">
									<label for="servis">Prijavi kvar</label>
									<input class="" type="checkbox" name="servis" value="servis" id="servis" value=""/>
								</div>
								<input name="_token" value="{{ csrf_token() }}" type="hidden">
								<input class="btn btn-lg btn-primary btn-block" type="submit" value="Upiši vožnju" id="nav">
							</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		@else
			<div class="jumbotron">
				<h1>Dobrodošli!</h1>
				<p>Za nastavak se moraš prijaviti.</p>
				<p><a class="btn btn-primary btn-lg" href="{{ route('auth.login.form') }}" role="button">Prijava</a></p>
			</div>
		@endif
		<script>
		$(document).ready(function(){
		  $("#myInput").on("keyup", function() {
			var value = $(this).val().toLowerCase();
			$("#myList li").filter(function() {
			  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		  });
		});
		</script>
	</div>
</div>
@stop