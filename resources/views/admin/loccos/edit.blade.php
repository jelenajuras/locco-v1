@extends('layouts.admin')

@section('title', 'Ispravi locco')

<head>
  <title></title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
</head>

@section('content')
<div class="row" style="margin-top:80px">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading" id="nav">
                <h3 class="panel-title">Ispravi podatke locco vožnje</h3>
            </div>
            <div class="panel-body">
                <form accept-charset="UTF-8" role="form" method="post" action="{{ route('admin.loccos.update', $locco->id) }}">
                <fieldset>
                    <div class="form-group {{ ($errors->has('vozilo_id')) ? 'has-error' : '' }}">
                        <text>Vozilo</text>
						<select class="form-control" name="vozilo_id" id="sel1" value="" >
							<option disabled selected value> </option>
							@foreach (DB::table('cars')->get() as $car)
								<option name="vozilo_id" value=" {{ $car->id }} ">{{ $car->registracija }}</option>
							@endforeach
							@if ($locco->vozilo_id)
							<option selected="selected" value="{{  $locco->vozilo_id }}">
								{{ $locco->car['registracija'] }}
							</option>
							@endif
						</select>
						{!! ($errors->has('vozilo_id') ? $errors->first('vozilo_id', '<p class="text-danger">:message</p>') : '') !!}
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
						<select class="form-control" name="user_id" id="sel1">
							@foreach (DB::table('users')->get() as $user)
								<option name="user_id" value=" {{ $user->id }} ">{{ $user->first_name . ' ' . $user->last_name }}</option>
							@endforeach	
							<option selected="selected"  value="{{ $locco->user_id }}">
								{{ $locco->user['first_name'] . ' '. $locco->user['first_name'] }}
							</option>
						</select>
                    </div>
					<div class="form-group">
                        <input class="form-control" placeholder="Relacija" name="relacija" type="text" value="{{ $locco->relacija }}" />
						{!! ($errors->has('relacija') ? $errors->first('relacija', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
					<div class="form-group">
                        <input class="form-control" placeholder="Razlog puta" name="razlog" type="text" value="{{ $locco->razlog_puta }}" />
						
                    </div>
					<div class="form-group">
                        <text>Projekt</text>
						<select class="form-control" name="projekt_id" id="sel1">
							<option disabled selected value> </option>
							@foreach (DB::table('projects')->get() as $project)
								<option name="projekt_id" value=" {{ $project->id }} ">{{ $project->id . " - " . $project->naziv }}</option>
							@endforeach	
							@if ($locco->projekt_id)
							<option selected="selected" value="{{  $locco->projekt_id }}">
								{{ $locco->projekt_id . ' ' . $locco->project['naziv'] }}
							</option>
							@endif
						</select>
                    </div>
					<div class="form-group">
                        <input class="form-control" placeholder="Početni kilometri" name="početni_kilometri" type="text" value="{{ $locco->početni_kilometri }}" />
						{!! ($errors->has('početni_kilometri') ? $errors->first('početni_kilometri', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
					<div class="form-group">
                        <input class="form-control" placeholder="Završni kilometri" name="završni_kilometri" type="text" value="{{ $locco->završni_kilometri }}" />
						{!! ($errors->has('završni_kilometri') ? $errors->first('završni_kilometri', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
					<div class="form-group">
                        <textarea class="form-control" placeholder="Komentar" name="Komentar" value="{{ $locco->Komentar }}">{{ $locco->Komentar }}</textarea>
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