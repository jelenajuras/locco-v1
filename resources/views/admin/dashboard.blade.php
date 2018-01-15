@extends('layouts.admin')

@section('title', 'Dashboard')
<head>

  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
</head>
@section('content')
<div class="row" style="margin-top:80px">
    @if (Sentinel::check())
		@if(Sentinel::getUser()->first_name)
			<h2>Bok, {{ Sentinel::getUser()->first_name }}! Prijavljen/a si!</h2>
		@else
			<h2>Bok, {{ Sentinel::getUser()->email }}! Prijavljen/a si!</h2>
		@endif
        <p></p>

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
					
						<select class="form-control" name="vozilo_id" id="sel1" value="{{ old('vozilo_id') }}" >  
						<!--@if(DB::table('cars')->where('user_id',Sentinel::getUser()->id)->value('registracija'))
							<option selected="selected" value="{{ DB::table('cars')->where('user_id',Sentinel::getUser()->id)->value('id') }}">
								{{ DB::table('cars')->where('user_id',Sentinel::getUser()->id)->value('registracija') }}
							</option>
						@else
							<option value="0">Izaberi vozilo</option>
						@endif-->
						<option name="vozilo_id" value="{{ DB::table('cars')->where('registracija',$reg)->value('id') }}">{{ $reg }}</option>
						
							@foreach (DB::table('cars')->get() as $car)
								<option name="vozilo_id" value=" {{ $car->id }} ">{{ $car->registracija }}</option>
							@endforeach
						</select>
                    </div>
					<div class="form-group">
						<text>Datum vožnje</text>
						<input class="date form-control" placeholder="Datum vožnje" type="text" name="datum" value = "{{ Carbon\Carbon::now()->format('Y-m-d') }}">
						{!! ($errors->has('datum') ? $errors->first('datum', '<p class="text-danger">:message</p>') : '') !!}
					</div>
					<script type="text/javascript">
						$('.date').datepicker({  
						   format: 'yyyy-mm-dd'
						 });  
					</script> 
					<div class="form-group {{ ($errors->has('user_id'))  ? 'has-error' : '' }}">
                        <text>Vozač</text>
						<select class="form-control" name="user_id" id="sel1" value="{{ old('user_id') }}">
							@foreach (DB::table('users')->orderBy('last_name','ASC')->get() as $user)
								<option name="user_id" value=" {{ $user->id }} ">{{ $user->first_name . ' ' . $user->last_name }}</option>
							@endforeach	
							<option selected="selected" value="{{ Sentinel::getUser()->id }}">
								{{ Sentinel::getUser()->first_name . ' '. Sentinel::getUser()->last_name }}
							</option>
						</select>
                    </div>
					<div class="form-group">
						<text>Relacija</text>
                        <input class="form-control" placeholder="Relacija" name="relacija" type="text" value="{{ old('relacija') }}" />
						{!! ($errors->has('relacija') ? $errors->first('relacija', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
					<div class="form-group">
					<text>Razlog puta</text>
                        <input class="form-control" placeholder="Razlog puta" name="razlog" type="text" value="{{ old('razlog') }}" />
                    </div>
					<div class="form-group">
                        <text>Projekt</text>
						<select class="form-control" name="projekt_id" id="sel1" value="{{ old('projekt_id') }}">
							<option value="0"></option>
							@foreach (DB::table('projects')->orderBy('id','ASC')->get() as $project)
								<option name="projekt_id" value=" {{ $project->id }} ">{{ $project->id . " - " . $project->naziv }}</option>
							@endforeach	
						</select>
                    </div>
					<div class="form-group">
						<text>Početni kilometri</text>
                        <input class="form-control" placeholder="Početni kilometri" name="početni_kilometri" type="text" value="{{ DB::table('cars')->where('registracija',$reg)->value('trenutni_kilometri') }} "/>
						{!! ($errors->has('početni_kilometri') ? $errors->first('početni_kilometri', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
					<div class="form-group">
						<text>Završni kilometri</text>
                        <input class="form-control" placeholder="Završni kilometri" name="završni_kilometri" type="text" value="{{ old('završni_kilometri') }}" />
						{!! ($errors->has('završni_kilometri') ? $errors->first('završni_kilometri', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
					<div class="form-group">
                        <textarea class="form-control" placeholder="Komentar" name="Komentar" value="{{ old('Komentar') }}"></textarea>
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
</div>
@stop
