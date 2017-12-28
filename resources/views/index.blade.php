@extends('layouts.index')

@section('title', 'Duplico')

<style>
	body {
		background-color: rgb(230, 230, 230);
	}
	#nav {
		background-color: rgb(77, 77, 77);
		color: rgb(255, 133, 51);
	}
	
</style>

@section('content')
<br/>
<div class="jumbotron">
  <p></p>
  <h2>Prijavi se za nastavak...</h2>
  <p></p>
  <p><a class="btn btn-primary btn-lg" href="{{ route('auth.login.form') }}" role="button" id="nav">Prijava</a></p>
  <h4>Nisi još registriran? Registriraj se...</h4>
  <p></p>
  <p></p>
  <p><a class="btn btn-primary btn-lg" href="{{ route('auth.register.form') }}" role="button" id="nav">Registracija</a></p>

</div>

@stop
