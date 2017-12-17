@extends('layouts.admin')

@section('title', 'Ispravi grad')

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Ispravi podatke o gradu</h3>
            </div>
            <div class="panel-body">
                <form accept-charset="UTF-8" role="form" method="post" action="{{ route('admin.cities.update', $grad->id) }}">
                <fieldset>
                    <div class="form-group {{ ($errors->has('id')) ? 'has-error' : '' }}">
                        <input class="form-control" placeholder="Poštanski broj" name="id" type="text" value="{{ $grad->id }}" />
                        {!! ($errors->has('id') ? $errors->first('id', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
					<div class="form-group">
                        <input class="form-control" placeholder="Grad" name="grad" type="text" value="{{ $grad->grad }}" />
						{!! ($errors->has('grad') ? $errors->first('grad', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
					
					{{ csrf_field() }}
					{{ method_field('PUT') }}
                    <input name="_token" value="{{ csrf_token() }}" type="hidden">
                    <input class="btn btn-lg btn-primary btn-block" type="submit" value="Ispravi">
                </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
