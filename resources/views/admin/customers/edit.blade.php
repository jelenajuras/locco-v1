@extends('layouts.admin')

@section('title', 'Ispravi podatke naručitelja')

@section('content')
<div class="row" style="margin-top:80px">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading"  id="nav">
                <h3 class="panel-title">Ispravi podatke naručitelja</h3>
            </div>
            <div class="panel-body">
                <form accept-charset="UTF-8" role="form" method="post" action="{{ route('admin.customers.update', $customer->id) }}">
                <fieldset>
                    <div class="form-group {{ ($errors->has('naziv')) ? 'has-error' : '' }}">
                        <input class="form-control" name="naziv" type="text" value="{{ $customer->naziv}}"/>
                        {!! ($errors->has('naziv') ? $errors->first('naziv', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
					<div class="form-group {{ ($errors->has('adresa')) ? 'has-error' : '' }}">
                        <input class="form-control" name="adresa" type="text" value="{{ $customer->adresa }} "/>
                        {!! ($errors->has('adresa') ? $errors->first('adresa', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
					<div class="form-group">
						<select class="form-control" name="grad_id" id="sel1"/>
							
							@foreach (DB::table('cities')->get() as $city)
							<option name="grad_id" value="{{$city->id}}">{{ $city->grad }}</option>
							@endforeach
							<option selected="selected" value="{{$customer->grad_id}}">
								{{$customer->city['grad']}}
							</option>
						</select>
					</div>
					{{ csrf_field() }}
					{{ method_field('PUT') }}
                    <input name="_token" value="{{ csrf_token() }}" type="hidden">
                    <input class="btn btn-lg btn-primary btn-block" type="submit" value="Ispravi podatke"  id="nav">
                </fieldset>
                </form>
					
            </div>
        </div>
    </div>
</div>
@stop
