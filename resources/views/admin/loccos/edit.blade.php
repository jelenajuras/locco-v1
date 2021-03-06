@extends('layouts.admin')

@section('title', 'Ispravi locco')

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
						<input class="date form-control" placeholder="Datum vožnje" type="date" name="datum" value = "{{ date("Y-m-d",strtotime($locco->datum)) }}">
						{!! ($errors->has('datum') ? $errors->first('datum', '<p class="text-danger">:message</p>') : '') !!}
					</div>
					<div class="form-group {{ ($errors->has('user_id'))  ? 'has-error' : '' }}">
                        <text>Vozač</text>
						<select class="form-control" name="user_id" id="sel1">
							@foreach (DB::table('users')->orderBy('last_name','ASC')->get() as $user)
								<option name="user_id" value=" {{ $user->id }} ">{{ $user->first_name . ' ' . $user->last_name }}</option>
							@endforeach	
							<option selected="selected"  value="{{ $locco->user_id }}">
								{{ $locco->user['first_name'] . ' '. $locco->user['last_name'] }}
							</option>
						</select>
                    </div>
					<div class="form-group">
					<text>Relacija</text>
                        <input class="form-control" placeholder="Relacija" name="relacija" type="text" value="{{ $locco->relacija }}" />
						{!! ($errors->has('relacija') ? $errors->first('relacija', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
					<div class="form-group">
					<text>Projekt</text>
					  <input class="form-control" list="projekti" name="projekt_id" value="0"/>
					  <datalist id="projekti">
						@foreach (DB::table('projects')->orderBy('id','ASC')->get() as $project)
							<option name="projekt_id" value="{{ $project->id }} ">{{ $project->id . " - " . $project->naziv }}</option>
						@endforeach	
						<option selected="selected"  value="{{ $locco->projekt_id }}">
								{{ $locco->projekt_id . ' '. $locco->projekt['naziv'] }}
							</option>
					  </datalist>

					 </div>
					<div class="form-group">
                        <input class="form-control" placeholder="Početni kilometri" name="pocetni_kilometri" type="text" value="{{ $locco->pocetni_kilometri }}" />
						{!! ($errors->has('pocetni_kilometri') ? $errors->first('pocetni_kilometri', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
					<div class="form-group">
                        <input class="form-control" placeholder="Završni kilometri" name="zavrsni_kilometri" type="text" value="{{ $locco->zavrsni_kilometri }}" />
						{!! ($errors->has('zavrsni_kilometri') ? $errors->first('zavrsni_kilometri', '<p class="text-danger">:message</p>') : '') !!}
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
@stop