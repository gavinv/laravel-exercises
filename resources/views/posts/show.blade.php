@extends('layouts.master')

@section('content')
	<h1> {{ $post->title }} </h1>
	<h5> {{ $post->url }} </h5>
	<div> {{ $post->content }} </div>

@stop