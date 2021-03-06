@extends('layouts.master')

@section('content')
<div class="row">
	<div class="col-xs-6 col-xs-offset-3">
		<h4 class="modal-title">log in</h4>
		<form method="POST" action="{{ action('Auth\AuthController@postLogin') }}">
			{{ csrf_field() }}
			<div class="form-group">
				<input type="text" class="form-control" name="username" id="username" placeholder="username">
				@include('forms.error', ['field' => 'username'])
			</div>
			<div class="form-group">
				<input type="password" class="form-control" name="password" id="password" placeholder="password">
				@include('forms.error', ['field' => 'password'])
			</div>
			<div class="form-group">
				<a href="#">reset password</a>
			</div>
			<button type="submit" class ="btn btn-primary pull-right">log in</button>
		</form>
	</div>
</div>
@stop