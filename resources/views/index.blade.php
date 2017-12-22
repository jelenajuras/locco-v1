@extends('layouts.index')

@section('title', 'Duplico')

@section('content')


<div class="jumbotron">
  <h2>Prijavi se za nastavak...</h2>
  <p></p>
  <p><a class="btn btn-primary btn-lg" href="{{ route('auth.login.form') }}" role="button">Prijava</a></p>
  <h4>Nisi još registriran? Registriraj se...</h4>
  <p></p>
  <p></p>
  <p><a class="btn btn-primary btn-lg" href="{{ route('auth.register.form') }}" role="button">Registracija</a></p>
</div>

@stop
