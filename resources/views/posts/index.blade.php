@extends('layouts.master')

@section('content')
<div class="container content">
	@foreach ($posts as $post)
	<div class="row"> 
		<div class="col-xs-1 votes">
			<div role="button" data-value="{{ $post->id }}" class="arrow {{ ($post->hasBeenUpvoted()) ? 'upmod' : '' }} upvote up-{{ $post->id }}"></div>
			
			<div class="score score-{{ $post->id }} {{ ($post->hasBeenUpvoted()) ? 'likes' : ($post->hasBeenDownvoted() ? 'dislikes' : '') }}" id="{{ $post->id }}">{{ $post->totalVotes() }}</div>
			
			<div role="button" data-value="{{ $post->id }}" class="arrow {{ ($post->hasBeenDownvoted()) ? 'downmod' : '' }} downvote down-{{ $post->id }}"></div>
		</div>
		<div class="col-xs-3 thumb">
			<img src="" width="70" height="70">
		</div>
		<div class="entry col-xs-8">
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
	<hr>
	@endforeach
	{!! $posts->render() !!}
</div>
@stop

@section('scripts')
<!-- js for ajax request when you click up or downvote -->
<script>
	$('.upvote').click(function(){
		console.log($(this).data('value'));
		$.ajax('votes/create', {
			type: "POST",
			data: {
				vote: 1,
				post: $(this).data('value'),
				_token: "{{ csrf_token() }}"
			}
		}).fail(function(e) {
			console.log(e.responseText);
		}).done(function(response) {
			console.log(response, 'response');
			$('#' + response[1]).html(response[0]);
			$('.up-' + response[1]).addClass('upmod');
			$('.score-' + response[1]).addClass('likes');
			$('.down-' + response[1]).removeClass('downmod');
			$('.score-' + response[1]).removeClass('dislikes');
		});
	});

	$('.downvote').click(function(){
		console.log($(this).data('value'));
		$.ajax('votes/create', {
			type: "POST",
			data: {
				vote: 0,
				post: $(this).data('value'),
			  _token: "{{ csrf_token() }}"
			} 
		}).done(function(response) {
			console.log(response, 'response');
			$('#' + response[1]).html(response[0]);
			$('.down-' + response[1]).addClass('downmod');
			$('.score-' + response[1]).addClass('dislikes');
			$('.up-' + response[1]).removeClass('upmod');
			$('.score-' + response[1]).removeClass('likes');
		});
	});
</script>
@stop