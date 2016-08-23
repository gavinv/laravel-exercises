@extends('layouts.master')

@section('content')
	<table>
@foreach ($posts as $post)
	<div> <h4><a href="{{ action('PostsController@show', $post->id) }}">{{ $post->title }}</a></h4></div>
	<small>submitted {{ $post->created_at->diffForHumans() }} by {{ $post->author->username }} to <a href="#">/r/{{ $post->subreddit->name }}</a></small>
	<br>
	<div>-----------------------------------------</div>
@endforeach
	{!! $posts->render() !!}

@stop