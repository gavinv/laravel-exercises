@extends('layouts.master')

@section('content')
<div class="container">
	@foreach ($posts as $post)
	<div class="row"> 
		<div class="col-xs-3 thumb">
			<img src="" width="70" height="70">
		</div>
		<div class="entry col-xs-9">
			<div class="title">
				<a href="{{ action('PostsController@show', $post->id) }}">{{ $post->title }}</a>
			</div>
			<div class="tagline">
				submitted {{ $post->created_at->diffForHumans() }} by <a href="#">{{ $post->author->username }}</a> to <a href="#">/r/{{ $post->subreddit->name }}</a>			
			</div>
			<ul class="list-inline">
				<li><a class ="view-comments" href="{{ action('PostsController@show', $post->id) }}">comments</a></li>
			</ul>
		</div>
	</div>
	@endforeach
	{!! $posts->render() !!}
</div>
@stop