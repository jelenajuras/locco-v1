@extends('layouts.admin')

@section('title', 'Dodaj novi odjel')

@section('content')
<div class="row" style="margin-top:80px">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading" id="nav">
                <h3 class="panel-title">Upiši novi odjel</h3>
            </div>
            <div class="panel-body">
                <form accept-charset="UTF-8" role="form" method="post" action="{{ route('admin.departments.store') }}">
                <fieldset>
					<div class="form-group">
                        <input class="form-control" placeholder="Odjel" name="name" type="text" value="{{ old('name') }}" />
						{!! ($errors->has('name') ? $errors->first('name', '<p class="text-danger">:message</p>') : '') !!}
                    </div>
                    <input name="_token" value="{{ csrf_token() }}" type="hidden">
                    <input class="btn btn-lg btn-primary btn-block" type="submit" value="Upiši odjel" id="nav">
                </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
