@extends('layouts.master')

@section('content')
	<table>
@foreach ($posts as $post)
	<h3>Title</h3>
	<div> <strong>{{ $post->title }}</strong></div>
	Posted on: {{ $post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A') }}
	<br>
	<div>-----------------------------------------</div>
	{!! $posts->render() !!}
@endforeach

@stop