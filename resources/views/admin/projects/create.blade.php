@extends('layouts.admin')

@section('title', 'Dodaj novi projekt')


@section('content')
<div class="row" style="margin-top:80px">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
		
            <div class="panel-heading" id="nav">
                <h3 class="panel-title">Upiši novi projekt</h3>
            </div>
            <div class="panel-body">
                <form accept-charset="UTF-8" role="form" method="post" action="{{ route('admin.projects.store') }}">
                <fieldset>
					<div class="form-group {{ ($errors->has('id')) ? 'has-error' : '' }}">
						<text>Broj projekta</text>
                        <input class="form-control" placeholder="Broj projekta" name="id" type="text" value="{{ old('id') }}" />
                        {!! ($errors->has('id') ? $errors->first('id', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
                    <div class="form-group {{ ($errors->has('customer_id')) ? 'has-error' : '' }}">
						<text>Naručitelj</text>
						<select class="form-control" name="customer_id" id="sel1">
							<option disabled selected value> </option>
							@foreach (DB::table('customers')->orderBy('naziv','ASC')->get() as $customer)
								<option name="customer_id" value=" {{$customer->id}} ">{{ $customer->naziv }}</option>
							@endforeach
						</select>
						{!! ($errors->has('customer_id') ? $errors->first('customer_id', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
					<a class="" href="{{ route('admin.customers.create') }}">
						<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
						Dodaj naručitelja
					</a>
					<div class="form-group">
						<text>Investitor</text>
						<select class="form-control" name="investitor_id"  id="sel1">
							<option disabled selected value> </option>
							@foreach (DB::table('customers')->orderBy('naziv','ASC')->get() as $customer)
								<option name="investitor_id" value=" {{$customer->id}} ">{{ $customer->naziv }}</option>
							@endforeach
						</select>
                    </div>
                    <div class="form-group {{ ($errors->has('naziv')) ? 'has-error' : '' }}">
						<text>Naziv projekta</text>
                       <textarea class="form-control"  placeholder="Naziv projekta"  name="naziv" id="projekt-name"></textarea>
                        {!! ($errors->has('naziv') ? $errors->first('naziv', '<p class="text-danger">:message</p>') : '') !!}
                    </div>

                    <input name="_token" value="{{ csrf_token() }}" type="hidden">
                    <input class="btn btn-lg btn-primary btn-block" type="submit" value="Upiši projekt" id="nav">
                </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
