@extends('layouts.admin')

@section('title', 'Promjeni odjel')

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading" id="nav">
                <h3 class="panel-title">Ispravi podatke o odjelu</h3>
            </div>
            <div class="panel-body">
                <form accept-charset="UTF-8" role="form" method="post" action="{{ route('admin.departments.update', $odjel->id) }}">
                <fieldset>
                    <div class="form-group">
                        <input class="form-control" placeholder="Odjel" name="name" type="text" value="{{ $odjel->name }}" />
						{!! ($errors->has('name') ? $errors->first('name', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
					{{ csrf_field() }}
					{{ method_field('PUT') }}
                    <input name="_token" value="{{ csrf_token() }}" type="hidden">
                    <input class="btn btn-lg btn-primary btn-block" type="submit" value="Ispravi odjel" id="nav">
                </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
