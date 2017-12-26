@extends('layouts.admin')

@section('title', 'Upis novog naručitelja')

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading"  id="nav">
                <h3 class="panel-title">Upiši novog naručitelja</h3>
            </div>
            <div class="panel-body">
                <form accept-charset="UTF-8" role="form" method="post" action="{{ route('admin.customers.store') }}">
                <fieldset>
                    <div class="form-group {{ ($errors->has('naziv')) ? 'has-error' : '' }}">
					<text>Naziv firme</text>
                        <input class="form-control" placeholder="Naziv firme" name="naziv" type="text" value="{{ old('naziv') }}" />
                        {!! ($errors->has('naziv') ? $errors->first('naziv', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
					<div class="form-group {{ ($errors->has('adresa')) ? 'has-error' : '' }}">
					<text>Adresa</text>
                        <input class="form-control" placeholder="Adresa" name="adresa" type="text" value="{{ old('adresa') }}" />
                        {!! ($errors->has('adresa') ? $errors->first('adresa', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
					
					<div class="form-group">
					<text>Grad</text>
						<select class="form-control" name="grad_id">
							<option disabled selected value></option>
							@foreach (DB::table('cities')->orderBy('grad','ASC')->get() as $city)
							<option name="grad_id" value=" {{ $city->id }} ">{{ $city->grad }}</option>
							@endforeach
						</select>
						{!! ($errors->has('grad_id') ? $errors->first('grad_id', '<p class="text-danger">:message</p>') : '') !!}
					</div>
                    <input name="_token" value="{{ csrf_token() }}" type="hidden">
                    <input class="btn btn-lg btn-primary btn-block" type="submit" value="Upiši"  id="nav">
                </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@stop