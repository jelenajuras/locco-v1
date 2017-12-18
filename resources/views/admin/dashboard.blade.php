@extends('layouts.admin')

@section('title', 'Admin - Dashboard')

@section('content')
<div class="row">
    @if (Sentinel::check())
    <div class="jumbotron">
        <h1>Bok, {{ Sentinel::getUser()->first_name }}!</h1>
        <p>Prijavljen/a si!</p>
    </div>
    @else
        <div class="jumbotron">
            <h1>Dobrodošli!</h1>
            <p>Za nastavak se moraš prijaviti.</p>
            <p><a class="btn btn-primary btn-lg" href="{{ route('auth.login.form') }}" role="button">Log In</a></p>
        </div>
    @endif
</div>
@stop
