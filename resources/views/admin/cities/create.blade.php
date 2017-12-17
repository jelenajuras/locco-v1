@extends('layouts.admin')

@section('title', 'Dodaj novi grad')

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Upiši novi grad</h3>
            </div>
            <div class="panel-body">
                <form accept-charset="UTF-8" role="form" method="post" action="{{ route('admin.cities.store') }}">
                <fieldset>
                    <div class="form-group {{ ($errors->has('id')) ? 'has-error' : '' }}">
                        <input class="form-control" placeholder="Poštanski broj" name="id" type="text" value="{{ old('id') }}" />
                        {!! ($errors->has('id') ? $errors->first('id', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
					<div class="form-group">
                        <input class="form-control" placeholder="Grad" name="grad" type="text" value="{{ old('grad') }}" />
						{!! ($errors->has('grad') ? $errors->first('grad', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
                    <input name="_token" value="{{ csrf_token() }}" type="hidden">
                    <input class="btn btn-lg btn-primary btn-block" type="submit" value="Upiši">
                </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
