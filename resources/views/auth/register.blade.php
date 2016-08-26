@extends('layouts.master')

@section('content')
<h4 class="modal-title">create a new account</h4>
<form method="post" action="{{ action('Auth\AuthController@postRegister') }}">
	{{ csrf_field() }}
	<div class="form-group">
		<input
		type="text"
		class="form-control"
		name="username"
		id="username"
		placeholder="choose a username">
		@include('forms.error', ['field' => 'username'])		
	</div>
	<div class="form-group">
		<input
		type="password"
		class="form-control"
		name="password"
		id="password"
		placeholder="password">
		@include('forms.error', ['field' => 'password'])		
	</div>
	<div class="form-group">
		<input
		type="password"
		class="form-control"
		name="password_confirmation"
		id="password_confirmation"
		placeholder="verify password">
		@include('forms.error', ['field' => 'password_confirmation'])		
	</div>
	<div class="form-group">
		<input	
		type="text"
		class="form-control"
		name="email"
		id="email"
		placeholder="email">
		@include('forms.error', ['field' => 'email'])	
	</div>
	<!-- add remember me button -->
	<button type="submit" class="btn btn-primary">SIGN UP</button>
</form>
@stop