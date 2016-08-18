@extends('layouts.master')

@section('content')
	<table>
@foreach ($posts as $post)
	<h3>Title</h3>
	<div> {{ $post->title }} </div>
	<h3>URL</h3>
	<div> {{ $post->url }} </div>
	<h3>Content</h3>
	<div> {{ $post->content }} </div>
	<br>
	<div>-----------------------------------------</div>
@endforeach

@stop